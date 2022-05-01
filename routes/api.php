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


Route::group(['prefix' => 'client'], function () {

	Route::get('client_add', 'CustomerDummyController@client_add');
    Route::post('client_save', 'CustomerDummyController@client_save');
    Route::post('client_approve/{cu_id}', 'CustomerDummyController@client_approve');
    Route::post('client_submit/{cu_id}', 'CustomerDummyController@client_submit');

    Route::get('get_client_list', 'CustomerDummyController@get_client_list');
    Route::get('get_dummy_list', 'CustomerDummyController@get_dummy_list');

    Route::get('client_edit/{cu_id}', 'CustomerDummyController@edit');
    Route::get('getClient/{cu_id}', 'CustomerDummyController@view');
    Route::post('upload_image', 'CustomerDummyController@upload_image');   
    Route::post('client_update/{id}', 'CustomerDummyController@update');
    Route::delete('delete/{id}', 'CustomerDummyController@delete');
});