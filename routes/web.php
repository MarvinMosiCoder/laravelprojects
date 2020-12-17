<?php

use Illuminate\Support\Facades\Route;

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

//Routes for Users
Route::get('/home', 'UserController@index')->name('user_dashboard');

Route::prefix('/admin')->namespace('Admin')->group(function(){
	//All routes of admin will define here
	Route::match(['get','post'],'/','AdminController@login');
	Route::group(['middleware'=>['admin']], function() {
        Route::get('dashboard', 'AdminController@dashboard');
        Route::get('settings', 'AdminController@settings');
        Route::post('check-current-pwd', 'AdminController@chkCurrentPassword');
        Route::post('update-current-pwd', 'AdminController@updateCurrentPassword');
        Route::match(['get','post'],'update-admin-details','AdminController@updateAdminDetails');
        //residences resource
        Route::get('add_residences','ResidenceController@create');
        Route::get('add_residences','ResidenceController@index');
        Route::resource('residence', 'ResidenceController');

        //Blotter resources
        Route::resource('blotter', 'BlotterController');
        Route::get('add_blotter','BlotterController@index');
        Route::get('blotter-autocomplete', 'BlotterController@autocomplete');
        Route::get('logout', 'AdminController@logout');
	});
	
});
