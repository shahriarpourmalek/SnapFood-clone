<?php

namespace App\Http\Controllers;

use App\Charts\AllSalesChart;
use App\Charts\LastMonthIncomeChart;
use App\Exports\OrderExport;
use App\Exports\ReportExport;
use App\Models\Address;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    public function index(Request $request)
    {
        $totalIncome = 0;
        $totalSales = 0;

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

        return view('managers.order_management.report',
            [
                'user' => User::all(),
                'orders' => $orders,
                'address' => Address::all(),
            ]);


    }


}
