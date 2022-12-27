<?php

use App\Http\Controllers\UserControllers\AddressController;
use App\Http\Controllers\UserControllers\AuthUserController;
use App\Http\Controllers\UserControllers\Commentcontroller;
use App\Http\Controllers\UserControllers\OrderController;
use App\Http\Controllers\UserControllers\SearchController;
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
    Route::prefix('addresses')->group(function () {
        Route::get('', [AddressController::class, 'getAddress']);
        Route::post('', [AddressController::class, 'addAddress']);
        Route::post('/{id}', [AddressController::class, 'setCurrentaddress']);
    });
    Route::prefix('resturants')->group(function () {
        Route::get('{resturant_id}', [UserResturantsConroller::class, 'getAddress']);
        Route::get('', [UserResturantsConroller::class, 'getAllAdrresses']);
        Route::get('{resturant_id}/foods', [UserResturantsConroller::class, 'getAllFoods']);

    });
    Route::prefix('carts')->group(function () {
        Route::post('add', [OrderController::class, 'addToCart']);
        Route::get('', [OrderController::class, 'getCarts']);
        Route::get('{cart_id}', [OrderController::class, 'getCartInfo']);
        Route::put('{cart_id}/pay', [OrderController::class, 'payCard'])->whereNumber('cart_id');
        Route::put('/update', [OrderController::class, 'update']);
Route::delete('/delete',[OrderController::class,'delete']);
    });

    Route::post('/comments', [CommentController::class, 'store']);
    Route::get('/comments', [CommentController::class, 'index']);



    Route::patch('/update/{id}', [AuthUserController::class, 'update']);
    Route::post('/logout', [AuthUserController::class, 'logout']);

    Route::get('/search-nears',[SearchController::class,'findRestaurant']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
