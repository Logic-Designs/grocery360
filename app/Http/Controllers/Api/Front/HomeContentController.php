<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeContentResource;
use App\Models\HomeContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class HomeContentController extends Controller
{
    public function index() {
        $home_content = HomeContent::first();

        return Response::success(
            new HomeContentResource($home_content),
            'Home Content retrieved successfully'
        );
    }
}
