<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/user_registration', 'UserController@user_registration');





Route::prefix('admin')->group(function (){
    Route::get('/login', 'Auth\AdminLoginController@showLoginform')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});


Route::group(['middleware' => ['auth:admin']], function() {
    Route::prefix('admin')->group(function() {

        Route::get('/', 'AdminController@index')->name('admin.dashbord');

        Route::get('/change-password', 'AdminController@change_password')->name('admin.change.pass');
        Route::post('/change-password-save', 'AdminController@change_password_save')->name('admin.pass.update');

         Route::get('/users-get', 'AdminController@users_get')->name('get.users');
        // Route::get('/edit-user/{id}', 'AdminUserController@edit_user')->name('admin.edit.user');
        // Route::post('/edit-user-update', 'AdminUserController@edit_user_update')->name('admin.profile.update');
        Route::post('/user-delete', 'AdminController@user_delete')->name('admin.user.delete');

        // Servicess

        Route::get('add-service-page','AdminController@add_service_page')->name('add.service.page');
        Route::post('add-service','AdminController@add_service')->name('add.service');
        Route::get('all-services', 'AdminController@all_service')->name('all.services');



    });
});



Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'home'], function (){
        Route::get('/', 'HomeController@index')->name('home');

        

        Route::get('/profile', 'UserController@profile')->name('user.profile');

        Route::post('/profile-update', 'UserController@profile_update')->name('user.profile.update');

        //user profile
        // Route::get('/profile', 'User\UserProfileController@profile')->name('user.profile');
        // Route::post('/profile-update', 'User\UserProfileController@profile_update')->name('user.profile.update');

        // //upgrade
        // Route::get('/upgrade', 'User\UserProfileController@updrade')->name('user.upgrade');
        // Route::post('/select-cart-save', 'User\UserProfileController@select_cart_save')->name('user.select.cart');
        // Route::get('/payment/{id}', 'User\UserProfileController@payment')->name('user.payment');
        // Route::post('/stripe-pay', 'User\UserProfileController@stripe_pay')->name('stripe.pay');
        // Route::post('/user-pay-save', 'User\UserProfileController@user_pay_save')->name('user.pay.save');
        // Route::get('/user-pdf', 'User\UserProfileController@user_pdf')->name('user.pdf');
        // Route::get('/user-pdf-get', 'User\UserProfileController@user_pdf_get')->name('get.pdf.user');
        // Route::get('/view/{name}', 'User\UserProfileController@user_pdf_get')->name('view.pdf');
        // Route::get('/change-password', 'User\UserProfileController@change_password')->name('user.change.pass');
        // Route::post('/change-password-save', 'User\UserProfileController@change_password_save')->name('user.pass.update');
        // Route::get('/my-archives-save/{id}', 'User\UserProfileController@my_archives_save')->name('user.archives.save');
        // Route::get('/my-archives', 'User\UserProfileController@my_archives')->name('user.archives');
        // Route::get('/my-archives-get', 'User\UserProfileController@my_archives_get')->name('get.pdf.user.archive');

    });
});





Route::get('/change-password', 'UserController@change_password')->name('user.change.pass');
Route::post('/change-password-save', 'UserController@change_password_save')->name('user.pass.update');

