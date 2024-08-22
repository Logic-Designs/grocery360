<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\SupermarketResource;
use App\Models\Supermarket;
use Illuminate\Support\Facades\Response;

class SupermarketController extends Controller
{
    public function index() {
        $supermarkets = Supermarket::all();

        return Response::success(
            SupermarketResource::collection($supermarkets),
            'Supermarkets retrieved successfully'
        );
    }

    public function show($id) {
        $supermarket = Supermarket::findOrFail($id);

        return Response::success(
            new SupermarketResource($supermarket),
            'Supermarket retrieved successfully'
        );
    }
}
