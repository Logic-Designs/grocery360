<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyItemRequest;
use App\Http\Requests\UpdateCompanyItemRequest;
use App\Models\Company;
use App\Models\CompanyItem;
use App\Services\ImageService;
use Illuminate\Http\Request;

class CompanyItemController extends Controller
{
    // Display a listing of the items for a specific company
    public function index($companyId)
    {
        $company = Company::findOrFail($companyId);
        $items = $company->items; // Get all items associated with the company
        return view('admin.company_items.index', compact('company', 'items'));
    }
    // Store a newly created item in storage
    public function store(StoreCompanyItemRequest $request, $companyId)
    {
        $company = Company::findOrFail($companyId);

        $item = new CompanyItem();
        $item->company_id = $company->id;
        $item->type = $request->input('type');
        $item->title = $request->input('title');
        $item->description = $request->input('description');

        if ($request->hasFile('image')) {
            $item->image = (new ImageService())->store($request->file('image'), 'company_items');
        }

        $item->save();

        return redirect()->route('admin.company_items.index', $company->id)->with('success', 'Company item created successfully');
    }

    // Show the form for editing the specified item
    public function edit( $id)
    {
        $item = CompanyItem::findOrFail($id);
        $company = $item->company;

        return view('admin.company_items.edit', compact('company', 'item'));
    }

    // Update the specified item in storage
    public function update(UpdateCompanyItemRequest $request,  $id)
    {

        $item = CompanyItem::findOrFail($id);
        $company = $item->company;

        $item->type = $request->input('type');
        $item->title = $request->input('title');
        $item->description = $request->input('description');

        if ($request->hasFile('image')) {
            $item->image = (new ImageService())->store($request->file('image'), 'company_items');
        }

        $item->save();

        return redirect()->route('admin.company_items.index', $company->id)->with('success', 'Company item updated successfully');
    }

    // Remove the specified item from storage
    public function destroy( $id)
    {

        $item = CompanyItem::findOrFail($id);
        $company = $item->company;
        $item->delete();

        return redirect()->route('admin.company_items.index', $company->id)->with('success', 'Company item deleted successfully');
    }
}
