<?php

use App\Http\Controllers\UserControllers\AddressController;
use App\Http\Controllers\UserControllers\AuthUserController;
use App\Http\Controllers\UserControllers\UserResturantsConroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('user')->group(function () {
    Route::post('/user-register', [AuthUserController::class, 'register']);
    Route::post('/login', [AuthUserController::class, 'login']);

});


    //protected routes
    Route::group(['middleware' => ['auth:sanctum']], function () {
Route::prefix('addresses')->group(function (){
    Route::get('', [AddressController::class, 'getAddress']);
    Route::post('', [AddressController::class, 'addAddress']);
    Route::post('/{id}', [AddressController::class, 'setCurrentaddress']);
});
Route::prefix('resturants')->group(function (){
    Route::get('{resturant_id}',[UserResturantsConroller::class,'getAddress']);
    Route::get('',[UserResturantsConroller::class,'getAllAdrresses']);

});
        Route::patch('/update/{id}',[AuthUserController::class,'update']);

        Route::post('/logout', [AuthUserController::class, 'logout']);
    });


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
