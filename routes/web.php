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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/ip_list', 'IpListController@index')->name('index');
Route::post('ip_list_save', 'IpListController@store')->name('store');
Route::get('ip_list_delete/{id}', 'IpListController@destroy');
Route::get('ip_list_viewall', 'IpListController@ip_list_viewall');
Route::post('ip_list_viewall_save/{id}', 'IpListController@update');


Route::get('site_survey_create', 'SiteSurveyController@index');
Route::post('site_survey_save', 'SiteSurveyController@store');
Route::get('site_survey_list', 'SiteSurveyController@show');
Route::get('site_survey_form_list', 'SiteSurveyController@site_survey_form_list');
Route::get('site_survey_delete/{id}', 'SiteSurveyController@destroy');
Route::get('site_survey_form_delete/{id}', 'SiteSurveyController@site_survey_form_delete');
Route::get('site_survey_viewall/{id}', 'SiteSurveyController@edit');
Route::get('site_survey_edit/{id}', 'SiteSurveyController@site_survey_edit');
Route::post('site_survey_edit_report_save/{id}', 'SiteSurveyController@site_survey_edit_report_save');
Route::post('site_survey_viewall_save/{id}', 'SiteSurveyController@update');
Route::post('site_survey_viewall_report_save/{id}', 'SiteSurveyController@site_survey_viewall_report_save');
Route::get('site_survey_list_save', 'SiteSurveyController@site_survey_list_save');
Route::get('site_survey_list_view', 'SiteSurveyController@site_survey_list_view');








Route::get('/client_add', 'CustomerDummyController@client_add')->name('client_add'); 
Route::post('/client_save', 'CustomerDummyController@client_save')->name('client_save'); 

Route::post('pendding_client_save', 'CustomerController@pendding_client_save')->name('pendding_client_save');
Route::post('work_order_edit_client_save/{id}', 'CustomerDummyController@work_order_edit_client_save')->name('work_order_edit_client_save');

Route::get('active_clients', 'CustomerDummyController@get_client_list');
Route::get('dummy_clients_list', 'CustomerDummyController@get_dummy_list');

Route::get('approve_pandding_list_save', 'CustomerDummyController@approve_pandding_list_save');

Route::get('active_customer_list_viewall', 'CustomerController@active_customer_list_viewall');
Route::get('approvel_change_status', 'CustomerDummyController@approvel_change_status');
Route::get('client_data_bandwidth_downgrade_edit/{id}', 'CustomerController@downgrade_edit');
Route::post('client_data_update_d/{id}', 'CustomerController@update_down');
Route::post('edit_dummycustomer_update/{id}', 'CustomerDummyController@edit_dummycustomer_update');
Route::get('client_data_bandwidth_edit/{id}', 'CustomerController@edit');
Route::post('client_data_update/{id}', 'CustomerController@update');
Route::get('client_user_delete/{id}', 'UserController@delete');
Route::get('active_customer_delete/{id}', 'CustomerController@active_customer_delete');
Route::get('active_customer_list_edit', 'CustomerController@active_customer_edit');

Route::get('work_order', 'CustomerDummyController@work_order');



//Route::get('changeStatus', 'UserController@changeStatus');
Route::get('pending_dummy_clients_list', 'CustomerDummyController@get_pending_dummy_clients_list');
Route::get('client_upgrade_data_list', 'CustomerController@get_client_upgrade_data_list');
Route::get('client_downgrade_data_list', 'CustomerController@get_client_downgrade_data_list');
Route::get('client_data_connection', 'CustomerController@get_client_data_connection');
Route::get('/user_add', 'CustomerController@user_add');
Route::post('/add_user_save', 'CustomerController@add_user_save');
Route::get('/user_list', 'CustomerController@user_list');
Route::get('report_view', 'ReportController@report_view');
Route::post('/report_increase_decrease', 'ReportController@datewiseIncDec');
Route::get('client_edit/{cu_id}', 'CustomerDummyController@edit');
Route::get('client_approve/{cu_id}', 'CustomerDummyController@client_approve');
Route::get('client_view/{cu_id}', 'CustomerDummyController@view');
Route::get('/client_delete/{id}', 'CustomerDummyController@delete');
Route::get('client_u_d_dataview/{cu_id}', 'CustomerController@client_u_d_dataview');



Route::group(['prefix' => 'client'], function () {

	//Route::get('/client_add', 'CustomerDummyController@client_add');
    Route::post('client_save', 'CustomerDummyController@client_save');
   // Route::post('client_approve/{cu_id}', 'CustomerDummyController@client_approve');
    Route::post('client_submit/{cu_id}', 'CustomerDummyController@client_submit');

    //Route::get('get_client_list', 'CustomerDummyController@get_client_list');
    //Route::get('get_dummy_list', 'CustomerDummyController@get_dummy_list');

    Route::get('client_edit/{cu_id}', 'CustomerDummyController@edit');
    Route::get('getClient/{cu_id}', 'CustomerDummyController@view');
    Route::post('upload_image', 'CustomerDummyController@upload_image');   
    Route::post('client_update/{id}', 'CustomerDummyController@update');
    Route::delete('delete/{id}', 'CustomerDummyController@delete');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('user', 'UserController@index');
    Route::post('user_save', 'UserController@client_save');
    Route::get('get_user_list', 'UserController@get_user_list');
    Route::get('user_edit/{id}', 'UserController@edit');
    Route::get('getUser/{id}', 'UserController@view');
    Route::post('user_update/{id}', 'UserController@update');
    Route::delete('delete/{id}', 'UserController@delete');
});

/*
Route::middleware('auth:api', 'user_accessible')->group(['prefix' => 'updown'], function () {
    Route::get('client_data_list', 'CustomerController@get_client_list');
});
*/


Route::group(['prefix' => 'updown'], function () {
    //Route::get('client_data_list', 'CustomerController@get_client_list');
    Route::get('client_data_all_list', 'CustomerController@get_client_all_list');
    Route::get('client_data_bandwidth_edit/{id}', 'CustomerController@edit');
    Route::get('client_data_view/{id}', 'CustomerController@view');
    Route::post('client_data_update/{id}', 'CustomerController@update');
    Route::post('client_data_update_d/{id}', 'CustomerController@update_down');
    Route::post('client_update_status/{id}', 'CustomerController@update_status');
});


Route::group(['prefix' => 'report'], function () {
    Route::post('reportincdec', 'ReportController@datewiseIncDec');
});

