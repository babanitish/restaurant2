<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {

            $this->validate($request, [
                'product_name' => 'required',
                'product_price' => 'required',
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
            return back()->with('status', 'product created successful');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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

            return back()->with('status', 'product has been delete success');
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * active le produit.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
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

    public function select_par_category($id)
    {
        $products = Product::all()->where('category_id', $id)->where('status', 1);
        $categories = Category::all();
        return view('client.home', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
