<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index')->with("categories", $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.add');

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
        $request->validate([
            'title' => 'required',
        ]);
        if ($request->hasFile('cat_image')) {
            $image = $request->file('cat_image');
            $reImage = env('APP_NAME') . '-' . uniqid() . '-' . $image->getClientOriginalName();
            $dest = public_path('/images');
            $image->move($dest, $reImage);
        } else {
        }
        $category = Category::firstOrCreate([
            "title" => $request->title,
            "detail" => $request->detail ?? null,
            "image" => $reImage ?? null,
        ]);

        return redirect('admin/category/create')->with('success', 'Category has been added');
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
        $category = Category::find($id);
        return view('backend.category.update')->with('category',$category);
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
        $request->validate([
            'title' => 'required',
        ]);
        if ($request->hasFile('cat_image')) {
            $image = $request->file('cat_image');
            $reImage = env('APP_NAME') . '-' . uniqid() . '-' . $image->getClientOriginalName();
            $dest = public_path('/images');
            $image->move($dest, $reImage);
        } else {
            $reImage=$request->cat_image;
        }
        $category = Category::find($id)->update([
            "title" => $request->title,
            "detail" => $request->detail ?? null,
            "image" => $reImage ?? null,
        ]);

        return redirect('admin/category/'.$id.'/edit')->with('success', 'Category has been added');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id)->delete();
        return redirect('admin/category/');
    }
}
