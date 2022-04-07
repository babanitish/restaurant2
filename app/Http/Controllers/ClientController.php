<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdateProfileRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function home(){
        return view('client.home');
    }

    public function menu(){
        return view('client.menu');
    }
    public function book(){
        return view('client.book');
    }
    public function about(){
        return view('client.about');
    }
    function redirects(){
        $usertype = Auth::user()->usertype;
        //dd($usertype);
        if($usertype == '1'){
            return view('admin.admin_home');
        }
        else{
            return view('client.home');
        }
    }


    public function profileUpdate(Request $request){

        $request->validate([
            'name' =>'required|min:4|string|max:255',
            'email'=>'required|email|string|max:255',
            'password'=>'required|confirmed'

        ]);

        auth()->user()->update($request->only('name', 'email'));

        if ($request->input('password')) {
            auth()->user()->update([
                'password' => bcrypt($request->input('password'))
            ]);
        }

        return redirect()->route('profile')->with('message', 'Profile saved successfully');
    }
}