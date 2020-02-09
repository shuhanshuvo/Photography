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
        Route::get('/edit-user/{id}', 'AdminController@edit_user')->name('admin.edit.user');
        Route::post('/update-user', 'AdminController@update_user')->name('admin.update.user');

        Route::get('/user-delete/{id}', 'AdminController@user_delete')->name('admin.user.delete');

        // Servicess

        Route::get('add-service-page','AdminController@add_service_page')->name('add.service.page');
        Route::post('add-service','AdminController@add_service')->name('add.service');
        Route::get('edit-service/{id}','AdminController@edit_service')->name('edit.service');

        Route::post('update-service','AdminController@update_service')->name('update.service');
        Route::get('all-services', 'AdminController@all_service')->name('all.services');
        

        Route::get('/service-delete/{id}', 'AdminController@service_delete')->name('admin.service.delete');

        ///Order...

        Route::get('all-order', 'AdminController@all_order')->name('admin.all.order');
        Route::get('all-transaction', 'AdminController@all_tran')->name('admin.all.tran');




    });
});



Route::group(['middleware' => ['auth']], function() {
Route::group(['prefix' => 'home'], function (){
    Route::get('/', 'HomeController@index')->name('home');

        

    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::post('/profile-update', 'UserController@profile_update')->name('user.profile.update');

    Route::get('show-services','UserController@show_services')->name('show.services');

        
    });
});






Route::get('/change-password', 'UserController@change_password')->name('user.change.pass');
Route::post('/change-password-save', 'UserController@change_password_save')->name('user.pass.update');

////Payment........................

Route::get('checkout/{id}','PaymentController@payment_checkout')->name('payment.checkout');
Route::post('checkout','PaymentController@checkout')->name('checkout');


