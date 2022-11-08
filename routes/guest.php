<?php

/**
 * Created by .
 * Routes related to guest User
 */

use App\Http\Controllers\TestController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\CustomerAuthController;
use App\Http\Controllers\Website\AgentRegistrationController;
use App\Http\Controllers\Website\PropertyController;
use Illuminate\Support\Facades\Route;


/* Routes for web pages */

Route::get('/front', [HomeController::class, 'index'])->name('home');

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/search', [PropertyController::class, 'search'])->name('front.search-properties');

Route::get('/login-register', [CustomerAuthController::class, 'signup'])->name('customer.signup');
Route::post('/customer-register', [CustomerAuthController::class, 'register'])->name('customer.register');
Route::get('/customer/verify-otp/{id}', [CustomerAuthController::class, 'verityOtp'])->name('getOtp');
Route::post('/customer/verify/{id}', [CustomerAuthController::class, 'verify'])->name('verify');
Route::get('/customer/verify-re-otp/{id}', [CustomerAuthController::class, 'otp'])->name('customer.getOtp');
Route::post('/customer-login', [CustomerAuthController::class, 'login'])->name('customer.login');
Route::get('/api-reset-password/{code}', [CustomerAuthController::class, 'resetPassword'])->name('customer.reset-password');
Route::post('/api-update-password', [CustomerAuthController::class, 'updatePassword'])->name('password.update.customer');


Route::get('/agent-registration', [AgentRegistrationController::class, 'getAgentRegistration'])->name('agent.getRegistration');
Route::post('/agent-registration', [AgentRegistrationController::class, 'postAgentRegistration'])->name('agent.postRegistration');
Route::post('subscribe-us', [HomeController::class, 'subscribe_us'])->name('subscribe.us');
Route::post('enquiry', [HomeController::class, 'storeEnquiry'])->name('store.enquiry');
Route::get('blog/{slug}', [HomeController::class, 'blogSingle'])->name('blog.single');
Route::get('property-detail/{id}/{slug}', [PropertyController::class, 'propertyDetail'])->name('property.detail');

Route::get('/{menu_slug}', [HomeController::class, 'getMenu'])->name('menu');
