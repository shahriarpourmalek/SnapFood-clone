<?php

use App\Http\Controllers\managercontrollers\AddDiscountController;
use App\Http\Controllers\managercontrollers\FoodManagingController;
use App\Http\Controllers\managercontrollers\LoginManagerController;
use App\Http\Controllers\managercontrollers\ManagerCommentController;
use App\Http\Controllers\managercontrollers\ManagerDashboardController;
use App\Http\Controllers\managercontrollers\OrderManagerConroller;
use App\Http\Controllers\managercontrollers\RegisterManagerController;
use App\Http\Controllers\managercontrollers\ReportController;
use App\Http\Controllers\managercontrollers\ResturantController;
use App\Http\Controllers\managercontrollers\ResturantSettingController;
use Illuminate\Support\Facades\Route;


//sign up routes
Route::prefix('managers-register')->group(function () {
    Route::get('', [RegisterManagerController::class, 'create'])->name('manager-register');
    Route::post('', [RegisterManagerController::class, 'store'])->name('managers-register');
});
//manager login routes
Route::prefix('managers-login')->group(function () {
    Route::get('', [LoginManagerController::class, 'create'])->name('managers-login');
    Route::post('', [LoginManagerController::class, 'authenticate'])->name('managers-login');
});

Route::group(['middleware' => 'auth:manager'], function () {
    Route::get('managerdashboard', [ManagerDashboardController::class, 'dashboard'])->name('managerdashboard');
    Route::get('logout', [LoginManagerController::class, 'destroy'])->name('managers.logout');
    Route::prefix('restaurant-setting')->group(function () {
        Route::get('', [ResturantSettingController::class, 'index'])->name('managers.restaurant-setting.index');
        Route::get('{id}/add-delivery-cost', [ResturantSettingController::class, 'deliveryCostPage'])->name('managers.restaurant-setting.add-delivery-cost');
        Route::put('/add-delivery-cost/{resturant_id}', [ResturantSettingController::class, 'addDeliveryCost'])->name('managers.restaurant-setting.store-delivery-cost');
        Route::get('/working-time', [ResturantSettingController::class, 'workTimePage'])->name('managers.restaurant-setting.worktimepage');
        Route::post('/working-time', [ResturantSettingController::class, 'storeTime'])->name('managers.restaurant-setting.storeworktime');
        Route::get('/{id}/working-time', [ResturantSettingController::class, 'editWorkTime'])->name('managers.restaurant-setting.editworktime');
        Route::put('/working-time/{id}', [ResturantSettingController::class, 'updateWorkTime'])->name('managers.restaurant-setting.updateworktime');

    });


    Route::resource('restaurant-info', ResturantController::class, ['names' => [
        'index' => 'managers.restaurant-info.index',
        'create' => 'managers.restaurant-info.create',
        'show' => 'managers.restaurant-info.show',
        'edit' => 'managers.restaurant-info.edit',
        'store' => 'managers.restaurant-info.store',
        'update' => 'managers.restaurant-info.update',
        'destroy' => 'managers.restaurant-info.delete'
    ]
    ]);
    Route::resource('food-managing', FoodManagingController::class, ['names' => [
        'index' => 'managers.food-managing.index',
        'create' => 'managers.food-managing.create',
        'show' => 'managers.food-managing.show',
        'edit' => 'managers.food-managing.edit',
        'store' => 'managers.food-managing.store',
        'update' => 'managers.food-managing.update',
        'destroy' => 'managers.food-managing.delete'
    ]
    ]);
    Route::get('/food-managing/{id}/add-discount', [AddDiscountController::class, 'discount'])->name('managers.food-managing.add-discount');
    Route::put('/food-managing/add-discount/{id}', [AddDiscountController::class, 'addDiscount'])->name('managers.food-managing.add-discount');

    Route::get('/manage-orders', [OrderManagerConroller::class, 'index'])->name('managers.manage-orders.index');
    Route::get('/manage-orders/{order_id}', [OrderManagerConroller::class, 'showOrder'])->name('managers.manage-orders.showorder');
    Route::put('/manage-orders/{order_id}', [OrderManagerConroller::class, 'update'])->name('managers.manage-orders.update');
    Route::get('/orders-archive', [OrderManagerConroller::class, "archives"])->name('managers.manage-orders.archives');


    Route::get('/comment-manager', [ManagerCommentController::class, 'index'])->name('managers.comment-manager.index');
    Route::put('/comment-manager/answer/{id}', [ManagerCommentController::class, 'answer'])->name('managers.comment-manager.answer');
    Route::put('/comment-manager/{id}/accept', [ManagerCommentController::class, 'accept'])->name('managers.comment-manager.accept');
    Route::put('/comment-manager/{id}/deleterequest', [ManagerCommentController::class, 'deleteRequest'])->name('managers.comment-manager.deleterequest');

    Route::get('/archive-of-orders', [OrderManagerConroller::class, 'archives'])->name('managers.reports.index');

});



