<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Order;
use App\Models\orderProduct;
use App\Models\User;
use Carbon\Carbon;

class CheckoutController extends Controller
{

    /**
     * Si l'utilisateur est connecté, afficher la page de paiement, sinon rediriger vers la page de connexion.    * 
     * @return Une vue appelée checkout.index
     */
    public function index()
    {
        if (Auth::check()) {
            return view('checkout.index');
        } else {
            return redirect()->route('login');
        }
    }


    public function payer(Request $request)
    {

        /* Ceci valide le formulaire et enregistre les données dans la base de données. */
        $this->validate($request, [
            'checkCondition' => 'required',
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'number' => 'required',
        ]);



        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        $order->phone = $request->input('number');
        $order->amount = Cart::total();
        $order->created_at = Carbon::now();
        $order->save();

        /* Il s'agit d'une boucle foreach qui parcourt le panier et crée un nouveau orderProduct. */
        foreach (Cart::content() as $item) {

            orderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->qty,
                'price' => $item->price,
                'created_at' => Carbon::now(),
            ]);
        }

        /* Ceci est une vérification pour voir si l'utilisateur a une adresse. Si ce n'est pas le cas, alors nous mettons à jour son
        l'adresse de l'utilisateur. */
        if (Auth::user()->address == null) {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->phone = $request->input('number');
            $user->update();
        }
        /* Le code  crée une charge en utilisant l'API Stripe. */
        Stripe::setApiKey("sk_test_51KcCE2BT18jGCwi9AhrV5lrLXAbn7j6Bvxb6ncdEORySoin8kpdcLKd9uO2QyvoeJXDUlxoSflrPlIJbTptJpJzP00LNizTrzW");


        $charge = Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'usd',
            'description' => 'payment for order no ',
            'source' => $request->input('stripeToken'),
            'statement_descriptor' => 'Custom descriptor',
            'metadata' => ['order_id' => $order->id]
        ]);
        // dd($charge);


        Cart::destroy();

        return redirect()->route('merci')->with(["status" => "votre payement a été accepté Merci."]);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
