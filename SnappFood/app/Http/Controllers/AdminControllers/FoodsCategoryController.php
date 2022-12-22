<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodsCategoryRequest;
use App\Models\FoodsCatgory;
use Illuminate\Http\Request;

class FoodsCategoryController extends Controller
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
    public function index(FoodsCatgory $foodsCatgory)
    {

        return view('admins.foods-category.index')->with('categories',$foodsCatgory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.foods-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodsCategoryRequest $request)
    {
        $request->validated();

        $newImageName = time() .'-'.$request->name.'.'.$request->file('icon')->guessExtension();


        FoodsCatgory::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'icon' => $newImageName
        ]);
        $request->file('icon')->move(public_path('images/foods-category-images'),$newImageName);

        return redirect('/admindashboard/foods-category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admins.foods-category.show',['category'=>FoodsCatgory::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('admins.foods-category.edit')->with('category',    FoodsCatgory::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FoodsCategoryRequest $request, $id)
    {
        $request->validated();
        $newImageName = time() .'-'.$request->name.'.'.$request->file('icon')->guessExtension();
        FoodsCatgory::where('id',$id)->
        update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'icon' => $newImageName
        ]);
        $request->file('icon')->move(public_path('images/foods-category-images'),$newImageName);

        return redirect('/admindashboard/foods-category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = FoodsCatgory::all()->find($id)->firstOrFail();
        $category->delete();
        return back();
    }
}
