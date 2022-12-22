<?php


use App\Http\Controllers\AdminControllers\AdminCommentController;
use App\Http\Controllers\AdminControllers\AdminLoginController;
use App\Http\Controllers\AdminControllers\AdminPageController;
use App\Http\Controllers\AdminControllers\BannerController;
use App\Http\Controllers\AdminControllers\DiscountController;
use App\Http\Controllers\AdminControllers\FoodsCategoryController;
use App\Http\Controllers\AdminControllers\ResturantsCategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admins-login')->group(function () {
    Route::get('', [AdminLoginController::class, 'create'])->name('admins-login');
    Route::post('', [AdminLoginController::class, 'authenticate'])->name('admins-login');
});
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('admindashboard', [AdminPageController::class, 'index'])->name('admindashboard');
    Route::get('logout', [AdminLoginController::class, 'destroy'])->name('admin.logout');
    Route::resource('foods-category', FoodsCategoryController::class, ['names' => [
        'index' => 'admin.foods-category.index',
        'store' => 'admin.foods-category.store',
        'update' => 'admin.foods-category.update',
        'destroy' => 'admin.foods-category.delete'
    ]
    ]);

    Route::resource('discount-manager', DiscountController::class,['names' => [
        'index' => 'admin.discount-manager.index',
        'store' => 'admin.discount-manager.store',
        'update' => 'admin.discount-manager.update',
        'destroy' => "admin.discount-manager.delete"
    ]
    ]);
    Route::resource('banner-manager', BannerController::class, ['names' => [
        'index' => 'admin.banner-manager.index',
        'store' => 'admin.banner-manager.store',
        'update' => 'admin.banner-manager.update',
        'destroy' => 'admin.banner-manager.delete'
    ]
    ]);


    Route::get('comments-manager', [AdminCommentController::class, 'index'])->name('admin.comment-manager.index');
    Route::delete('{comment}/comments-manager', [AdminCommentController::class, 'delete'])->name('admin.comments.delete');

    Route::resource('restaurant-category', ResturantsCategoryController::class, ['names' => [
        'index' => 'admin.restaurant-category.index',
        'create' => 'admin.restaurant-category.create',
        'show' => 'admin.restaurant-category.show',
        'edit' => 'admin.restaurant-category.edit',
        'store' => 'admin.restaurant-category.store',
        'update' => 'admin.restaurant-category.update',
        'destroy' => 'admin.restaurant-category.delete'
    ]
    ]);

});
