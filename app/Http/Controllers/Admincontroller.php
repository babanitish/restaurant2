<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class Admincontroller extends Controller
{
    public function user()
    {
        $users = User::all();
        return view("admin.user", [
            'users' => $users
        ]);
    }
    public function deleteuser($id)
    {
    
        $users = User::find($id);
        $users->delete();
        return redirect()->back();
    }


    /**
     * view reservation by admin
     */

     public function viewReservation(){

        $reservations = Reservation::all();

        return view("admin.reservation",[
            'reservations' => $reservations
        ]);
     }

     /**
     * view order by admin
     */

    public function viewOrder(){

        $orders = Order::all();
        return view("admin.order",[
            'orders' => $orders
        ]);
     }
}
