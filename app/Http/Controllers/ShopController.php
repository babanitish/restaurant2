<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\orderProduct;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Ajout de produit dans la table Shop
     */
    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        if (Auth::check()) {
            $prod_check = Product::where('id', $product_id)->first();

            if ($prod_check) {

                if (Shop::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {

                    return response()->json(['status' => $prod_check->name . ' ' . "already added to cart"]);
                } else {
                    $shopItem = new Shop();
                    $shopItem->product_id = $product_id;
                    $shopItem->user_id = Auth::id();
                    $shopItem->save();

                    return response()->json(['status' => $prod_check->name . ' ' . "added to cart"]);
                }
            }
        } else {
            return response()->json(['status' => "login please"]);
        }
    }

    /**
     * 
     *
     */
    public function cartView()
    {
        $cartItems = Shop::where('user_id', Auth::id())->get();

        return view('cart.cartList', [
            'cartItems' => $cartItems
        ]);
    }

    /**
     * 
     */

    public function deleteCart(Request $request)
    {
        if (Auth::check()) {
            $product_id = $request->input('product_id');
            if (Shop::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
            $item = Shop::where('product_id', $product_id)->where('user_id', Auth::id())->first();
            //dd($item);
            $item->delete();
            return response()->json(['status' => "deleted success"]);

            }

        } else {
            return response()->json(['status' => "login please"]);
        }
    }

    /**
     * update cart 
     */

     public function updateCart(Request $request){
       
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');
    
         if(Auth::check()){
          
            if (Shop::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                $shop = Shop::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $shop->quantity = $quantity;
                $shop->update();

                return response()->json(["status" => "updated"]);
            }

         }else {
             return response()->json(["status" => "login please"]);
         }
     }


     public function checkout(){
         $cartItems = Shop::where('user_id',Auth::id())->get();
         return view('cart.checkout',[
             'cartItems' => $cartItems
         ]);
     }

     public function place_order(Request $request){
         $order = new Order();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        $order->phone = $request->input('number');
        $order->save();

        $cartItems = Shop::where('user_id',Auth::id())->get();
        foreach($cartItems as $item){
           orderProduct::create([
               'order_id' => $order->id,
               'product_id' => $item->product_id,
               'quantity' => $item->quantity,
               'price' => $item->product->price
           ]);
        }

        if(Auth::user()->address == null){
            $user = User::where('id',Auth::id())->first();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->phone = $request->input('number');
            $user->update();
        }

     }
}
