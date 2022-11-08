<?php

use App\Http\Controllers\TradeLink\TradelinkController;
use App\Http\Controllers\Auth\TradelinkLoginController;
use App\Http\Controllers\Tradelink\ServiceController;
use App\Http\Controllers\Tradelink\ServiceCategoryController;
use App\Http\Controllers\Tradelink\SubscriberController;
use Illuminate\Support\Facades\Route;

//
//Route::get('vendor-signup', [\App\Http\Controllers\Tradelink\VendorController::class,'showSignupForm'])->name('trade.vendor.register');
//Route::post('vendor-signup',[\App\Http\Controllers\Tradelink\VendorController::class,'register']);




/**
 * Tradelink login / Auth routes
 */

Route::get('tradelink/login',[TradelinkLoginController::class,'showLoginForm'])->name('tradelink.login');
Route::post('tradelink/login',[TradelinkLoginController::class,'login']);
Route::get('tradelink/logout',[TradelinkLoginController::class,'logout'])->name('tradelink.logout');


Route::group(['prefix' =>'tradelink','middleware'=>['auth:tradelink_admin']], function ()
{
    Route::get('tradelink-change-password',[TradelinkController::class,'changePassword'])->name('tradelink.change.password');
    Route::post('update-tradelink-password',[TradelinkController::class,'updatePassword'])->name('tradelink.update.password');

    Route::get('tradelink-edit-profile',[TradelinkController::class,'editProfile'])->name('tradelink.change.profile');
    Route::post('update-tradelink-profile',[TradelinkController::class,'updateProfile'])->name('tradelink.update.profile');

    Route::get('tradelink-setting',[TradelinkController::class,'settings'])->name('tradelink.settings');
    Route::post('tradelink-setting-upadte',[TradelinkController::class,'updateSettings'])->name('tradelink.update.settings');

    Route::get('dashboard',[\App\Http\Controllers\Admin\TradelinkController::class,'index'])->name('tradelink.dashboard');
    Route::resource('service-list',\App\Http\Controllers\Tradelink\ServiceController::class);

    Route::get('tradelink-subscriber',[TradelinkController::class,'getSubscribers']);
    Route::post('delete-subscriber',[TradelinkController::class,'deleteSubscriber']);

    Route::resource('service-category',\App\Http\Controllers\Tradelink\ServiceCategoryController::class);
    Route::get('vendor-list',[\App\Http\Controllers\Admin\VendorController::class,'vendors'])->name('all.vendors');
    Route::post('delete-vendor',[\App\Http\Controllers\Admin\VendorController::class,'destroy'])->name('delete.vendor');
    Route::get('edit-vendor/{id}',[\App\Http\Controllers\Admin\VendorController::class,'edit'])->name('tradelink.vendor.edit');
    Route::post('update-vendor-status/{id}',[\App\Http\Controllers\Admin\VendorController::class,'update'])->name('update.tradelink.status');
});


Route::post('tradelink-subscribe-us',[TradelinkController::class,'subscribeUs'])->name('tradelink.subscribeus');
