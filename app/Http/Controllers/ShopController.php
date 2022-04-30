<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ShopController extends Controller
{
    public function addProduct(Request $request){
        $product_id = $request->input('product_id');
        if (Auth::check()) {
            $prod_check = Product::where('id', $product_id)->first();

            if ($prod_check) {

                if (Shop::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    
                    return response()->json(['status' => $prod_check->name.' '. "already added to cart"]);
                
                
                } else {
                    $shopItem = new Shop();
                    $shopItem->product_id = $product_id;
                    $shopItem->user_id = Auth::id();
                    $shopItem->save();

                    return response()->json(['status' => $prod_check->name. ' '. "added to cart"]);
                }
            }
        } else {
            return response()->json(['status' => "login please"]);
        }
    }
}
