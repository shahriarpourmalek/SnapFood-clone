<?php

namespace App\Http\Controllers\managercontrollers;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Models\Address;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\Resturant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderManagerConroller extends Controller
{
    public function index(Request $request)
    {
       $orders = Order::where('resturant_id', Resturant::where('manager_id',auth()->guard('manager')->id())->first()->id)->orderBy('created_at')->get();
        $index = 0;

        if ($request->filter == 'lastWeek') {
            foreach ($orders as $order) {
                if (Carbon::now()->diff($order->created_at)->days > 7) unset($orders[$index]);
                $index++;
            }
        }
        elseif ($request->filter == 'lastMonth'){
            foreach ($orders as $order) {
                if (Carbon::now()->diff($order->created_at)->days > 30) unset($orders[$index]);
                $index++;
            }
        }
        elseif ($request->filter == 'lastYear'){
            foreach ($orders as $order) {
                if (Carbon::now()->diff($order->created_at)->days > 365) unset($orders[$index]);
                $index++;
            }
        }


        return view('managers.order_management.index',
            [
                'user' => User::all(),
                'orders' =>$orders ,
                'address' => Address::all(),
            ]);
    }
    public function showOrder($order_id)
    {
        $order = Order::find($order_id);
        return view('managers.order_management.show_order' ,[
            'order'=> $order,
            'address' => Address::all(),
            'user' => User::all(),

        ]);
    }
    public function update(Request $request,$order_id)
    {
        $order = Order::find($order_id);

$order->update([
    'order_status' => $request->status
]);
SendEmailJob::dispatch($order);

return redirect( '/managerdashboard/manage-orders');
    }

}
