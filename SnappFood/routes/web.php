<?php


use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\FoodsCategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginManagerController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\ManagerDashboardController;
use App\Http\Controllers\RegisterManagerController;
use App\Http\Controllers\ResturantController;
use App\Http\Controllers\ResturantsCategoryController;
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


//admin routes
Route::get('/admins-login',[AdminLoginController::class,'create'])->name('admins-login');
Route::post('/admins-login',[AdminLoginController::class,'authenticate'])->name('admins-login');
Route::get('/admindashboard',[AdminPageController::class,'index']);
Route::get('/admindashboard/logout',[AdminLoginController::class,'destroy']);


//Resturant Category Controller
Route::resource('/admindashboard/resturant-category',ResturantsCategoryController::class);

//foods Category controller
Route::resource('/admindashboard/foods-category',FoodsCategoryController::class);

//discount controller
Route::resource('/admindashboard/discount-manager',DiscountController::class);

//sign up routes
Route::get('/managers-register', [RegisterManagerController::class , 'create']);
Route::post('managers-register', [RegisterManagerController::class , 'store'])->name('managers-register');


//manager login routes
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::get('/managers-login',[LoginManagerController::class,'create'])->name('managers-login');
Route::post('/managers-login',[LoginManagerController::class,'authenticate'])->name('managers-login');

Route::resource('/managersdashboard/resturant-options',ResturantController::class);

//manager routes
Route::get('/managerdashboard',[ManagerDashboardController::class,'dashboard'])->name('managerdashboard');
Route::get('/managerdashboard/logout',[LoginManagerController::class,'destroy']);

//managers resturant controller
Route::resource('/managerdashboard/resturant-info',ResturantController::class);




//Route::get('/users-login',[LoginUserController::class,'index']);

