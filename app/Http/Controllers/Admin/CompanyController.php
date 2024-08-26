<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Models\CompanyCategory;
use App\Services\ImageService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // Display a listing of the companies
    public function index()
    {
        $categories = CompanyCategory::all();

        $companies = Company::with('category')->get();
        return view('admin.companies.index', compact('companies', 'categories'));
    }

    // Store a newly created company in storage
    public function store(StoreCompanyRequest $request)
    {
        $company = new Company();
        $company->title = $request->input('title');
        $company->description = $request->input('description');
        $company->category_id = $request->input('category_id');
        $company->image = (new ImageService())->store($request->image, 'companies');
        $company->save();

        return redirect()->route('admin.companies.index')->with('success', 'Company created successfully');
    }

    // Show the form for editing the specified company
    public function edit($id)
    {
        $company = Company::find($id);
        if (!$company) {
            return redirect()->route('admin.companies.index')->with('error', 'Company not found');
        }
        $categories = CompanyCategory::all();
        return view('admin.companies.edit', compact('company', 'categories'));
    }

    // Update the specified company in storage
    public function update(UpdateCompanyRequest $request, $id)
    {
        $company = Company::find($id);
        if (!$company) {
            return redirect()->route('admin.companies.index')->with('error', 'Company not found');
        }

        $company->title = $request->input('title');
        $company->description = $request->input('description');
        $company->category_id = $request->input('category_id');
        if ($request->hasFile('image')) {
            $company->image = (new ImageService())->store($request->image, 'companies');
        }
        $company->save();

        return redirect()->route('admin.companies.index')->with('success', 'Company updated successfully');
    }

    // Remove the specified company from storage
    public function destroy($id)
    {
        $company = Company::find($id);
        if ($company) {
            $company->delete();
            return redirect()->route('admin.companies.index')->with('success', 'Company deleted successfully');
        }
        return redirect()->route('admin.companies.index')->with('error', 'Company not found');
    }
}
