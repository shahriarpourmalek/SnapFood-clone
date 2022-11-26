<?php

namespace App\Http\Controllers\managercontrollers;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Food;
use Illuminate\Http\Request;

class AddDiscountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:manager');
    }

    public function discount(Food $foods, $id)
    {

        return view('managers.food-managing.add-discount', [
            'discounts' => Discount::all(),
            'food' => $foods::find($id)
        ]);
    }

    public function addDiscount(Request $request, $id)
    {
        Food::find($id)->update([
            'discount_id' => $request->discount
        ]);
        return redirect('/managerdashboard/food-managing');

    }
}
