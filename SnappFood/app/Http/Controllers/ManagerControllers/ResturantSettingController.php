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
    /**
     *
     */
    public function __construct()
    {
        $this->middleware('auth:manager');
    }

    /**
     * @param Resturant $resturant
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Resturant $resturant)
    {
        return view('managers.resturant_setting.index', ['resturant' => Auth::guard('manager')->user()->resturant()->first()]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function deliveryCostPage($id)
    {
        return view('managers.resturant_setting.deliverycost', ['resturant' => Auth::guard('manager')->user()->resturant()->first()]);
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addDeliveryCost(Request $request, $id)
    {
        $request->validate([
            'delivery_cost' => 'required|integer'
        ]);
        $resturant = $request->user('manager')->resturant()->where('id', $id)->update([
            'delivery_cost' => $request->delivery_cost
        ]);
        return redirect('/restaurant-setting');
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function workTimePage()
    {
        $days = ['saturday', 'sunday', 'monday', 'tuesday', 'thursday', 'wednesday', 'friday'];
        return view('managers.resturant_setting.setworktime', [
            'days' => $days,
        ]);
    }


    /**
     * @param WorkTimeRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeTime(WorkTimeRequest $request)
    {
        $request->validated();
        Schedule::create([
            'day_of_week' => $request->day_of_week,
            'open_time' => $request->open_time,
            'close_time' => $request->close_time,
            'resturant_id' => Auth::guard('manager')->user()->resturant()->get()->first()->id
        ]);
        return redirect('/restaurant-setting/working-time');
    }


    //make  edit  and  update for day work

    /**
     * @return void
     */
    public function editWorkTime($id)
    {
        $days = ['saturday', 'sunday', 'monday', 'tuesday', 'thursday', 'wednesday', 'friday'];

        return view('managers.resturant_setting.edit_work_time',[
            'days' => $days,
            'resturant' => Auth::guard('manager')->user()->resturant()->first(),
        ]);
    }
    /**
     * @param WorkTimeRequest $request
     * @return void
     */
    public function updateWorkTime(WorkTimeRequest $request,$id)
    {
Schedule::all()->where('resturant_id',$id)->first()->update([
    'day_of_week' => $request->day_of_week,
    'open_time' => $request->open_time,
    'close_time' => $request->close_time,
    'resturant_id' => Auth::guard('manager')->user()->resturant()->get()->first()->id
]);
        return redirect('/restaurant-setting/working-time');

    }
}
