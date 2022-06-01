<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{


    /**
     * Il ajoute un produit au panier.
     * 
     * @param Request request The request object.
     * 
     * @return The product is being returned.
     */
    public function ajouter(Request $request)
    {
        $product = Product::findOrFail($request->id);
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price,
            'options' => ['poster_url' => $product->poster_url]
        ])->associate('App\Product');

        return redirect()->route('menu')->with('status', 'produit a été ajouté');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.cartList');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * La fonction de mise à jour prend le rowId et la quantité comme paramètres et met à jour le panier avec la
     * nouvelle quantité
     * 
     * @param Request request The request object.
     * @param rowId The unique identifier for the item in the cart.
     */
    public function update(Request $request, $rowId)
    {
        $quantity = $request->input('qty');
        Cart::update($rowId, $quantity);
    }


    /**
     * Il supprime le produit du panier.
     * 
     * @param rowId The unique ID of the item in the cart.
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return back()->with('status', 'le produit a été supprimé');
    }
    /**
     * Il efface tous les articles du panier.
     */
    public function clearAllCart()
    {
        Cart::destroy();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return  view('cart.cartList');
    }
}
