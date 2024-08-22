<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateContactContentRequest;
use App\Models\ContactContent;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ContactContentController extends Controller
{
    public function index()
    {
        $contact = ContactContent::first();

        return view('admin.contact-content.index', compact('contact'));
    }

    public function update(UpdateContactContentRequest $request)
    {
        $data = $request->validated();

        if (isset($data['social'])) {
            $socialLinks = [];
            foreach ($data['social']['icon'] as $key => $icon) {
                $socialLinks[] = [
                    'icon' => $icon,
                    'url' => $data['social']['url'][$key]
                ];
            }
            $data['social'] = json_encode($socialLinks);
        }


        $contact = ContactContent::first();

        if($contact)
            $contact->update($data);
        else
            ContactContent::create($data);

        return back()->with('success', __('admin.Data updated successfully'));
    }
}
