<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Offer\StoreOffeRequest;
use App\Http\Requests\Offer\UpdateOffeRequest;
use App\Models\Offer;
use App\Services\ImageService;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    // Display a listing of the offers
    public function index()
    {
        $offers = Offer::all();
        return view('admin.offers.index', compact('offers'));
    }

    // Show the form for creating a new offer
    public function create()
    {
        return view('admin.offers.create');
    }

    // Store a newly created offer in storage
    public function store(StoreOffeRequest $request)
    {

        $offer = new Offer();
        $offer->logo =  (new ImageService())->store($request->logo, 'offer');
        $offer->image = (new ImageService())->store($request->image, 'offer');
        $offer->title = $request->input('title');
        $offer->description = $request->input('description');
        $offer->save();

        return redirect()->route('admin.offers.index')->with('success', 'Offer created successfully');
    }

    // Show the form for editing the specified offer
    public function edit($id)
    {
        $offer = Offer::find($id);
        if (!$offer) {
            return redirect()->route('admin.offers.index')->with('error', 'Offer not found');
        }
        return view('admin.offers.edit', compact('offer'));
    }

    // Update the specified offer in storage
    public function update(UpdateOffeRequest $request, $id)
    {

        $offer = Offer::find($id);
        if (!$offer) {
            return redirect()->route('admin.offers.index')->with('error', 'Offer not found');
        }

        if ($request->hasFile('logo')) {
            $offer->logo =  (new ImageService())->store($request->logo, 'offer');
        }
        if ($request->hasFile('image')) {
            $offer->image =  (new ImageService())->store($request->image, 'offer');
        }
        $offer->title = $request->input('title');
        $offer->description = $request->input('description');
        $offer->save();

        return redirect()->route('admin.offers.index')->with('success', 'Offer updated successfully');
    }

    // Remove the specified offer from storage
    public function destroy($id)
    {
        $offer = Offer::find($id);
        if ($offer) {
            $offer->delete();
            return redirect()->route('admin.offers.index')->with('success', 'Offer deleted successfully');
        }
        return redirect()->route('admin.offers.index')->with('error', 'Offer not found');
    }
}
