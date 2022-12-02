<?php

use App\Http\Controllers\managercontrollers\AddDiscountController;
use App\Http\Controllers\managercontrollers\FoodManagingController;
use App\Http\Controllers\managercontrollers\LoginManagerController;
use App\Http\Controllers\managercontrollers\ManagerCommentController;
use App\Http\Controllers\managercontrollers\ManagerDashboardController;
use App\Http\Controllers\managercontrollers\OrderManagerConroller;
use App\Http\Controllers\managercontrollers\RegisterManagerController;
use App\Http\Controllers\managercontrollers\ResturantController;
use App\Http\Controllers\managercontrollers\ResturantSettingController;
use Illuminate\Support\Facades\Route;


//sign up routes
Route::prefix('managers-register')->group(function (){
    Route::get('', [RegisterManagerController::class , 'create']);
    Route::post('', [RegisterManagerController::class , 'store'])->name('managers-register');
});
//manager login routes
Route::prefix('managers-login')->group(function (){
    Route::get('',[LoginManagerController::class,'create'])->name('managers-login');
    Route::post('',[LoginManagerController::class,'authenticate'])->name('managers-login');
});

Route::prefix('managerdashboard')->group(function (){

//manager routes
    Route::get('',[ManagerDashboardController::class,'dashboard'])->name('managerdashboard');
    Route::get('/logout',[LoginManagerController::class,'destroy']);
//resturant setting
    Route::get('/resturant-setting',[ResturantSettingController::class,'index']);
    Route::get('/resturant-setting/{id}/add-delivery-cost',[ResturantSettingController::class,'deliveryCostPage']);
    Route::put('/rsturant-setting/add-delivery-cost/{resturant_id}',[ResturantSettingController::class,'addDeliveryCost']);
    Route::get('/resturant-setting/working-time',[ResturantSettingController::class,'workTimePage']);
    Route::post('/resturant-setting/working-time',[ResturantSettingController::class,'storeTime']);
    Route::get('/resturant-setting/{id}/working-time',[ResturantSettingController::class,'editWorkTime']);
    Route::put('/resturant-setting/working-time/{id}',[ResturantSettingController::class,'updateWorkTime']);



//managers resturant controller
    Route::resource('/resturant-info',ResturantController::class);
    //managers foods managing controller
    Route::resource('/food-managing',FoodManagingController::class);
    Route::get('/food-managing/{id}/add-discount',[AddDiscountController::class,'discount']);
    Route::put('/food-managing/add-discount/{id}',[AddDiscountController::class,'addDiscount']);

    //order management controllers
    Route::get('/manage-orders',[OrderManagerConroller::class,'index']);
    Route::get('/manage-orders/{order_id}',[OrderManagerConroller::class,'showOrder']);
    Route::put('/manage-orders/{order_id}',[OrderManagerConroller::class,'update']);


    //order comments
    Route::get('/comment-manager',[ManagerCommentController::class,'index']);
Route::put('/comment-manager',[ManagerCommentController::class,'answer']);

    //order archive
    Route::get('/archive-of-orders',[OrderManagerConroller::class,'archives']);

});



