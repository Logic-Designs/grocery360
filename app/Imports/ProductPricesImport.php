<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\Shop;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductPricesImport implements ToCollection
{


    public function collection(Collection $rows)
    {
        $shops = [];
        foreach($rows[0] as $key=>$column){
            if($key && $key != 1){
                $shop = Shop::create(['name'=> $column]);
                $shops[$key] = $shop->id;
            }
        }
        foreach($rows as $key=> $row){
            if($key){
                $category = Category::firstOrCreate(['name'=> $row[0]]);
                $product = Product::firstOrCreate(['name'=> $row[1], 'category_id'=> $category->id]);
                foreach($row as $columnKey=> $column){
                    if($columnKey !=0 && $columnKey !=1){
                        ProductPrice::create(['product_id'=> $product->id, 'shop_id'=> $shops[$columnKey], 'price'=> $column]);
                    }
                }
            }
        }
    }
}
