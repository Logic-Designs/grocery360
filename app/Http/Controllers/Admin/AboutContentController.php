<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAboutContentRequest;
use App\Models\AboutContent;
use App\Services\ImageService;
use Illuminate\Http\Request;

class AboutContentController extends Controller
{
    public function index()
    {
        $about = AboutContent::first();

        return view('admin.about-content.index', compact('about'));
    }

    public function update(UpdateAboutContentRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('image1')){
            $data['image1'] = (new ImageService())->store($request->image1, 'page');
        }

        if($request->hasFile('image2')){
            $data['image2'] = (new ImageService())->store($request->image2, 'page');
        }

        $about = AboutContent::first();

        if($about)
            $about->update($data);
        else
            AboutContent::create($data);

        return back()->with('success', __('admin.Data updated successfully'));
    }
}
