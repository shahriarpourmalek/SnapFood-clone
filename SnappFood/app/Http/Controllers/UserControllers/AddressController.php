<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddressRequest;
use App\Models\Address;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function getAddress()
    {
        return auth()->user()->address()->get();
    }

    public function addAddress(UserAddressRequest $request)
    {
        $request->validated();

        Address::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'latitude' => $request->latitude,
            'address' => $request->address,
            'longitude' => $request->longitude,
        ]);

        return [
            'massage' => 'address added successfully',
        ];
    }





    public function setCurrentAddress(Request $request, $id)
    {
        Auth::user()
            ->update([
                'current_address' => $id,
            ]);
        return ['msg' => 'current address sets'.$id];
    }

}
