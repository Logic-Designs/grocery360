<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use App\Services\ImageService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view('admin.setting.index', compact('setting'));
    }

    public function update(UpdateSettingRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('logo')){
            $data['logo'] = (new ImageService())->store($request->logo, 'page');
        }

        $setting = Setting::first();

        if($setting)
            $setting->update($data);
        else
            Setting::create($data);

        return back()->with('success', __('admin.Data updated successfully'));
    }
}
