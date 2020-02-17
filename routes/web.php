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
// Route::post('/user_registration', 'UserController@user_registration');

Route::post('/custom-login', 'CustomLoginController@custom_login')->name('custom.login');
Route::post('/custom-reg', 'CustomLoginController@custom_reg')->name('custom.reg');






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

        Route::get('/user-delete/{id}', 'AdminController@user_delete')->name('admin.user.delete');
        
        //photographer.............

        Route::get('/photographers-get', 'AdminController@photographers_get')->name('get.photographers');

        Route::get('/edit-photo/{id}', 'AdminController@edit_photo')->name('admin.edit.photo');
        Route::post('/update-photo', 'AdminController@update_photo')->name('admin.update.photo');


        Route::get('/edit-user/{id}', 'AdminController@edit_user')->name('admin.edit.user');
        Route::post('/update-user', 'AdminController@update_user')->name('admin.update.user');
        Route::get('/photo-delete/{id}', 'AdminController@photo_delete')->name('admin.photo.delete');



        ///General Settings

        Route::get('/general-settings', 'GeneralSettingController@g_settings')->name('admin.general.settings');
        Route::post('/general-settings', 'GeneralSettingController@store_g_settings')->name('admin.store.general.settings');








        // Approve/ Disapprove

        Route::get('/approve/{id}', 'AdminController@approve');
        Route::get('/reject/{id}', 'AdminController@reject');

        // Services

        Route::get('add-service-page','AdminController@add_service_page')->name('add.service.page');
        Route::post('add-service','AdminController@add_service')->name('add.service');
        Route::get('edit-service/{id}','AdminController@edit_service')->name('edit.service');

        Route::post('update-service','AdminController@update_service')->name('update.service');
        Route::get('all-services', 'AdminController@all_service')->name('all.services');
        

        Route::get('/service-delete/{id}', 'AdminController@service_delete')->name('admin.service.delete');

        ///Order...

        Route::get('all-order', 'AdminController@all_order')->name('admin.all.order');
        Route::get('complete-order', 'AdminController@complete_order')->name('admin.complete.order');
        Route::get('reject-order', 'AdminController@reject_order')->name('admin.reject.order');
        Route::get('all-transaction', 'AdminController@all_tran')->name('admin.all.tran');




    });
});



Route::group(['middleware' => ['auth']], function() {
Route::group(['prefix' => 'home'], function (){
    Route::get('/', 'HomeController@index')->name('home');

        

    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::post('/profile-update', 'UserController@profile_update')->name('user.profile.update');

    Route::get('show-services','UserController@show_services')->name('show.services');
    Route::get('user-dashboard', 'UserController@user_dashboard')->name('user.dashboard');

    

        
    });
});

Route::group(['middleware' => ['auth:photographer']], function() {
    // Route::group(['prefix' => 'home'], function (){
    // Route::get('/', 'HomeController@index')->name('home');


Route::get('photo-dashboard', 'UserController@photo_dashboard')->name('photo.dashbord');

Route::get('/p-profile', 'UserController@p_profile')->name('p.profile');
Route::post('/p-profile', 'UserController@update_p_profile')->name('p_profile_update');


Route::get('/p-change-password', 'UserController@p_change_password')->name('photo.change.pass');
Route::post('/p_change-password-save', 'UserController@p_change_password_save')->name('photo.pass.update');

});
// });





Route::get('/change-password', 'UserController@change_password')->name('user.change.pass');
Route::post('/change-password-save', 'UserController@change_password_save')->name('user.pass.update');

////Payment........................

Route::get('checkout/{id}','PaymentController@payment_checkout')->name('payment.checkout');
Route::post('checkout','PaymentController@checkout')->name('checkout');


// Notification

Route::get('/notif','AdminController@notif');


