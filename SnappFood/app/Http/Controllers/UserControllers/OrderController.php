<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartsResource;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    public function getCarts()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();

        return response(CartsResource::collection($orders));
    }


    public function addToCart(Request $request)
    {
        $request->validate([
            'food_id' => 'required|exists:foods,id',
            'count' => 'required|integer'
        ]);

        $order = Order::where(
            ['user_id' => auth()->user()->id],
            ['resturant_id' => Food::find($request->food_id)->resturant->id]
        )->first();
        if ($order) {
            $foods = $order->foods->pluck('id')->toArray();
            if (in_array($request->food_id, $foods)) {
                return response(['Message' => 'This food is exist to your card already']);
            } else {
                $order->foods()->attach(['food_id' => $request->food_id], ['count' => $request->count]);

                $totalPrice = $order->total_price;
                $order->total_price = $totalPrice + Food::find($request->food_id)->price * $request->count;
                $order->save();
            }
        } else {
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'resturant_id' => Food::find($request->food_id)->resturant->id,
                'total_price' => Food::find($request->food_id)->price * $request->count,
            ]);
            $order->foods()->attach(['food_id' => $request->food_id], ['count' => $request->count]);

        }
        return response(['Message' => 'Food added to card successfully', 'Cart ID' => $order->id]);
    }

    public function getCartInfo($cart_id)
    {
        $order = Order::find($cart_id);

        return response(new CartsResource($order));
    }

    public function update(Request $request)
    {
        $request->validate([
            'food_id' => 'required',
            'count' => 'required|integer'
        ]);

        $order = Order::where([
            'resturant_id' => Food::find($request->food_id)->resturant->id,
            'user_id' => auth()->user()->id
        ])->first();
        $order->foods()->updateExistingPivot(
            ['food_id' => $request->food_id],
            ['count' => $request->count]
        );
        return response(['Message' => 'Food updated to card successfully']);

    }

    public function payCard($id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return response(['Message' => "this isn't your cart"]);
        };
        if ($order->is_paid === 0) {

            $order->update([
                'is_paid' => 1
            ]);
            return response(['Message' => "cart number $id paid successfully"]);
        }

    }

    public function delete(Request $request)
    {
        $request->validate([
            'food_id' => 'required|exists:foods,id',
        ]);

        $order = Order::where([
            'resturant_id' => Food::find($request->food_id)->resturant->id,
            'user_id' => auth()->user()->id
        ])->first();
        $order->foods()->detach($request->food_id);
        return response(['Massage' => 'this order  is deleted']);
    }

}
