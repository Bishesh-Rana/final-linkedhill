<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AppReviewController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\DeviceCredentialController;
use App\Http\Controllers\Api\EnquiryController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PasswordController;
use App\Http\Controllers\Api\Property\AreaSearchController;
use App\Http\Controllers\Api\Property\FavouriteController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\PropertyReviewController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\TradelinkBookingController;
use App\Http\Controllers\Api\TradelinkController;
use App\Http\Controllers\Website\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});





Route::namespace('Api')->group(function () {
    Route::post('get-services', [ServiceController::class, 'getServices']);
    Route::post('post-enquiry', [EnquiryController::class, 'store']);
    //Search Area
    Route::get('search-area', [AreaSearchController::class, 'search'])->name('search-area');
    /*   Normal login routes  */
    Route::post('registration', [LoginController::class, 'signup']);
    Route::post('login', [LoginController::class, 'login']);
    Route::post('reset-password', [PasswordController::class, 'resetPassword']);

    Route::post('get-properties', [PropertyController::class, 'properties']);
    Route::post('get-featured-properties', [PropertyController::class, 'featuredProperties']);
    Route::post('get-property-categories', [PropertyController::class, 'getCategories']);
    Route::post('get-faqs', [ApiController::class, 'getFaq']);
    Route::post('get-testimonial', [ApiController::class, 'getTestimonial']);
    Route::post('get-property', [PropertyController::class, 'property']);
    Route::post('property-by-category', [PropertyController::class, 'propertyByCategory']);
    Route::post('get-cities', [ApiController::class, 'getCities']);
    Route::post('all-cities', [ApiController::class, 'allCity']);
    Route::post('property-by-city', [PropertyController::class, 'propertyByCity']);
    Route::post('get-property-detail', [PropertyController::class, 'getPropertyDetail']);
    Route::post('get-sliders', [ApiController::class, 'getSliders']);
    Route::post('get-blogs', [BlogController::class, 'blogs']);
    Route::post('get-news', [BlogController::class, 'news']);
    Route::post('get-blog-detail', [BlogController::class, 'blogDetail']);
    Route::post('get-service-categories', [ServiceController::class, 'getServiceCategories']);

    Route::post('get-service-detail', [ServiceController::class, 'serviceDetail']);

    Route::post('get-service-by-category', [ApiController::class, 'getServiceByCategory']);
    Route::post('vendor-for-service', [ApiController::class, 'vendorForService']);
    Route::post('get-tradelink-category', [TradelinkController::class, 'tradelinkCategory']);
    Route::post('get-tradelink-children-category', [TradelinkController::class, 'tradelinkChildrenCategory']);

    Route::post('get-tradelink', [TradelinkController::class, 'tradelinkUser']);
    Route::post('get-tradelink-details', [TradelinkController::class, 'tradelinkUserDetail']);




    Route::post('get-tradelink-slider', [ApiController::class, 'tradelinkSlider']);
    Route::post('service-providers', [ApiController::class, 'serviceProviders']);
    Route::post('purpose-to-sell-property', [PropertyController::class, 'purpose']);
    Route::post('property-types', [PropertyController::class, 'propertyType']);
    Route::post('property-status', [PropertyController::class, 'propertyStatus']);

    Route::post('areas', [PropertyController::class, 'getArea']);
    Route::post('units', [PropertyController::class, 'getUnits']);
    Route::post('road-type', [PropertyController::class, 'roadType']);
    Route::post('amenties', [PropertyController::class, 'amenties']);
    Route::post('search', [SearchController::class, 'search']);
    Route::post('test', [PropertyController::class, 'test']);
    Route::post('privacy-policy', [ApiController::class, 'ourPolicy']);
    Route::post('terms-and-conditions', [ApiController::class, 'termsConditions']);
    Route::post('get-property-review', [PropertyReviewController::class, 'propertyReview']);
    Route::post('property-statistics', [PropertyReviewController::class, 'propertyStatistics']);

    Route::post('app-review-list', [AppReviewController::class, 'index']);
    Route::post('get-contacts', [ApiController::class, 'getContacts']);
});

Route::group(['namespace' => 'Api', 'middleware' => 'auth:api'], function () {
    Route::post('property-review', [PropertyReviewController::class, 'index']);
    Route::post('upload-image-profile', [LoginController::class, 'uploadProfileImage']);
    Route::post('app-review', [AppReviewController::class, 'store']);
    Route::post('update-profile', [LoginController::class, 'update']);
    Route::post('update-password', [PasswordController::class, 'changePassword']);
    Route::post('toggle-favourites', [FavouriteController::class, 'toggleFavourite']);
    Route::post('get-favourites', [FavouriteController::class, 'getFavourites']);
    /************   Post Property  ****************/
    Route::post('post-property', [PropertyController::class, 'postProperty']);
    Route::post('add-property-image', [PropertyController::class, 'addPropertyImage']);
    Route::post('logout', [LoginController::class, 'logout']);
    Route::post('profile', [LoginController::class, 'profile']);
    Route::post('device-credential', [DeviceCredentialController::class, 'device']);
    Route::post('get-tradelink-booking', [TradelinkBookingController::class, 'index']);

    Route::post('book-tradelink', [TradelinkBookingController::class, 'store']);
    Route::post('toggle-tradelink-status', [TradelinkBookingController::class, 'toggleStatus']);
});

Route::fallback(function () {
    return response()->json(['message' => ['Server was not able to retrieve the requested page.']], 404);
});
