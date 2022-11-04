<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ResturantsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Category::all();
        return view('admins.resturant-category.index')->with('categories',$datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.resturant-category.create');
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
            'name' => 'required',
            'slug' => 'required',
            'icon' => 'required|mimes:jpg,png,jpeg|max:10096'
        ]);

        $newImageName = time() .'-'.$request->name.'.'.$request->file('icon')->guessExtension();


Category::create([
   'name' => $request->input('name'),
   'slug' => $request->input('slug'),
   'icon' => $newImageName
]);
        $request->file('icon')->move(public_path('images/category-images'),$newImageName);

        return redirect('/admindashboard/resturant-category');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all()->find($id)->firstOrFail();
        return view('admins.resturant-category.edit')->with('category',$category);
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
            'name' => 'required',
            'slug' => 'required',
            'icon' => 'required|mimes:jpg,png,jpeg|max:10096'
        ]);

        $newImageName = time() .'-'.$request->name.'.'.$request->file('icon')->guessExtension();
        Category::where('id',$id)->
        update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'icon' => $newImageName
        ]);
        $request->file('icon')->move(public_path('images/category-images'),$newImageName);

        return redirect('/admindashboard/resturant-category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::all()->find($id)->firstOrFail();
        $category->delete();
        return redirect('/admindashboard/resturant-category');

    }
}
