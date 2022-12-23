<?php

namespace App\Http\Controllers\managercontrollers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResturantRequest;
use App\Models\Category;
use App\Models\Manager;
use App\Models\Resturant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use thecodeholic\phpmvc\View;

class ResturantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:manager');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Resturant $resturant)
    {
        ;
        return view('managers.resturants.index', ['resturant' => Auth::guard('manager')->user()->resturant()->first()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return view('managers.resturants.create', ['categories' => $category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResturantRequest $request)
    {
        $request->validated();

        if (!$request->user('manager')->resturant()->first()) {
            $resturant = $request->user('manager')->resturant()->create([
                'name' => $request->name,
                'number' => $request->phone,
                'account_number' => $request->account_number,
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' =>$request->longitude,
                'delivery_cost' => $request->delivery_cost
            ]);
            $resturant->categories()->attach($request->category);

        }

        return redirect('/restaurant-info');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Resturant $resturant, $id)
    {
        return view('managers.resturants.show', ['resturant' => Auth::guard('manager')
            ->user()
            ->resturant()
            ->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Category $category)
    {

        return view('managers.resturants.edit', [
            'resturant' => Auth::guard('manager')->user()->resturant()->find($id),
            'categories' => $category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResturantRequest $request, $id)
    {
        $request->validated();


        $resturant = $request->user('manager')->resturant()->where('id', $id)->update([
            'name' => $request->name,
            'number' => $request->phone,
            'account_number' => $request->account_number,
            'address' => $request->address,
           'latitude' => $request->latitude,
            'longitude' =>$request->longitude,
            'delivery_cost' => $request->delivery_cost
        ]);
        $request->user()->resturant()->find($id)->categories()->attach($request->category);
        return redirect('/restaurant-info');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
