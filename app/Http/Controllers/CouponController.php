<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(){
        $coupons = Coupon::orderBy('id','DESC')->get();
        return view('admin.coupon.index',[
            'coupons' => $coupons
        ]);
    }
   
    public function addCoupon(){
        return view('admin.coupon.addcoupon');
    }
   
    public function store(Request $request){
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {

            $this->validate($request, [
                'coupon_name' => 'required',
                'coupon_discount' => 'required',
                'coupon_validity' => 'required',
            ]);
            $coupon = new Coupon();
            $coupon->name = $request->input('coupon_name');
            $coupon->discount = $request->input('coupon_discount');
            $coupon->validity = $request->input('coupon_validity');
            $coupon->created_at = Carbon::now();

            $coupon->save();
            return back()->with('status', 'coupon crée');
        } else {
            return redirect()->route('login');
        }
    }

    public function edit($id){
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupon.edit',[
            'coupon' => $coupon
        ]);
    }

    public function update(Request $request, $id){
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            $coupon = Coupon::findOrFail($id);

            $this->validate($request, [
                'coupon_name' => 'required',
                'coupon_discount' => 'required',
                'coupon_validity' => 'required',
            ]);
            $coupon->name = strtoupper($request->input('coupon_name'));
            $coupon->discount = $request->input('coupon_discount');
            $coupon->validity = $request->input('coupon_validity');
            $coupon->created_at = Carbon::now();

            $coupon->save();
            return back()->with('status', 'coupon modifié');
        } else {
            return redirect()->route('login');
        }
    }

    public function delete($id){
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return back()->with('status', 'coupon supprimé');

    }

}
