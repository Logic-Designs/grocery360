<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ProductPricesImport;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PriceController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'prices.shop')->get();
        return view('admin.prices.index', compact('products'));
    }


    public function upload(Request $request)
    {
        $request->validate([
            'price_file' => 'required|mimes:xlsx,xls,csv',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate all tables
        ProductPrice::truncate();
        Product::truncate();
        Category::truncate();
        Shop::truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Import new data from the Excel file
        Excel::import(new ProductPricesImport, $request->file('price_file'));

        return redirect()->route('admin.prices.index')->with('success', 'Prices updated successfully.');
    }
}
