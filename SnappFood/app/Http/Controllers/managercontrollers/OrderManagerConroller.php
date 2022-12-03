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
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderManagerConroller extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::where('resturant_id', auth()->guard('manager')->user()->resturant()->first()->id)->get();

        if ($request->filter == 'lastWeek') {
            $orders = Order::where('resturant_id', auth()->guard('manager')->user()->resturant()->first()->id,)
                ->where('created_at', '>', Carbon::now()->subDays(7))
                ->get();
        } elseif ($request->filter == 'lastMonth') {
            $orders = Order::where('resturant_id', auth()->guard('manager')->user()->resturant()->first()->id,)
                ->where('created_at', '>', Carbon::now()->subDays(30))
                ->get();
        } elseif ($request->filter == 'lastYear') {
            $orders = Order::where('resturant_id', auth()->guard('manager')->user()->resturant()->first()->id,)
                ->where('created_at', '>', Carbon::now()->subDays(360))
                ->get();
        }

        return view('managers.order_management.index',
            [
                'total_income' => 0,
                'user' => User::all(),
                'orders' => $orders,
                'address' => Address::all(),
            ]);
    }

    public function showOrder($order_id)
    {
        $order = Order::find($order_id);
        return view('managers.order_management.show_order', [
            'order' => $order,
            'address' => Address::all(),
            'user' => User::all(),

        ]);
    }

    public function update(Request $request, $order_id)
    {
        $order = Order::find($order_id);

        $order->update([
            'order_status' => $request->status
        ]);
        SendEmailJob::dispatch($order);

        return redirect('/managerdashboard/manage-orders');
    }

    public function archives(Request $request)
    {
        $orders = Order::where('resturant_id', auth()->guard('manager')->user()->resturant()->first()->id)->get();

        if ($request->filter == 'lastWeek') {
            $orders = Order::where('resturant_id', auth()->guard('manager')->user()->resturant()->first()->id,)
                ->where('created_at', '>', Carbon::now()->subDays(7))
                ->get();
        } elseif ($request->filter == 'lastMonth') {
            $orders = Order::where('resturant_id', auth()->guard('manager')->user()->resturant()->first()->id,)
                ->where('created_at', '>', Carbon::now()->subDays(30))
                ->get();
        } elseif ($request->filter == 'lastYear') {
            $orders = Order::where('resturant_id', auth()->guard('manager')->user()->resturant()->first()->id,)
                ->where('created_at', '>', Carbon::now()->subDays(360))
                ->get();
        }
        return view('managers.order_management.archives',
            [
                'user' => User::all(),
                'orders' => $orders,
                'address' => Address::all(),
            ]);
    }
}
