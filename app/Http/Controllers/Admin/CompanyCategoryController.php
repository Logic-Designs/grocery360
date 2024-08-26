<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyCategoryRequest;
use App\Http\Requests\UpdateCompanyCategoryRequest;
use App\Models\CompanyCategory;
use Illuminate\Http\Request;

class CompanyCategoryController extends Controller
{
    // Display a listing of the categories
    public function index()
    {
        $categories = CompanyCategory::all();
        return view('admin.company_categories.index', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('admin.company_categories.create');
    }

    // Store a newly created category in storage
    public function store(StoreCompanyCategoryRequest $request)
    {
        $category = new CompanyCategory();
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('admin.company_categories.index')->with('success', 'Category created successfully');
    }

    // Show the form for editing the specified category
    public function edit($id)
    {
        $category = CompanyCategory::find($id);
        if (!$category) {
            return redirect()->route('admin.company_categories.index')->with('error', 'Category not found');
        }
        return view('admin.company_categories.edit', compact('category'));
    }

    // Update the specified category in storage
    public function update(UpdateCompanyCategoryRequest $request, $id)
    {
        $category = CompanyCategory::find($id);
        if (!$category) {
            return redirect()->route('admin.company_categories.index')->with('error', 'Category not found');
        }
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('admin.company_categories.index')->with('success', 'Category updated successfully');
    }

    // Remove the specified category from storage
    public function destroy($id)
    {
        $category = CompanyCategory::find($id);
        if ($category) {
            $category->delete();
            return redirect()->route('admin.company_categories.index')->with('success', 'Category deleted successfully');
        }
        return redirect()->route('admin.company_categories.index')->with('error', 'Category not found');
    }
}
