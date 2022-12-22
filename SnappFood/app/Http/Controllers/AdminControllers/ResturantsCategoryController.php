<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResturantCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class ResturantsCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        return view('admins.resturant-category.index', ['categories'=>$category::all()]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResturantCategoryRequest $request)
    {

        $newImageName = time() . '-' . $request->name . '.' . $request->file('icon')->guessExtension();
        Category::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'icon' => $newImageName
        ]);
        $request->file('icon')->move(public_path('images/category-images'), $newImageName);

        return redirect('/restaurant-category');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
return view('admins.resturant-category.show',['category'=>Category::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admins.resturant-category.edit')->with('category', Category::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResturantCategoryRequest $request, $id)
    {
        $request->validated();

        $newImageName = time() . '-' . $request->name . '.' . $request->file('icon')->guessExtension();
        Category::where('id', $id)->
        update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'icon' => $newImageName
        ]);
        $request->file('icon')->move(public_path('images/category-images'), $newImageName);

        return redirect('/restaurant-category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Category::find($id)->delete();
        return redirect('/restaurant-category');

    }
}
