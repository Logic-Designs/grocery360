<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supermarket\StoreSupermarketRequest;
use App\Http\Requests\Supermarket\UpdateSupermarketRequest;
use App\Models\Supermarket;
use App\Services\ImageService;
use App\Services\PdfService;
use Illuminate\Http\Request;

class SupermarketController extends Controller
{
    // Display a list of supermarkets
    public function index()
    {
        $supermarkets = Supermarket::all();
        $uniqueAddresses = Supermarket::pluck('address')->unique(); // Get unique addresses
        return view('admin.supermarkets.index', compact('supermarkets', 'uniqueAddresses'));
    }

    // Show the form for creating a new supermarket
    public function create()
    {
        return view('admin.supermarkets.create');
    }

    // Store a newly created supermarket in the database
    public function store(StoreSupermarketRequest $request)
    {
        $data = $request->validated();


        if ($request->hasFile('logo')) {
            $data['logo'] =  (new ImageService())->store($request->logo, 'offer');
        }

        if ($request->hasFile('image')) {
            $data['image'] = (new ImageService())->store($request->image, 'offer');
        }

        if ($request->hasFile('pdf')) {
            $data['pdf'] = (new PdfService())->store($request->file('pdf') );
        }

        Supermarket::create($data);

        return redirect()->route('admin.supermarkets.index')->with('success', 'Supermarket created successfully.');
    }

    // Show the form for editing a specific supermarket
    public function edit($id)
    {
        $supermarket = Supermarket::findOrFail($id);
        $uniqueAddresses = Supermarket::pluck('address')->unique(); // Get unique addresses

        return view('admin.supermarkets.edit', compact('supermarket', 'uniqueAddresses'));
    }

    // Update a specific supermarket in the database
    public function update(UpdateSupermarketRequest $request, $id)
    {
        $data = $request->validated();

        $supermarket = Supermarket::findOrFail($id);

        if ($request->hasFile('logo')) {
            $data['logo'] =  (new ImageService())->store($request->logo, 'offer');
        }

        if ($request->hasFile('image')) {
            $data['image'] = (new ImageService())->store($request->image, 'offer');
        }

        if ($request->hasFile('pdf')) {
            $data['pdf'] = (new PdfService())->store($request->file('pdf') );
        }

        $supermarket->update($data);

        return redirect()->route('admin.supermarkets.index')->with('success', 'Supermarket updated successfully.');
    }

    // Remove a specific supermarket from the database
    public function destroy($id)
    {
        $supermarket = Supermarket::findOrFail($id);
        $supermarket->delete();
        return redirect()->route('admin.supermarkets.index')->with('success', 'Supermarket deleted successfully.');
    }
}
