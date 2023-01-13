<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 1/31/2021
 * Time: 3:55 PM
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenericController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\AgencyController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AmenityController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\Admin\PurposeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\RoadTypeController;
use App\Http\Controllers\Admin\TradelinkController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Property\PropertyController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\FavoritePropertyController;
use App\Http\Controllers\Property\PropertyFaqController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\PropertyCategoryController;
use App\Http\Controllers\Admin\TradelinkCategoryController;


Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('adminn.login');

Route::get('testImageUploader', function () {
    return view('admin.testImage');
});

Route::resource('type', TypeController::class);



Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {


    //Tradelink
    Route::get('tradelink-datatables', [TradelinkController::class, 'getTradelink'])->name('getTradelinks');
    Route::post('update-category/tradelinks', [TradelinkCategoryController::class, 'updateCateagoryOrder'])->name('update.tradelinkcategory');
    Route::resource('tradelink', TradelinkController::class);
    Route::resource('tradelink-category', TradelinkCategoryController::class);
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('purchased-property', [AdminController::class, 'purchasedProperty'])->name('purchasedPrroperty');
    Route::get('profile/{id}', [AdminController::class, 'profile'])->name('profile');
    Route::get('favorite-property', [FavoritePropertyController::class, 'index'])->name('favorite.index');
    
    Route::post('update-profile/{id}', [AdminController::class, 'updateProfile'])->name('update');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::delete('/deletePropertyImage/{id}', [PropertyController::class, 'deletePropertyImage'])->name('delete-property-image');
    Route::post('properties-status-update/{id}', [PropertyController::class, 'statusUpdate'])->name('properties.status.update');
    Route::get('get-properties', [PropertyController::class, 'getProperties'])->name('get.properties');
    Route::get('property-image/delete/{id}', [PropertyController::class, 'delete_image']);
    Route::post('update-menu/property', [MenuController::class, 'updateMenuOrder'])->name('update.menu');
    Route::post('update-purpose/property', [PurposeController::class, 'updatePurposeOrder'])->name('update.purpose');
    Route::post('update-property/property', [PropertyController::class, 'updatePropertyOrder'])->name('update.property');
    Route::post('update-feature/property', [FeatureController::class, 'updateFeatureOrder'])->name('update.feature');
    Route::post('update-facility/property', [FacilityController::class, 'updateFacilityOrder'])->name('update.facility');
    Route::post('update-faq', [FaqController::class, 'updateFaq'])->name('update.faq');
    Route::post('update-blog', [BlogController::class, 'updateBlog'])->name('update.blog');
    Route::post('update-unit', [UnitController::class, 'updateUnit'])->name('update.unit');
    Route::post('update-category/property', [PropertyCategoryController::class, 'updateCategoryOrder'])->name('update.property.category');
    Route::resources([
        'staffs' => StaffController::class,
        'properties' => PropertyController::class,
        'blog' => BlogController::class,
        'faq' => FaqController::class,
        'slider' => SliderController::class,
        'menu' => MenuController::class,
        'testimonial' => TestimonialController::class,
        'advertisements' => AdvertisementController::class,
        'news' => NewsController::class,
        'service' => ServiceController::class,
        'serviceCategory' => ServiceCategoryController::class,
        'pricings' => PricingController::class,
        'page' => PageController::class,
        'permissions' => PermissionController::class,
        'roles' => RoleController::class,
    ]);

    Route::get('property-faq/{id}/frequently-asked-questions', [PropertyFaqController::class, 'index'])->name('property-faqs');
    Route::post('property-faq/{id}/frequently-asked-questions', [PropertyFaqController::class, 'frequentlyAskedQuestion'])->name('property-faqs-post');
    Route::get('toggleStatus/{id}', [PropertyController::class, 'toggleStatus'])->name('toggleStatus');
    Route::get('toggleActiveStatus/{id}', [PropertyController::class, 'toggleActiveStatus'])->name('toggleActiveStatus');

    Route::post('staff-active', [StaffController::class, 'isActive'])->name('user.active');
    Route::get('getNews', [NewsController::class, 'getNews'])->name('get.news');
    Route::POST('admin/property-category/del',[PropertyCategoryController::class,'destroy'])->name('property-category.delete');


    Route::get('getBlogs', [BlogController::class, 'getBlogs'])->name('get.blogs');
    Route::get('getFaq', [FaqController::class, 'getFaq'])->name('get.faq');
    Route::get('getTestimonial', [TestimonialController::class, 'getTestimonial'])->name('get.testimonial');
    Route::get('getAdvertisements', [AdvertisementController::class, 'getAdvertisements'])->name('get.advertisements');

    // Route for superadmin only
    // Route::group(['middleware' => 'superadmin'], function () {

    Route::resource('city', CityController::class);
    Route::get('getDistrict/{provinceId}', [CityController::class, 'getDistricts'])->name('getDistricts');

    Route::get('get-cities', [CityController::class, 'getCities'])->name('get.cities');
    //        Route::get('view-property-by-city',[])-

    Route::resource('amenity', AmenityController::class);
    Route::resource('purpose', PurposeController::class);
    
    Route::resource('property-category', PropertyCategoryController::class);
    Route::resource('road-type', RoadTypeController::class);
    Route::resource('unit', UnitController::class);
    /**
     * Staff Route
     */


    Route::post('block-agency', [AgencyController::class, 'blockAgency'])->name('block.agency');

    Route::resource('agency', AgencyController::class);


    Route::resource('customer', UserController::class);
    Route::get('getCustomers', [UserController::class, 'getCustomers'])->name('get.customers');

    /** Setting  */
    Route::get('setting', [AdminController::class, 'setting'])->name('setting');
    Route::post('setting', [AdminController::class, 'settingSubmit']);

    /** Blog  **/
    Route::get('blog-category/{category_id}/sub-category', [CategoryController::class, 'subCategory'])->name('blog-category.subcategory');
    Route::resource('blog-category', CategoryController::class);


    Route::resource('team', TeamController::class);
    Route::get('teams', [TeamController::class, 'getTeams'])->name('getTeams');


    Route::get('new-category/{category_id}/sub-category', [NewsCategoryController::class, 'subCategory'])->name('news-category.subcategory');
    Route::resource('news-category', NewsCategoryController::class);


    Route::post('add_area', [CityController::class, 'storeArea'])->name('add.area');
    Route::get('city/{city_name}/{city_id}', [CityController::class, 'all_areas'])->name('all.areas');

    Route::get('getPropertyByCity/{id}', [CityController::class, 'getPropertyByCity'])->name('getPropertyByCity');
    Route::delete('area/{id}', [CityController::class, 'destroyArea']);
    Route::post('area/update/{id}', [CityController::class, 'areaUpdate'])->name('area.update');

    /** Subscriber */
    Route::get('subscribers', [AdminController::class, 'subscribers'])->name('admin.subscriber');
    Route::get('delete-subscriber/{subscriber}', [AdminController::class, 'deleteSubscriber'])->name('delete.subscriber');

    // enquiry
    Route::get('enquiry', [AdminController::class, 'enquries'])->name('admin.enquiry');

    /** Restore  */

    Route::group(['prefix' => 'restore'], function () {

        Route::get('deleted-property', [PropertyController::class, 'deletedProperty'])->name('deletedProperty');
        Route::get('getDeletedProperties', [PropertyController::class, 'getDeletedProperties'])->name('getDeletedProperties');
        Route::get('property-restore/{property_id}', [PropertyController::class, 'restoreProperty'])->name('restoreProperty');
        Route::post('hard-delete-property/{property_id}', [PropertyController::class, 'hardDeleteProperty'])->name('hardDeleteProperty');

        Route::get('deleted-blogs', [BlogController::class, 'deletedBlogs'])->name('deletedBlogs');
        Route::get('getDeletedBlogs', [BlogController::class, 'getDeletedBlogs'])->name('getDeletedBlogs');
        Route::get('blog-restore/{blog_id}', [BlogController::class, 'restoreBlog'])->name('restoreBlog');
        Route::post('hard-delete-blog/{blog_id}', [BlogController::class, 'hardDeleteBlog'])->name('hardDeleteBlog');

        Route::get('deleted-news', [NewsController::class, 'deletedNews'])->name('deletedNews');
        Route::get('getDeletedNews', [NewsController::class, 'getDeletedNews'])->name('getDeletedNews');
        Route::get('news-restore/{news_id}', [NewsController::class, 'restoreNews'])->name('restoreNews');
        Route::post('hard-delete-news/{news_id}', [NewsController::class, 'hardDeleteNews'])->name('hardDeleteNews');

        Route::get('deleted-agency', [AgencyController::class, 'deletedAgency'])->name('deletedAgency');
        Route::get('getDeletedAgency', [AgencyController::class, 'getDeletedAgency'])->name('getDeletedAgency');
        Route::get('agency-restore/{agency_id}', [AgencyController::class, 'restoreAgency'])->name('restoreAgency');
        Route::post('hard-delete-agency/{agency_id}', [AgencyController::class, 'hardDeleteAgency'])->name('hardDeleteAgency');

        Route::get('deleted-faqs', [FaqController::class, 'deletedFaqs'])->name('deletedFaqs');
        Route::get('getDeletedFaqs', [FaqController::class, 'getDeletedFaqs'])->name('getDeletedFaqs');
        Route::get('faq-restore/{faq_id}', [FaqController::class, 'restoreFaq'])->name('restoreFaq');
        Route::post('hard-delete-faq/{faq_id}', [FaqController::class, 'hardDeleteFaq'])->name('hardDeleteFaq');

        Route::get('deleted-testimonials', [TestimonialController::class, 'deletedTestimonials'])->name('deletedTestimonials');
        Route::get('getDeletedTestimonials', [TestimonialController::class, 'getDeletedTestimonials'])->name('getDeletedTestimonials');
        Route::get('testimonial-restore/{test_id}', [TestimonialController::class, 'restoreTestimonial'])->name('restoreTestimonial');
        Route::post('hard-delete-testimonial/{test_id}', [TestimonialController::class, 'hardDeleteTestimonial'])->name('hardDeleteTestimonial');
    });


    Route::get('mark-read/{id}/{property_id}', [NotificationController::class, 'markRead'])->name('mark.read');

    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
    // });
    Route::resource('properties', PropertyController::class);
    //Features
    Route::get('features/get', [FeatureController::class, 'getFeatures'])->name('feature.get');
    Route::resource('feature', FeatureController::class);

    //Facility
    Route::resource('facility', FacilityController::class);
});
