<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\ApplicationController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SuperAdminController;
use App\Http\Controllers\Frontend\BuyerController;
use App\Http\Controllers\Backend\AdminLoginController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Frontend\BotManController;
use App\Http\Controllers\Seller\SellerChatController;
use App\Http\Controllers\Frontend\BuyerChatController;


Route::group(['namespace' => 'Frontend'], function () {
    Route::any('/', [ApplicationController::class, 'index'])->name('index');
    Route::any('about', [ApplicationController::class, 'about'])->name('about');
    Route::get('contact', [ApplicationController::class, 'contact'])->name('contact');
    Route::post('contact', [ApplicationController::class, 'contactAction']);


    Route::any('service-type/{criteria}', [ApplicationController::class, 'serviceType'])->name('service-type');
    Route::any('service', [ApplicationController::class, 'service'])->name('service');
    Route::any('service-details/{criteria}', [ApplicationController::class, 'serviceDetails'])->name('service-details');
    /*
     * ==========Route for botman
     */
    Route::get('/botman', [BotManController::class, 'handle']);
    Route::post('/botman', [BotManController::class, 'handle']);


    Route::any('property-search', [ApplicationController::class, 'propertySearch'])->name('property-search');
    Route::any('property-raging', [ApplicationController::class, 'postRating'])->name('property-raging');

    Route::group(['prefix' => 'property'], function () {
        Route::any('/', [ApplicationController::class, 'propertyList'])->name('property');
        Route::any('/{criteria?}', [ApplicationController::class, 'propertyDetails']);
    });

    Route::any('property-filter', [ApplicationController::class, 'propertyFilter'])->name('property-filter');


    Route::any('contact-seller', [ApplicationController::class, 'contactSeller'])->name('contact-seller');
    Route::any('contact-admin-property', [ApplicationController::class, 'contactAdmin'])->name('contact-admin-property');


    Route::group(['prefix' => 'blogs'], function () {
        Route::any('/', [ApplicationController::class, 'blogList'])->name('blogs');
        Route::any('/{criteria?}', [ApplicationController::class, 'blogDetails']);
    });


    Route::get('login', [BuyerController::class, 'login'])->name('login');
    Route::post('login', [BuyerController::class, 'loginAction']);
    Route::any('buyer-register', [BuyerController::class, 'register'])->name('buyer-register');
    Route::any('buyer-password-rest', [BuyerController::class, 'passwordReset'])->name('buyer-password-rest');
    Route::any('buyer-password-reset-process/{criteria?}', [BuyerController::class, 'passwordResetProcess'])->name('buyer-password-reset-process');




//    access with login
    Route::group(['prefix' => 'buyer', 'middleware' => 'auth:web'], function () {
        Route::any('/', [BuyerController::class, 'index'])->name('buyer');

        Route::any('logout', [BuyerController::class, 'logout'])->name('logout');

        Route::any('buyer-live-chat', [BuyerChatController::class, 'chatShow'])->name('buyer-live-chat');
        Route::any('buyer-fetch-all-message', [BuyerChatController::class, 'fetchAllMessage'])->name('buyer-fetch-all-message');
        Route::any('buyer-send-message', [BuyerChatController::class, 'messageSend'])->name('buyer-send-message');
        Route::any('buyer-chat-retrieve', [BuyerChatController::class, 'retrieveChatMessages'])->name('buyer-chat-retrieve');


    });
});


Route::group(['namespace' => 'Seller'], function () {

    Route::get('seller-login', [SellerController::class, 'login'])->name('seller-login');
    Route::post('seller-login', [SellerController::class, 'loginAction']);
    Route::any('seller-register', [SellerController::class, 'sellerRegister'])->name('seller-register');
    Route::any('seller-password-reset', [SellerController::class, 'passwordReset'])->name('seller-password-reset');
    Route::any('seller-password-reset-process/{criteria?}', [SellerController::class, 'passwordResetProcess'])->name('seller-password-reset-process');
    Route::any('seller-verify-process/{criteria?}', [SellerController::class, 'sellerVerifyProcess'])->name('seller-verify-process');

//    access with login
    Route::group(['prefix' => 'seller-admin', 'middleware' => 'auth:seller'], function () {
        Route::any('/', [SellerController::class, 'index'])->name('seller');
        Route::any('seller-logout', [SellerController::class, 'logout'])->name('seller-logout');
        Route::any('selle-not-verify', [SellerController::class, 'notVerify'])->name('selle-not-verify');

        Route::resource('seller-property', "\App\Http\Controllers\Seller\SellerPropertyController")->middleware('seller_verify_middleware');
        Route::any('seller-contact-list', [SellerController::class, 'sellerContactList'])->name('seller-contact-list');
        Route::any('seller-contact-list-details/{criteria}', [SellerController::class, 'sellerContactDetails'])->name('seller-contact-list-details');
//=============Seller Chat Controller===============

        Route::any('seller-live-chat', [SellerChatController::class, 'chatShow'])->name('seller-live-chat');
        Route::any('seller-fetch-all-message', [SellerChatController::class, 'fetchAllMessage'])->name('seller-fetch-all-message');
        Route::any('seller-send-message', [SellerChatController::class, 'messageSend'])->name('seller-send-message');
        Route::any('seller-chat-retrieve', [SellerChatController::class, 'retrieveChatMessages'])->name('seller-chat-retrieve');


    });

});


/*
 * ================Route for super admin ===============
 */

Route::group(['namespace' => 'Backend'], function () {
    Route::get('admin-login', [AdminLoginController::class, 'index'])->name('admin-login');
    Route::post('admin-login', [AdminLoginController::class, 'login']);
    Route::any('admin-password-rest', [AdminLoginController::class, 'passwordReset'])->name('admin-password-rest');
    Route::any('admin-password-reset-process/{criteria?}', [AdminLoginController::class, 'passwordResetProcess'])->name('admin-password-reset-process');


});

Route::group(['namespace' => 'Backend', 'prefix' => 'company-backend', 'middleware' => 'auth:admin'], function () {
    Route::any('/', [DashboardController::class, 'index'])->name('company-backend');

    /*
    * =============CRUD Super Admin ===========
    */

    Route::group(['prefix' => 'super-admin'], function () {
        Route::any('/', [SuperAdminController::class, 'index'])->name('super-admin');
        Route::get('/create-super-admin', [SuperAdminController::class, 'insert'])->name('create-super-admin');
        Route::post('/create-super-admin', [SuperAdminController::class, 'insertRecord']);
        Route::any('super-admin-delete/{criteria?}', [SuperAdminController::class, 'delete'])->name('super-admin-delete');
        Route::any('super-admin-profile/{criteria?}', [SuperAdminController::class, 'show'])->name('super-admin-profile');
        Route::any('update-super-admin-status', [SuperAdminController::class, 'status'])->name('update-super-admin-status');
        Route::get('edit-super-admin/{criteria?}', [SuperAdminController::class, 'edit'])->name('edit-super-admin');
        Route::any('edit-super-admin-action', [SuperAdminController::class, 'update'])->name('edit-super-admin-action');
    });
    Route::any('admin-contact', [DashboardController::class, 'contact'])->name('admin-contact');
    Route::any('admin-contact-view/{criteria?}', [DashboardController::class, 'contactView'])->name('admin-contact-view');
    Route::any('admin-contact-delete/{criteria?}', [DashboardController::class, 'contactDelete'])->name('admin-contact-delete');
//    ===============Product Controller  ===========
    Route::resource('admin-property', '\App\Http\Controllers\Backend\PropertyController');
    Route::any('admin-property-verify', '\App\Http\Controllers\Backend\PropertyController@propertyVerify')->name('admin-property-verify');

    Route::resource('admin-blog', '\App\Http\Controllers\Backend\BlogController');
    Route::any('buyer-list', [DashboardController::class, 'buyerList'])->name('buyer-list');
    Route::any('admin-seller-list', [DashboardController::class, 'sellerList'])->name('admin-seller-list');
    Route::any('admin-seller-verify', [DashboardController::class, 'sellerVerify'])->name('admin-seller-verify');

    Route::resource('admin-about', '\App\Http\Controllers\Backend\AboutController');
    Route::resource('admin-service-type', "\App\Http\Controllers\Backend\ServiceTypeController");
    Route::resource('admin-service', "\App\Http\Controllers\Backend\ServiceController");


    Route::any('admin-logout', [AdminLoginController::class, 'logout'])->name('admin-logout');

});
