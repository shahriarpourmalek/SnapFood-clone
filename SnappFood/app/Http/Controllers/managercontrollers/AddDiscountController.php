<?php

namespace App\Http\Controllers\managercontrollers;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Foods;
use Illuminate\Http\Request;

class AddDiscountController extends Controller
{
    public function discount(Foods $foods, $id)
    {

        $discounts = Discount::all();
        return view('managers.food-managing.add-discount', [
            'discounts' => $discounts,
            'food' => $foods::find($id)
        ]);
    }
    public function addDiscount(Request $request, $id){
        Foods::find($id)->update([
            'discount_id' => $request->discount
        ]);
        return redirect('/managerdashboard/food-managing');

    }
}
