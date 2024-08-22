<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutContentResource;
use App\Models\AboutContent;
use Illuminate\Support\Facades\Response;

class AboutContentController extends Controller
{
    public function index() {
        $about_content = AboutContent::first();

        return Response::success(
            new AboutContentResource($about_content),
            'About Content retrieved successfully'
        );
    }
}
