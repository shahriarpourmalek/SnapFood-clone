<?php
use App\Http\Controllers\LoginController;
use App\Models\Banner;
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

    return view('index',['banners'=>Banner::all()]);
});
Route::get('login',[LoginController::class,'index'])->name('login');


require 'admins.php';


require 'managers.php';



