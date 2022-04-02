<?php

namespace App\Http\Controllers;

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
}
