<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {

            $categories = Category::all();
            return view('admin.category.categories', [
                'categories' => $categories
            ]);
        } else {
            return redirect()->route('login');
        }
    }


    /**
     * Elle renvoie une vue si l'utilisateur est un administrateur, sinon elle redirige vers la page de connexion.    * 
     * @return La vue est retournée.
     */
    public function addcategory()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            return view('admin.category.addcategory');
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
    /**
     * Il valide la demande, crée une nouvelle catégorie, l'enregistre, puis redirige vers la page précédente avec un message 
     * cela se fait que si l'utilisateur est un administrateur, sinon elle redirige vers la page de connexion.
     * @param \Illuminate\Http\Request  $request
     * 
     * @return The return value of the last statement executed in the method.
     */
    public function store(Request $request)
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            $this->validate($request, ['name' => 'required|unique:categories']);

            $category = new Category();
            $category->name = $request->input('name');
            $category->save();

            return back()->with('status', 'categorie créée');
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
    /**
     * C'est une fonction qui renvoie une vue.
     * 
     * @param id L'identifiant de la catégorie qu'on veut modifier.
     * 
     * @return La vue est retournée.
     */
    public function edit($id)
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            $category = Category::find($id);

            return view('admin.category.editcategory', [
                'category' => $category
            ]);
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Il prend la requête, la valide, trouve la catégorie, met à jour la catégorie, et redirige
     * l'utilisateur
     * 
     * @param Request request The request object.
     * @param id L'id de la catégorie à mettre à jour
     * 
     * @return La catégorie est mise à jour et l'utilisateur est redirigé vers la page des catégories.
     * avec un message.
     */
    public function update(Request $request, $id)
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            $this->validate($request, ['name' => 'required|unique:categories']);

            $category = Category::find($id);

            $category->name = $request->input('name');
            $category->update();

            return redirect('/categories')->with('status', 'category updated ');
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
    /**
     * Il supprime une catégorie de la base de données
     * 
     * @param id L'identifiant de la catégorie qu'on veut supprimer.
     * 
     * @return avec un message 
     */
    public function delete($id)
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            $category = Category::find($id);
            $category->delete();

            return back()->with('status', 'delete success');
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
    public function destroy($id)
    {
        //
    }
}
