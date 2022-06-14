<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    /**
     * Si l'utilisateur est connecté et est un administrateur, affiché- la page des produits. Sinon, redirigez-le vers
     * la page de connexion.
     * 
     * @return La vue est renvoyée.
     */
    public function product()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {

            $products = Product::all();
            return view('admin.product.products', [
                'products' => $products
            ]);
        } else {
            return redirect()->route('login');
        }
    }


    /**
     * permet à l'admin d'ajouter des produits 
     * 
     * @return The view is being returned.
     */

    public function addproduct()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {

            $categories = Category::all();
            $products = Product::all();
            return view('admin.product.addproduct', [
                'products' => $products,
                'categories' => $categories
            ]);
        } else {
            return redirect()->route('login');
        }
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
     * la méthode prend la requête du formulaire, la valide, puis enregistre l'image dans le dossier public, puis
     * enregistre le reste des données dans la base de données.
     * 
     * @param Request request The request object.
     */
    public function store(Request $request)
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {

            $this->validate($request, [
                'product_name' => 'required',
                'product_price' => 'required',
                'product_description' => 'required',
                'product_category' => 'required',


            ]);
            $product = new product();
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('product_poster'), $imageName);;
            $product->poster_url = $imageName;

            $product->name = $request->input('product_name');
            $product->price = $request->input('product_price');
            $product->description = $request->input('product_description');
            $product->category_id = $request->input('product_category');
            $product->status = 1;
            $product->save();
            return back()->with('status', 'produit crée');
        } else {
            return redirect()->route('login');
        }
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
     * Il s'agit d'une fonction qui permet à l'administrateur de modifier un produit.
     * 
     * @param id L'identifiant du produit qu'on veut modifier.
     * 
     * @return The La vue est retrournée
     */
    public function edit($id)
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            $product = Product::find($id);

            $categories = Category::all();

            return view('admin.product.editproduct', [
                'product' => $product,
                'categories' => $categories
            ]);
        } else {
            return redirect()->route('login');
        }
    }


    /**
     * Il prend l'identifiant du produit à mettre à jour, il valide la requête, il trouve
     * le produit dans la base de données, ensuite il met à jour le produit avec les nouvelles données, puis il vérifie si 
     * l'utilisateur a téléchargé une nouvelle image, il stocke la nouvelle image, puis il supprime l'ancienne image si
     * ce n'est pas l'image par défaut, il met à jour le produit dans la base de données, puis il redirige
     * l'utilisateur vers la page des produits avec un message de réussite.
     * 
     * @param Request request The request object.
     * @param id The id of the product to be updated.
     */
    public function update(Request $request, $id)
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            $this->validate($request, [
                'product_name' => 'required',
                'product_price' => 'required',
                'product_description' => 'required',
                'product_category' => 'required',
            ]);

            $product = Product::find($id);

            $product->name = $request->input('product_name');
            $product->price = $request->input('product_price');
            $product->price = $request->input('product_description');
            $product->category_id = $request->input('product_category');

            if ($request->hasFile('product_image')) {
                $fileNameExt = $request->file('product_image')->getClientOriginalName();

                $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);

                $ext = $request->file('product_image')->getClientOriginalExtension();

                $fileNameToStore = $fileName . '_' . time() . '.' . $ext;

                $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);

                //supprimer l'ancienne photo si c'est pas le default.png
                // pck le default.pgn doit être permanent
                if ($product->poster_url != 'default.png') {
                    Storage::delete('public/product_images' . $product->poster_url);
                }

                $product->poster_url = $fileNameToStore;
            }
            $product->update();

            return redirect('/products')->with('status', 'product has been  update successful');
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Il supprime le produit de la base de données et si le produit a une image, il supprime l'image'
     * du stockage et tout ceci est possible que par l'admin
     * 
     * @param id L'identifiant du produit à supprimer
     * 
     * @return message de réussite
     */
    public function delete($id)
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            $product = Product::find($id);

            if ($product->poster_url != 'default.png') {
                Storage::delete('public/product_images' . $product->poster_url);
            }

            $product->delete();

            return back()->with('status', 'produit supprimé');
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * active le produit si son statu est à 0.
     *
     * @param  int  $id du produit qu'on veut activer
     * @return 
     */

    public function activer($id)
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            $product = Product::find($id);

            $product->status = 1;

            $product->update();

            return back();
        } else {
            return redirect()->route('login');
        }
    }


    /**
     * desactive le produit.
     *
     * @param  int   $id du produit qu'on veut desactiver
     * @return 
     */
    public function desactiver($id)
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            $product = Product::find($id);

            $product->status = 0;
            $product->update();

            return back();
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Elle retourne une vue avec les produits qui ont le même category_id que l'id passé dans la fonction.  * 
     * @param id l'id de la catégorie
     */
    public function select_par_category($id)
    {
        $products = Product::all()->where('category_id', $id)->where('status', 1);
        $categories = Category::all();
        return view('client.home', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function search(){
        $products = Product::select('name')->where('status','1')->get();
       // dd($products);
        $data = [];
        foreach($products as $item){
            $data[] = $item['name'];
        }
        return $data;
    }

    public function searchProduct(Request $request ){
        $productName = $request->input('product_name');
        $product = Product::where('name','LIKE','%'.$productName.'%')->with('category')->get();
   
        if($productName != ''){
            if($product){
                return view('admin.product.search',[
                    'product' => $product,
                ]);
            }else{
                return redirect()->back()->with('status',"pas disponible");
            }
            return redirect()->back();
        }
        
    }

     /**
     * It returns the first order of the user.
     * 
     * @return The order id of the user.
     */
    public function myOrder()
    {
        $order = DB::table('orders')->where('user_id', Auth::id())
        ->orderByDesc('created_at')
        ->get();
        
        return view('client.profile.order', [
            'order' => $order,
        ]);
    }

    public function orderDetail($id)
    {
        $order = Order::where('id',$id)->where('user_id', Auth::id())->first();
        //  dd($order);
        return view('client.profile.order_view', [
            'order' => $order,
        ]);
    }
}
