<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\FilterController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\EnquiryController;
use App\Http\Controllers\Api\FeatureController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\FacilityController;
use App\Http\Controllers\Api\PasswordController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\AppReviewController;
use App\Http\Controllers\Api\TradelinkController;
use App\Http\Controllers\Api\UserStaffController;
use App\Http\Controllers\Website\SearchController;
use App\Http\Controllers\api\PropertyFaqController;
use App\Http\Controllers\Api\TestimonialController;
use App\Http\Controllers\Api\PropertyReviewController;
use App\Http\Controllers\Api\DeviceCredentialController;
use App\Http\Controllers\Api\TradelinkBookingController;
use App\Http\Controllers\Api\Property\FavouriteController;
use App\Http\Controllers\Api\Property\AreaSearchController;

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

    Route::get('get-setting', [AdminController::class, 'getSetting']);

    Route::get('facility',[FacilityController::class,'index']);

    // may be in future
    Route::post('get-services', [ServiceController::class, 'getServices']);
    
    Route::post('post-enquiry', [EnquiryController::class, 'store']);
    //Search Area
    Route::get('search-area', [AreaSearchController::class, 'search'])->name('search-area');
    /*   Normal login routes  */
    
    Route::post('registration', [LoginController::class, 'signup']);
    Route::post('login', [LoginController::class, 'login']);
    Route::post('reset-password', [PasswordController::class, 'resetPassword']);

    Route::post('agent-register', [LoginController::class, 'postAgentRegistration']);
    // Route::post('agent-login',[LoginController::class, 'postAgentLogin']);

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
    // Route::post('purposes-of-property', [PropertyController::class, 'purpose']);
    Route::post('property-types', [PropertyController::class, 'propertyType']);
    Route::post('property-status', [PropertyController::class, 'propertyStatus']);

    Route::get('about-us', [PropertyController::class, 'aboutUs']);
    Route::post('areas', [PropertyController::class, 'getArea']);
    Route::post('units', [PropertyController::class, 'getUnits']);
    Route::post('road-type', [PropertyController::class, 'roadType']);
    Route::post('amenties', [PropertyController::class, 'amenties']);

    Route::post('get-property-feature', [PropertyController::class, 'getPropertyFeatures']);
    Route::post('search', [SearchController::class, 'search']);
    Route::post('category-filter', [FilterController::class, 'filter']);
    Route::post('privacy-policy', [ApiController::class, 'ourPolicy']);

    Route::post('terms-and-conditions', [ApiController::class, 'termsConditions']);
    Route::post('get-property-review', [PropertyReviewController::class, 'propertyReview']);
    Route::post('property-statistics', [PropertyReviewController::class, 'propertyStatistics']);

    Route::post('app-review-list', [AppReviewController::class, 'index']);
    Route::post('get-contacts', [ApiController::class, 'getContacts']);
});

Route::group(['namespace' => 'Api', 'middleware' => 'auth:api'], function () {
    Route::post('property-review', [PropertyReviewController::class, 'index']);
    Route::post('app-review', [AppReviewController::class, 'store']);
    Route::post('update-profile', [LoginController::class, 'update']);
    Route::post('upload-profile-image', [LoginController::class, 'uploadProfileImage']);
    Route::post('update-password', [PasswordController::class, 'changePassword']);
    
    Route::post('toggle-favourites', [FavouriteController::class, 'toggleFavourite']);
    Route::post('get-favourites', [FavouriteController::class, 'getFavourites']);

    // setting 
    Route::post('update-setting', [AdminController::class, 'updateSetting']);


    /************   Post Property  ****************/
    Route::post('post-property', [PropertyController::class, 'postProperty']);
    Route::post('update-property', [PropertyController::class, 'updateProperty']);
    Route::post('delete-property', [PropertyController::class, 'deleteProperty']);
    Route::post('add-property-image', [PropertyController::class, 'addPropertyImage']);
    Route::get('admin-properties',[PropertyController::class, 'index']);
    Route::post('update-view-count/{id}', [PropertyController::class, 'updateViewCount']);

    // property features facilities
    Route::get('property-feature-index', [FeatureController::class, 'index']);
    Route::post('property-feature-add', [FeatureController::class, 'store']);
    Route::post('property-feature-update', [FeatureController::class, 'update']);
    Route::post('property-feature-delete/{id}', [FeatureController::class, 'destroy']);
    Route::post('update-feature-position/property', [FeatureController::class, 'updateFeatureOrder']);

    Route::post('togglePropertyStatus/{id}', [PropertyController::class, 'toggleStatus']);
    Route::post('togglePropertyActiveStatus/{id}', [PropertyController::class, 'toggleActiveStatus']);

    // property faq
    Route::get('property-faq/{propertyId}/frequently-asked-questions', [PropertyFaqController::class, 'index']);
    Route::post('property-faq/{propertyId}/addFaq', [PropertyFaqController::class, 'frequentlyAskedQuestion']);
    // Route::post('property-faq/{propertyId}/deleteFaq', [PropertyFaqController::class, 'destroy']);


    // news/blog

    Route::post('blogs', [BlogController::class, 'getblogs']);
    Route::post('add-blog',[BlogController::class,'store']);
    Route::post('update-blog/{id}',[BlogController::class,'update']);
    Route::post('delete-blog/{id}',[BlogController::class, 'destroy']);

    
    // agents
    Route::get('agents',[UserStaffController::class ,'agents']);
    Route::post('create-agents',[UserStaffController::class,'createAgent']);
    Route::post('update-agent-status/{id}',[UserStaffController::class,'updateAgent']);
    Route::post('delete-agent/{id}',[UserStaffController::class,'deleteAgent']);

    //users / staffs
    Route::get('userStaff', [UserStaffController::class ,'index']);
    Route::post('create-userstaff', [UserStaffController::class,'store']);
    Route::post('updateuserStaff/{id}', [UserStaffController::class ,'update']);
    Route::post('deleteuserStaff/{id}', [UserStaffController::class ,'destroy']);
    Route::post('update-user-status',[UserStaffController::class,'updateUserStatus']);

    // sliders
    Route::get('sliders', [SliderController::class, 'index']);
    Route::post('create-slider', [SliderController::class, 'store']);
    Route::post('update-slider/{id}', [SliderController::class, 'update']);
    Route::post('delete-slider/{id}',[SliderController::class, 'destroy']);
    
    // Faq
    Route::get('index-faq', [FaqController ::class, 'index']);
    Route::post('create-faq', [FaqController::class, 'store']);
    Route::post('update-faq/{faq}', [FaqController::class, 'update']);
    Route::post('delete-faq/{id}',[FaqController::class, 'destroy']);
    
    // admin subscribers
    Route::get('subscriber-list', [AdminController::class,'subscribers']);
    Route::post('delete-subscriber/{id}',[AdminController::class,'deleteSubscriber']);
    
    // admin Units
    Route::get('index-units',[AdminController::class,'unitsList']);
    Route::post('create-unit',[AdminController::class,'createUnit']);
    Route::post('update-unit/{id}',[AdminController::class,'updateUnit']);
    Route::post('delete-unit/{id}',[AdminController::class,'deleteUnit']);


    Route::get('enquiry-list', [EnquiryController::class, 'index']);

    Route::post('logout', [LoginController::class, 'logout']);
    Route::post('profile', [LoginController::class, 'profile']);
    Route::post('device-credential', [DeviceCredentialController::class, 'device']);

    // may be used iun future
    Route::post('get-tradelink-booking', [TradelinkBookingController::class, 'index']);
    Route::post('book-tradelink', [TradelinkBookingController::class, 'store']);
    Route::post('toggle-tradelink-status', [TradelinkBookingController::class, 'toggleStatus']);
    // restore
    Route::group(['prefix' => 'restore'], function (){
        // property
        Route::get('getDeletedProperties', [PropertyController::class, 'getDeletedProperties']);
        Route::post('property-restore/{property_id}', [PropertyController::class, 'restoreProperty']);
        Route::post('hard-delete-property/{property_id}', [PropertyController::class, 'hardDeleteProperty']);
        
        // blogs.news
        Route::get('getDeletedBlogs', [BlogController::class, 'getDeletedBlogs']);
        Route::post('blog-restore/{blog_id}', [BlogController::class, 'restoreBlog']);
        Route::post('hard-delete-blog/{blog_id}', [BlogController::class, 'hardDeleteBlog']);
        
        // agency 
        Route::get('getDeletedAgency', [UserStaffController::class, 'getDeletedAgency']);
        Route::post('agency-restore/{agency_id}', [UserStaffController::class, 'restoreAgency']);
        Route::post('hard-delete-agency/{agency_id}', [UserStaffController::class, 'hardDeleteAgency']);
        
        // Faqs
        Route::get('getDeletedFaqs', [FaqController::class, 'getDeletedFaqs']);
        Route::post('faq-restore/{faq_id}', [FaqController::class, 'restoreFaqs']);
        Route::post('hard-delete-faq/{faq_id}', [FaqController::class, 'hardDeleteFaq']);
    });
});

Route::fallback(function () {
    return response()->json(['message' => ['Server was not able to retrieve the requested page.']], 404);
});

