<?php

namespace App\Http\Controllers\managercontrollers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddFoodRequest;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Foods;
use App\Models\FoodsCatgory;
use Illuminate\Http\Request;

class FoodManagingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Foods $foods)
    {

        return view('managers.food-managing.index', [
            'foods' => $foods::all(),
            'discount' => Discount::all()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FoodsCatgory $foodsCatgory)
    {
        return view('managers.food-managing.create', ['categories' => $foodsCatgory::all()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddFoodRequest $request)
    {
        $request->validated();

        $newImageName = time() . '-' . $request->name . '.' . $request->file('image')->guessExtension();

        Foods::create([
            'name' => $request->name,
            'raw_material' => $request->raw_material,
            'price' => $request->price,
            'image' => $newImageName,
            'foods_category_id' => $request->food_category,
            'resturant_id' => $request->user('manager')->resturant()->first()->id,
        ]);
        $request->file('image')->move(public_path('images/foods-image'), $newImageName);

        return redirect('/managerdashboard/food-managing');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Foods $foods, $id)
    {
        return view('managers.food-managing.edit', [
            'food' =>          $foods::find($id),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddFoodRequest $request, $id)
    {
        $newImageName = time() . '-' . $request->name . '.' . $request->file('image')->guessExtension();

        Foods::find($id)->update([
            'name' => $request->name,
            'raw_material' => $request->raw_material,
            'price' => $request->price,
            'image' => $newImageName,
            'foods_category_id' => $request->food_category,
            'resturant_id' => $request->user('manager')->resturant()->first()->id,
        ]);
        $request->file('image')->move(public_path('images/foods-image'), $newImageName);
        return redirect('/managerdashboard/food-managing');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Foods::destroy($id);
        return redirect('/managerdashboard/food-managing');
    }



}
