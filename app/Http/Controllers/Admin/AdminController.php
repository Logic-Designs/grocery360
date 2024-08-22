<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditAdminSettingRequest;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use App\Models\Setting;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {
        // dd(Auth::guard('admin')->user());
        $admins = Admin::paginate(8);
        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        Admin::create($data);

        return back()->with('success', 'Admin created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $data = $request->validated();
        // dd($data);
        if($data['password']){
            $data['password'] = Hash::make($data['password']);
        }
        else{
            unset($data['password']);
        }

        $admin->update($data);

        return back()->with('success', 'Admin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return back()->with('success', 'Admin deleted successfully');
    }

    public function dashboard()
    {
        $setting = Setting::first();
        return view('admin.dashboard', compact('setting'));
    }

    public function editSetting(EditAdminSettingRequest $request)
    {
        $data = $request->validated();
        $user = Auth::guard('admin')->user();
        if($request->new_password){
            $data['password'] = Hash::make($request->new_password);
        }
        if($request->hasFile('image')){
            $data['image'] = (new ImageService())->store($request->image, 'admin/profile');
        }

        $user->update($data);

        return back()->with('success', 'User update successfully');
    }
}
