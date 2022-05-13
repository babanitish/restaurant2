<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Reservation;
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
        $count = Shop::where('user_id', $user_id)->count();

        return view('client.home', [
            'products' => $products,
            'categories' => $categories,
            'count' => $count,


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
        $count = Shop::where('user_id', $user_id)->count();
        return view('client.menu', [
            'products' => $products,
            'categories' => $categories,
            'count' => $count,

        ]);
    }
    /**
     * 
     */
    public function book()
    {
        $user_id = Auth::id();
        $count = Shop::where('user_id', $user_id)->count();
        return view('client.book', [
            'count' => $count,

        ]);
    }

    /**
     * 
     */
    public function about()
    {
        $user_id = Auth::id();
        $count = Shop::where('user_id', $user_id)->count();
        return view('client.about', [
            'count' => $count,

        ]);
    }

    /**
     * 
     */
    function redirects()
    {
        $user_id = Auth::id();
        $count = Shop::where('user_id', $user_id)->count();
        $products = Product::all();
        $categories = Category::all();

        $usertype = Auth::user()->usertype;
        //dd($usertype);
        if ($usertype == '1') {
            return view('admin.admin_home');
        } else {
            return view('client.home', [
                'products' => $products,
                'count' => $count,
                'categories' => $categories,

            ]);
        }
    }


    /**
     * 
     */
    public function profileUpdate(Request $request)
    {

        $request->validate([
            'name' => 'required|min:4|string|max:255',
            'email' => 'required|email|string|max:255',
            'password' => 'required|confirmed'

        ]);

        auth()->user()->update($request->only('name', 'email'));

        if ($request->input('password')) {
            auth()->user()->update([
                'password' => bcrypt($request->input('password'))
            ]);
        }

        return redirect()->route('profile')->with('message', 'Profile saved successfully');
    }

    /**
     * 
     */
    public function UserLogout()
    {
        Auth::logout();

        $notifications = array(
            'message' => 'User logout SuccessFuly !',
            'alert-type' => 'success'
        );


        return redirect()->route('login')->with($notifications);
    }

    /**
     * reservation 
     */


    public function reservation(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'guest' => 'required',
            'time' => 'required',
            'date' => 'required',
        ]);


        $reservation = new reservation;
        $reservation->user_id = Auth::id();
        $reservation->name = $request->input('name');
        $reservation->phone = $request->input('phone');
        $reservation->email = $request->input('email');
        $reservation->guest = $request->input('guest');
        //  $reservation->date = $request->input('date');
        $reservation->time = $request->input('time');
        $reservation->message = $request->input('message');
        $reservation->save();

        return redirect()->route('menu');
    }
}
