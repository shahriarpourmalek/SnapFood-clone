<?php

namespace App\Http\Controllers\managercontrollers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddFoodRequest;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Food;
use App\Models\FoodsCatgory;
use Illuminate\Http\Request;

class FoodManagingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:manager');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Food $foods)
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
    public function create()
    {
         $foodsCatgory = FoodsCatgory::class;
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

        Food::create([
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

    public function edit(Food $foods, $id)
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

        Food::find($id)->update([
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
        Food::destroy($id);
        return redirect('/managerdashboard/food-managing');
    }


}
