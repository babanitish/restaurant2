<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Newsletter;

class ClientController extends Controller
{

    /**
     * Il renvoie une vue de la page d'accueil avec les produits et les catégories.
     */
    public function home()
    {
        (Cart::content());
        $products = Product::all()->where('status', 1);
        $categories = Category::all();

        return view('client.home', [
            'products' => $products,
            'categories' => $categories,


        ]);
    }


    /**
     * Elle renvoie une vue appelée "client.menu"  avec les produits et les catégories.
     * @return The view is being returned.
     */
    public function menu()
    {
        $products = Product::all()->where('status', 1);
        $categories = Category::all();
        return view('client.menu', [
            'products' => $products,
            'categories' => $categories,

        ]);
    }
    /**
     * Elle renvoie la vue `client.book`
     * * @return La vue est renvoyée.
     */
    public function book()
    {
        return view('client.book');
    }


    /**
     * Elle renvoie la vue `client.about`     * 
     * @return La vue est renvoyée.
     */
    public function about()
    {
        return view('client.about');
    }

    /**
     * Si l'utilisateur est un administrateur, rediriger vers la page d'accueil de l'administrateur,
     * sinon rediriger vers la page d'accueil du client.
     * 
     * @return Le type d'utilisateur de l'utilisateur qui est connecté.
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
     * Il prend la requête, la valide, met à jour le nom et l'email de l'utilisateur et si le mot de passe est présent, il met à jour le mot de passe.
     * 
     * @param Request Il s'agit de l'objet de requête qui contient toutes les informations sur la
     * demande 
     * 
     * @return The user is being returned.
     */
    public function updateMdp(Request $request)
    {
        $user = User::find(Auth::id());
        $request->validate([
            // 'name' => 'required',
            // 'email' => 'required|email',
            'password' => 'required|confirmed|min:7'

        ]);


        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // auth()->user()->update($request->only('name', 'email'));
        if ($request->input('password')) {
            auth()->user()->update([
                'password' => bcrypt($request->input('password'))
            ]);
        }
        $user->save();
        return redirect()->route('dashboard')->with('status', 'Profile saved successfully');
    }


    /**
     * Il déconnecte l'utilisateur et le redirige vers la page d'accueil.
     * 
     * @return page d'accueil
     */
    public function UserLogout()
    {
        Auth::logout();

        return redirect()->route('/');
    }


    /**
     * Il obtient l'identifiant de l'utilisateur à partir de la fonction Auth::user(), puis il trouve l'utilisateur dans la base de données et
     * renvoie la vue user_profile avec les informations de l'utilisateur.
     * 
     * @return The user object.
     */
    public function UserPassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('client.profile.user_password', [
            'user' => $user,
        ]);
    }

    public function UserProfil()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('client.profile.user_profil', [
            'user' => $user,
        ]);
    }



    public function UpdateProfil(Request $request)
    {
        $user = User::find(Auth::id());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required|',

        ]);


        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');

        // auth()->user()->update($request->only('name', 'email'));
        $user->update();
        return redirect()->route('dashboard')->with('status', 'Profile saved successfully');
    }

    public function unsubscribe()
    {
        $user = Auth::user();
        dd($user);
        $user->update([
            'name' => 'name' . $user->id,
            'email' => 'email' . $user->id,
            'password' => 'password',
        ]);

        //logout
        Auth::guard('web')->logout();

        //redirect to home page
        return redirect(route('/'));
    }

    /**
     * Je veux vérifier si la date est inférieure à hier, si c'est le cas,la réservation 
     * sera valide sinon un message d'erreur 
     * 
     * @param Request request The request object.
     */
    public function tableBook(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'guest' => 'required|min:1',
            'time' => 'required',
            'date' => 'required|date',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->error()->toArray()]);
        }

        if ($request->input('date') < Carbon::yesterday()) {
            return response()->json(['status' => 'date invalide']);
        }

        $reservation = new reservation;


        $reservation->user_id = Auth::id();
        $reservation->name = $request->input('name');
        $reservation->phone = $request->input('phone');
        $reservation->email = $request->input('email');
        $reservation->guest = $request->input('guest');
        $reservation->date = $request->input('date');
        $reservation->time = $request->input('time');
        $reservation->message = $request->input('message');
        $reservation->save();

        return response()->json(['status' => "reservation success"]);
    }
    /**
     * It takes the email address from the form, and subscribes the user to the newsletter list
     * 
     * @param Request request The request object
     * 
     * @return The newsletter method is returning a redirect to the homepage.
     */
    public function newsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        Newsletter::subscribeOrUpdate($request->input('email'), ['firstname' => 'bob'], 'newsletter');
        return redirect()->back()->with('status', 'thank you for your subscribe');
    }


    public function mention()
    {
        return view('client.info.mention');
    }

    public function cgu()
    {
        return view('client.info.cgu');
    }

    public function cgv()
    {
        return view('client.info.cgv');
    }
    public function contact()
    {
        return view('client.info.contact');
    }
    public function saveContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->error()->toArray()]);
        }

        $contact = new contact();


        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->message = $request->input('message');
        $contact->save();

        return response()->json(['status' => "reservation success"]);
    }
}
