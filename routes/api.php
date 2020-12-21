<?php

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

//List client
Route::get('clients', 'ClientController@index');

//List single client
Route::get('clients/{id}', 'ClientController@show');

//List new client
Route::post('clients', 'ClientController@store');

//List update client
Route::put('clients', 'ClientController@store');

//List delete client
Route::delete('clients', 'ClientController@destroy');