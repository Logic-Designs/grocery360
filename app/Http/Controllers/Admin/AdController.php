<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAdRequest;
use App\Models\Ad;
use App\Services\ImageService;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        // Get the first ad record
        $ad = Ad::first();

        return view('admin.ads.index', compact('ad'));
    }

    public function update(UpdateAdRequest $request)
    {
        $data = $request->validated();

        // Handle image1 upload
        if ($request->hasFile('image1')) {
            $data['image1'] = (new ImageService())->store($request->image1, 'ads');
        }

        // Handle image2 upload
        if ($request->hasFile('image2')) {
            $data['image2'] = (new ImageService())->store($request->image2, 'ads');
        }

        // Handle image3 upload
        if ($request->hasFile('image3')) {
            $data['image3'] = (new ImageService())->store($request->image3, 'ads');
        }

        // Get the existing ad record or create a new one
        $ad = Ad::first();

        if ($ad) {
            $ad->update($data);
        } else {
            Ad::create($data);
        }

        return back()->with('success', __('admin.Data updated successfully'));
    }
}
