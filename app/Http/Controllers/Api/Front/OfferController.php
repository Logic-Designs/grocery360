<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\OfferResource;
use App\Models\Offer;
use Illuminate\Support\Facades\Response;

class OfferController extends Controller
{
    public function index() {
        $offers = Offer::all();

        return Response::success(
            OfferResource::collection($offers),
            'Offers retrieved successfully'
        );
    }

    public function show($id) {
        $offer = Offer::findOrFail($id);

        return Response::success(
            new OfferResource($offer),
            'Offer retrieved successfully'
        );
    }
}
