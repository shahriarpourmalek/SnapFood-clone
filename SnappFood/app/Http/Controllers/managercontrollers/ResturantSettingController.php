<?php

namespace App\Http\Controllers\managercontrollers;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkTimeRequest;
use App\Models\Resturant;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResturantSettingController extends Controller
{
    public function index(Resturant $resturant)
    {
        return view('managers.resturant_setting.index', ['resturant' => Auth::guard('manager')->user()->resturant()->first()]);
    }

    public function deliveryCostPage($id)
    {
        return view('managers.resturant_setting.deliverycost',['resturant' => Auth::guard('manager')->user()->resturant()->first()]);
    }
    public function addDeliveryCost(Request $request,$id)
    {
        $request->validate([
            'delivery_cost' => 'required|integer'
        ]);
        $resturant = $request->user('manager')->resturant()->where('id', $id)->update([
            'delivery_cost' => $request->delivery_cost
        ]);
        return redirect('/managerdashboard/resturant-setting');
    }
    public function workTimePage(){

        $days = ['saturday','sunday','monday','tuesday','thursday','wednesday','friday'];
        return view('managers.resturant_setting.setworktime',['days'=>$days]);
    }

    public function storeTime(WorkTimeRequest $request)
    {
$request->validated();
     Schedule::create([
            'day_of_week' => $request->day_of_week,
            'open_time' => $request->open_time,
            'close_time' => $request->close_time,
         'resturant_id' => Auth::guard('manager')->user()->resturant()->get()->first()->id
        ]);
return redirect('/managerdashboard/resturant-setting/working-time');
    }


    //make  edit  and  update for day work
}
