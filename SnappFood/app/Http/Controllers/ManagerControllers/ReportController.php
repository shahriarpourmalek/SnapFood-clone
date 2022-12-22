<?php

namespace App\Http\Controllers\managercontrollers;

use App\Charts\AllSalesChart;
use App\Charts\LastMonthIncomeChart;
use App\Exports\OrderExport;
use App\Exports\ReportExport;
use App\Http\Controllers\Controller;
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

        $orders = Order::where('resturant_id', auth()->guard('manager')->user()->resturant()->first()->id)->simplePaginate(15);

        if ($request->filter == 'lastWeek') {
            $orders = Order::where('resturant_id', auth()->guard('manager')->user()->resturant()->first()->id,)
                ->where('created_at', '>', Carbon::now()->subDays(7))
                ->simplePaginate(15);
        } elseif ($request->filter == 'lastMonth') {
            $orders = Order::where('resturant_id', auth()->guard('manager')->user()->resturant()->first()->id,)
                ->where('created_at', '>', Carbon::now()->subDays(30))
                ->simplePaginate(15);
        } elseif ($request->filter == 'lastYear') {
            $orders = Order::where('resturant_id', auth()->guard('manager')->user()->resturant()->first()->id,)
                ->where('created_at', '>', Carbon::now()->subDays(360))
                ->simplePaginate(15);
        }

        return view('managers.reports.report',
            [
                'orders' => $orders,
            ]);


    }


}
