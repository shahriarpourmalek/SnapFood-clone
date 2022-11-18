<?php
use App\Http\Controllers\admincontrollers\AdminLoginController;
use App\Http\Controllers\admincontrollers\AdminPageController;
use App\Http\Controllers\admincontrollers\DiscountController;
use App\Http\Controllers\admincontrollers\FoodsCategoryController;
use App\Http\Controllers\admincontrollers\ResturantsCategoryController;
use Illuminate\Support\Facades\Route;

//admin routes

Route::prefix('admins-login')->group(function (){
    Route::get('',[AdminLoginController::class,'create'])->name('admins-login');
    Route::post('',[AdminLoginController::class,'authenticate'])->name('admins-login');
});
Route::prefix('admindashboard')->group(function (){
    Route::get('',[AdminPageController::class,'index']);
    Route::get('/logout',[AdminLoginController::class,'destroy']);
//Resturant Category Controller
    Route::resource('/resturant-category',ResturantsCategoryController::class);
//foods Category controller
    Route::resource('/foods-category',FoodsCategoryController::class);
//discount controller
    Route::resource('/discount-manager',DiscountController::class);
});

