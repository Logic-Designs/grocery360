<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use App\Models\ProductPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PriceController extends Controller
{
    public function index() {
        $prices = ProductPrice::first();
        $prices = $prices?json_decode($prices['prices'], true): [];

        return Response::success(
            $prices,
            'About Content retrieved successfully'
        );
    }
}
