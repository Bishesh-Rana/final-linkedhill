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
use App\Http\Controllers\Website\FilterController;
use Illuminate\Support\Facades\Route;


/* Routes for web pages */

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/front', [HomeController::class, 'index'])->name('home');
Route::get('filter', [FilterController::class,'basicFilter'])->name('filter');
Route::get('advance-filter', [FilterController::class,'advanceFilter'])->name('advanceFilter');
Route::get('filter-property', [FilterController::class,'filterProperty'])->name('filterProperty');

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/search', [PropertyController::class, 'search'])->name('front.search-properties');

Route::get('/login-register', [CustomerAuthController::class, 'signup'])->name('customer.signup');
Route::get('/signin', [CustomerAuthController::class, 'signin'])->name('customer.signin');
Route::get('/registerform', [CustomerAuthController::class, 'registerform'])->name('customer.registerform');
Route::post('/customer-register', [CustomerAuthController::class, 'register'])->name('customer.register');
Route::get('[/forgot-password', [CustomerAuthController::class,'forgot'])->name('customer.forgot');
Route::post('[/resetmail', [CustomerAuthController::class,'resetpasswordmail'])->name('customer.resetpasswordmail');
Route::get('/customer/verify-otp/{id}', [CustomerAuthController::class, 'verityOtp'])->name('getOtp');
Route::post('/customer/verify/{id}', [CustomerAuthController::class, 'verify'])->name('verify');
Route::get('/customer/verify-re-otp/{id}', [CustomerAuthController::class, 'otp'])->name('customer.getOtp');
Route::post('/customer-login', [CustomerAuthController::class, 'login'])->name('customer.login');
Route::get('/api-reset-password/{code}', [CustomerAuthController::class, 'resetPassword'])->name('customer.reset-password');
Route::post('/api-update-password', [CustomerAuthController::class, 'updatePassword'])->name('password.update.customer');


Route::get('/agent-registration', [AgentRegistrationController::class, 'getAgentRegistration'])->name('agent.getRegistration');
Route::post('/agent-registration', [AgentRegistrationController::class, 'postAgentRegistration'])->name('agent.postRegistration');
Route::get('/agent-login', [AgentRegistrationController::class, 'getAgentLogin'])->name('agent.getLogin');
Route::post('/agent-login', [AgentRegistrationController::class, 'postAgentLogin'])->name('agent.postLogin');
Route::post('subscribe-us', [HomeController::class, 'subscribe_us'])->name('subscribe.us');
Route::post('enquiry', [HomeController::class, 'storeEnquiry'])->name('store.enquiry');
Route::get('blog/{slug}', [HomeController::class, 'blogSingle'])->name('blog.single');
Route::get('property-detail/{id}/{slug}', [PropertyController::class, 'propertyDetail'])->name('property.detail');

Route::get('/{menu_slug}', [HomeController::class, 'getMenu'])->name('menu');
Route::get('/properties/favorite', [HomeController::class, 'favorite'])->name('favorite');
