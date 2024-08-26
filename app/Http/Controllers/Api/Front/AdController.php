<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdResource;
use App\Models\Ad;
use Illuminate\Support\Facades\Response;

class AdController extends Controller
{
    /**
     * Display the first ad record.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $ad = Ad::first();

        return Response::success(
            new AdResource($ad),
            'Ads retrieved successfully'
        );
    }
}
