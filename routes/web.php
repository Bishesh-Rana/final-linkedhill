<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\OldPropertyController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\AgentController;
use App\Http\Controllers\Frontend\SocialLoginController;


//Auth::routes();
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/property/{slug}', [App\Http\Controllers\Frontend\WebsiteController::class, 'propertytype'])->name('propertytype');

Route::group(['middleware' => ['auth']], function () {

    Route::get('my-dashboard', [DashboardController::class, 'index'])->name('my.dashboard');
    Route::get('/logout', [DashboardController::class, 'logout'])->name('user.logout');

    Route::get('property-image/delete/{id}', [OldPropertyController::class, 'delete_image']);
    Route::get('edit-assign-property/{id}', [OldPropertyController::class, 'editAssignProperty']);
    Route::get('pending-property', [OldPropertyController::class, 'pending'])->name('pending.property');

    Route::get('assigned-properties/assigned-properties-by-users', [OldPropertyController::class, 'assignedProperty'])->name('property.assigned');
    Route::get('assigned-properties/property-detail/{id}', [OldPropertyController::class, 'propertyDetail'])->name('auth.property.detail');
    Route::get('assigned-properties/edit-assigned-property/{id}', [OldPropertyController::class, 'editAssignedProperty'])->name('editAssignedProperty');
    Route::post('update-property-detail/{id}', [OldPropertyController::class, 'updatePropertyDetailByAgency'])->name('updatePropertyDetailByAgency');

    Route::get('change-edit-status/{id}', [OldPropertyController::class, 'changeAllowStatus'])->name('changeAllowStatus');

    Route::get('favourite-property', [OldPropertyController::class, 'favProperty'])->name('fav.property');
    Route::get('delete-from-fav-list/{id}', [OldPropertyController::class, 'deleteFromFavList']);

    Route::resource('property', OldPropertyController::class);

    Route::post('agent/apply-as-agent', [AgentController::class, 'applyAsAgent'])->name('apply.as.agent');
    Route::get('agent/applied-agency', [AgentController::class, 'myAgency'])->name('my.agent');
    Route::get('agent/assign-property-to-agency', [AgentController::class, 'assignPropertyToAgent'])->name('assign.agency');
    Route::post('agent/assign-property-to-agency', [AgentController::class, 'assignPropertyToAgentSubmit']);
    Route::delete('delete-my-agency', [AgentController::class, 'deleteMyAgency']);
    Route::resource('agent', AgentController::class);

    Route::get('change-password', [DashboardController::class, 'changePassword'])->name('changePassword');
    Route::post('change-password', [DashboardController::class, 'updatePassword'])->name('updatePassword');

    Route::get('change-profile', [DashboardController::class, 'changeProfile'])->name('changeProfile');
    Route::post('change-profile', [DashboardController::class, 'updateProfile'])->name('updateProfile');
});



// social login starts
Route::get('login/facebook', [SocialLoginController::class, 'redirectToFacebook'])->name('facebookLogin');
Route::get('login/facebook/callback', [SocialLoginController::class, 'getFacebookCallback']);
Route::get('login/google', [SocialLoginController::class, 'redirectToGoogle'])->name('googleLogin');
Route::get('login/google/callback', [SocialLoginController::class, 'getGoogleCallback']);
Route::get('a-logout', [SocialLoginController::class, 'logout'])->name('sLogout');


/**
 *   Routes for tradelink
 */
Route::get('vendor-signup', [\App\Http\Controllers\Admin\VendorController::class, 'showSignupForm'])->name('trade.vendor.register');
Route::post('vendor-signup', [\App\Http\Controllers\Admin\VendorController::class, 'register']);
Route::get('{service_slug}/service-providers', [\App\Http\Controllers\Admin\TradelinkController::class, 'service_providers'])->name('service.serviceProvider');


Route::get('testP', function () {
    return findPropertyAgent(16);
});


Route::group(['prefix' => 'mailTest'], function () {

    Route::get('userRegistration', function () {
        return new \App\Mail\UserRegistrationMail();
    });

    //to admin when a user register his/her agency
    Route::get('agencyRegistration', function () {
        $user = \App\Models\User::first();
        return new \App\Mail\AgencyRegistrationMail($user);
    });

    //Mail to agency after admin create agency
    Route::get('mailToAgency', function () {
        $user = \App\Models\User::first();
        return new \App\Mail\MailToAgency($user);
    });

    //Mail to agency when admin blocked agency
    Route::get('agencyBlock', function () {
        $user = \App\Models\User::where('is_blocked', 1)->first();
        return new \App\Mail\MailAfterAgencyBlock($user);
    });
});
