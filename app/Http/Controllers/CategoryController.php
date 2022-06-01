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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
    public function store(Request $request)
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            $this->validate($request, ['name' => 'required|unique:categories']);

            $category = new Category();
            $category->name = $request->input('name');
            $category->save();

            return back()->with('status', 'category success');
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
            $category = Category::find($id);

            return view('admin.category.editcategory', [
                'category' => $category
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
            $this->validate($request, ['name' => 'required|unique:categories']);

            $category = Category::find($id);

            $category->name = $request->input('name');
            $category->update();

            return redirect('/categories')->with('status', 'category updated successful');
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
