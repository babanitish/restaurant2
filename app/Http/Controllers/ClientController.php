<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\Category;
use App\Models\orderProduct;
use App\Models\Product;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
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
        return view('client.book', [

        ]);
    }

    /**
     * 
     */
    public function about()
    {
        return view('client.about', [

        ]);
    }

    /**
     * 
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
     * 
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


    public function UserProfile(){
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	return view('client.profile.user_profile',[
            'user' => $user,
        ]);
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

    public function profileOrder(){
        $order_id = Order::select(['id'])->where('user_id', Auth::id())->first();
         $orderProduct = orderProduct::where('order_id', $order_id)->get();
        //    dd($orderProduct);
        return view('client.profile.order',[
             'orderProduct' => $orderProduct
        ]);
    }
}
