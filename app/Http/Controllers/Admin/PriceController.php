<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ProductPricesImport;
use App\Models\ProductPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class PriceController extends Controller
{
    public function index()
    {
        $prices = ProductPrice::first();
        $prices = $prices?json_decode($prices['prices'], true): [];

        return view('admin.prices.index', compact('prices'));
    }


    public function upload(Request $request)
    {
        $request->validate([
            'price_file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new ProductPricesImport, $request->file('price_file'));
            return redirect()->route('admin.prices.index')->with('success', 'Prices updated successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors(['price_file' => $e->getMessage()]);
        }
    }

    function objectToArray($object) {
        // Check if the input is an object
        if (is_object($object)) {
            // Convert the object to an array
            $object = (array) $object;
        }

        // Check if the input is an array
        if (is_array($object)) {
            // Recursively convert array items
            return array_map('objectToArray', $object);
        } else {
            // Return the non-array value
            return $object;
        }
    }
}
