<?php

use App\Http\Controllers\admincontrollers\AdminCommentController;
use App\Http\Controllers\admincontrollers\AdminLoginController;
use App\Http\Controllers\admincontrollers\AdminPageController;
use App\Http\Controllers\admincontrollers\DiscountController;
use App\Http\Controllers\admincontrollers\FoodsCategoryController;
use App\Http\Controllers\admincontrollers\ResturantsCategoryController;
use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;

Route::prefix('admins-login')->group(function () {
    Route::get('', [AdminLoginController::class, 'create'])->name('admins-login');
    Route::post('', [AdminLoginController::class, 'authenticate'])->name('admins-login');
});
Route::prefix('admindashboard')->group(function () {
    Route::get('', [AdminPageController::class, 'index'])->name('admindashboard');
    Route::get('/logout', [AdminLoginController::class, 'destroy']);
    Route::resource('/resturant-category', ResturantsCategoryController::class);
    Route::resource('/foods-category', FoodsCategoryController::class);
    Route::resource('/discount-manager', DiscountController::class);
    Route::resource('/add-banner', BannerController::class);
    Route::get('/comments-manager', [AdminCommentController::class, 'index']);
    Route::delete('{comment}/comments-manager', [AdminCommentController::class, 'delete'])->name('admin.comments.delete');

});

