<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class Admincontroller extends Controller
{
    /**
     * Elle renvoie une vue appelée admin.user, qui est une vue qui affiche tous les utilisateurs de la base de données.    * 
     * @return La vue "admin.user" avec la variable .
     */
    public function user()
    {
        $users = User::all();
        return view("admin.user", [
            'users' => $users
        ]);
    }
    /**
     * Il supprime un utilisateur de la base de données
     * 
     * @param id L'identifiant de l'utilisateur que vous voulez supprimer.
     * 
     * @return L'utilisateur est supprimé de la base de données.
     */
    public function deleteuser($id)
    {

        $users = User::find($id);
        $users->delete();
        return redirect()->back();
    }




    /**
     * la méthode obtient toutes les réservations de la base de données et les renvoie à la vue     * 
     * @return La vue est renvoyée.
     */
    public function viewReservation()
    {

        $reservations = Reservation::all();

        return view("admin.reservation", [
            'reservations' => $reservations
        ]);
    }



    /**
     * Elle renvoie une vue appelée admin.order, qui est un modèle de lame, et lui passe un tableau de commandes.     */
    public function viewOrder()
    {

        $orders = Order::all();
        return view("admin.order", [
            'orders' => $orders
        ]);
    }
}
