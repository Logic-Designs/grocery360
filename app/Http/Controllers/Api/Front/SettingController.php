<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Support\Facades\Response;

class SettingController extends Controller
{
    public function index() {
        $setting = Setting::first();

        return Response::success(
            new SettingResource($setting),
            'Settings retrieved successfully'
        );
    }
}
