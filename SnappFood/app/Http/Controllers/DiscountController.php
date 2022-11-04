<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\FoodsCatgory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Discount::all();
        return view('admins.discount-manager.index')->with('discounts',$datas);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admins.discount-manager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = Carbon::now();
        $request->validate([
            'title' => 'required',
            'expire_time' => "required|after:$now",
            'amount' => 'required|integer|digits_between:1,100'
        ]);



        Discount::create([
            'title' => $request->title,
            'expire_time' => $request->expire_time,
            'amount' => $request->amount
        ]);

        return redirect('/admindashboard/discount-manager');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discount = Discount::all()->find($id)->firstOrFail();
        $discount->delete();
        return redirect('/admindashboard/discount-manager');    }
}
