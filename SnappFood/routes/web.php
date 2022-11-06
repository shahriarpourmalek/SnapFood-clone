<?php


use App\Http\Controllers\admincontrollers\AdminLoginController;
use App\Http\Controllers\admincontrollers\AdminPageController;
use App\Http\Controllers\admincontrollers\DiscountController;
use App\Http\Controllers\admincontrollers\FoodsCategoryController;
use App\Http\Controllers\admincontrollers\ResturantsCategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\managercontrollers\FoodManagingController;
use App\Http\Controllers\managercontrollers\LoginManagerController;
use App\Http\Controllers\managercontrollers\ManagerDashboardController;
use App\Http\Controllers\managercontrollers\RegisterManagerController;
use App\Http\Controllers\managercontrollers\ResturantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('index');
});
Route::get('/login',[LoginController::class,'index'])->name('login');


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
//    Route::resource('/resturant-options',ResturantController::class);

//manager routes
    Route::get('',[ManagerDashboardController::class,'dashboard'])->name('managerdashboard');
    Route::get('/logout',[LoginManagerController::class,'destroy']);

//managers resturant controller
    Route::resource('/resturant-info',ResturantController::class);
    //managers foods managing controller
    Route::resource('/food-managing',FoodManagingController::class);
    Route::get('/food-managing/{id}/add-discount',[\App\Http\Controllers\managercontrollers\AddDiscountController::class,'discount']);
    Route::put('/food-managing/add-discount/{id}',[\App\Http\Controllers\managercontrollers\AddDiscountController::class,'addDiscount']);
});





//Route::get('/users-login',[LoginUserController::class,'index']);

