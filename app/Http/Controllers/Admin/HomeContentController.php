<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateHomeContentRequest;
use App\Models\HomeContent;
use App\Services\ImageService;
use Illuminate\Http\Request;

class HomeContentController extends Controller
{
    public function index()
    {
        $home = HomeContent::first();

        return view('admin.home-content.index', compact('home'));
    }

    public function update(UpdateHomeContentRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('image')){
            $data['image'] = (new ImageService())->store($request->image, 'page');
        }

        if ($request->hasFile('pdf')) {
            // Store the PDF file directly in the public folder
            $pdfFile = $request->file('pdf');
            $pdfFileName = 'pdfs/' . $pdfFile->getClientOriginalName();
            $pdfFile->move(public_path('pdfs'), $pdfFileName);

            $data['pdf'] = $pdfFileName;
        }

        $home = HomeContent::first();

        if($home)
            $home->update($data);
        else
            HomeContent::create($data);

        return back()->with('success', __('admin.Data updated successfully'));
    }
}
