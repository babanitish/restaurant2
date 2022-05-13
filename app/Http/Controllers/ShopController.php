<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\orderProduct;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Gloudemans\Shoppingcart\Facades\Cart;

class ShopController extends Controller
{



    /**
     * Ajout de produit dans la table Shop
     */
    public function addProduct(Request $request)
    {
        $user_id = Auth::id();

        $count = Shop::where('user_id',$user_id)->count();

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
     *  liste des produits dans le panier 
     *
     */
    public function cartView($id)
    {
        $cartItems = Shop::where('user_id', Auth::id())->get();
        $count = Shop::where('user_id',$id)->count();
        // dd($count);
        return view('cart.cartList', [
            'cartItems' => $cartItems,
             'count' => $count,

        ]);
    }

    /**
     * Supprime un produit dans le panier
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
     * modifier un produit dans le panier 
     */

    // public function updateCart(Request $request)
    // {

    //     $product_id = $request->input('product_id');
    //     $quantity = $request->input('quantity');

    //     if (Auth::check()) {

    //         if (Shop::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
    //             $shop = Shop::where('product_id', $product_id)->where('user_id', Auth::id())->first();
    //             // dd($shop);
    //             $shop->quantity = $quantity;
    //             $shop->update();

    //             return response()->json(["status" => "updated"]);
    //         }
    //     } else {
    //         return response()->json(["status" => "login please"]);
    //     }
    // }

    /**
     * page checkout de la commande
     */
    public function checkout()
    {
        if (Auth::check()) {
            $user_id = Auth::id();
            $count = Shop::where('user_id', $user_id)->count();
            $cartItems = Shop::where('user_id', Auth::id())->get();
            return view('checkout.index', [
                'cartItems' => $cartItems,
                'count' => $count,

            ]);
        }else{
            return redirect()->route('login');
        }
    }

    /**
     * sauvegarde des données dans la base de donnée et payement
     */
    public function place_order(Request $request)
    {
        $order = new Order();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        $order->phone = $request->input('number');
        $order->user_id = Auth::id();
        $order->created_at = Carbon::now();
        $order->save();

        $cartItems = Shop::where('user_id', Auth::id())->get();
        $total = 0;
        foreach ($cartItems as $item) {

            orderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
                
            ]);

            $total += $item->product->price * $item->quantity;
        }

        if (Auth::user()->address == null) {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->phone = $request->input('number');
            $user->update();
        }


         //Shop::destroy();


        \Stripe\Stripe::setApiKey('sk_test_51KcCE2BT18jGCwi9AhrV5lrLXAbn7j6Bvxb6ncdEORySoin8kpdcLKd9uO2QyvoeJXDUlxoSflrPlIJbTptJpJzP00LNizTrzW');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $total * 100,
            'currency' => 'usd',
            'description' => 'payment for order no ' . $order->id,
            'source' => $token,
            'statement_descriptor' => 'Custom descriptor',
            'metadata' => ['order_id' => uniqid()]
        ]);
            dd($charge);
        return redirect()->route('merci')->with(["status" => "votre payement a été accepté Merci."]);
    }
}
