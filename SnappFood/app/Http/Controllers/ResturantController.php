<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Manager;
use App\Models\Resturant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use thecodeholic\phpmvc\View;

class ResturantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('managers.resturants.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =Category::all();
        return  view('managers.resturants.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' =>'required',
            'phone' => 'required',
            'account_number' => 'required',
            'city' => 'required',
            'street' => 'required',
            'pluck' => 'required',
        ]);

        if(!$request->user('manager')->resturant()->first()) {
            $resturant = $request->user('manager')->resturant()->create([
                'name' => $request->name,
                'number' => $request->phone,
                'account_number' => $request->account_number,

            ]);
            $resturant->categories()->attach($request->category);
            $resturant->address()->create([
                'width' => '5',
                'height' => '5',
                'city' => $request->city,
                'street' => $request->street,
                'pluck' => $request->pluck,
            ]);
        }

return redirect('/managerdashboard/resturant-info');
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
        //
    }
}
