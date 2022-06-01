<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\Category;
use App\Models\orderProduct;
use App\Models\Product;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * 
     */
    public function home()
    {
        (Cart::content());
        $products = Product::all()->where('status', 1);
        $categories = Category::all();
        $user_id = Auth::id();

        return view('client.home', [
            'products' => $products,
            'categories' => $categories,


        ]);
    }

    /**
     * 
     */
    public function menu()
    {
        $products = Product::all()->where('status', 1);
        $categories = Category::all();
        $user_id = Auth::id();
        return view('client.menu', [
            'products' => $products,
            'categories' => $categories,

        ]);
    }
    /**
     * 
     */
    public function book()
    {
        return view('client.book', []);
    }

    /**
     * 
     */
    public function about()
    {
        return view('client.about', []);
    }

    /**
     * redirige l'utilisateur soit dans le back office soit sur l'accueil du site
     */
    function redirects()
    {
        $products = Product::all();
        $categories = Category::all();

        $usertype = Auth::user()->usertype;
        //dd($usertype);
        if ($usertype == '1') {
            return view('admin.admin_home');
        } else {
            return view('client.home', [
                'products' => $products,
                'categories' => $categories,

            ]);
        }
    }


    /**
     * Modification du profil du membre
     */
    public function profileUpdate(Request $request)
    {

        $request->validate([

            'password' => 'required|confirmed|min:7'

        ]);

        auth()->user()->update($request->only('name', 'email'));

        if ($request->input('password')) {
            auth()->user()->update([
                'password' => bcrypt($request->input('password'))
            ]);
        }

        return redirect()->route('dashboard')->with('status', 'Profile saved successfully');
    }

    /**
     * 
     */
    public function UserLogout()
    {
        Auth::logout();

        return redirect()->route('/');
    }
    /**
     * profil du membre
     */

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('client.profile.user_profile', [
            'user' => $user,
        ]);
    }

    /**
     * reservation 
     */


    public function tableBook(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'guest' => 'required|min:1',
            'time' => 'required',
            'date' => 'required',
        ]);


        if($request->input('date') < Carbon::yesterday()){
            return response()->json(['status'=>'date invalide']);
        }
        // $now = Carbon::now()->addhour()->format('H:i');
        // $moinsUneHeure = Carbon::now()->subHour(1);

        // if($request->input('time') < ($moinsUneHeure)){
        
            $reservation = new reservation;


            $reservation->user_id = Auth::id();
            $reservation->name = $request->input('name');
            $reservation->phone = $request->input('phone');
            $reservation->email = $request->input('email');
            $reservation->guest = $request->input('guest');
            $reservation->date = $request->input('date');
            $reservation->time = $request->input('time');
            $reservation->message = $request->input('message');
            //  dd($reservation);
            $reservation->save();

            return response()->json(['status' => "reservation success"]);
        }
    //     return response()->json(['status'=> 'time invalide']);

    // }
    /**
     * voir ses commandes en tant que membre
     */
    public function profileOrder()
    {
        $order_id = Order::select(['id'])->where('user_id', Auth::id())->first();
        $orderProduct = orderProduct::where('order_id', $order_id)->get();
        // dd($order_id);
        return view('client.profile.order', [
            'orderProduct' => $orderProduct
        ]);
    }

    // public function commande(){
    //     return view('client.profile.order');
    // }
}
