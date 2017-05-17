<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/{author?}', [
	'uses' => 'QuoteController@getIndex',
	'as' => 'index'
]);

Route::post('/new', [
	'uses' => 'QuoteController@postQuote',
	'as' => 'create'
]);

Route::get('/delete/{id}', [
	'uses' => 'QuoteController@getDelete',
	'as' => 'delete'
]);


Route::get('/gotEmail/{authorName}', [
	'uses' => 'QuoteController@getMailCallBack',
	'as' => 'mailCallBack'
]);

Route::get('/admin/login', [
	'uses' => 'AdminController@getLogin',
	'as' => 'admin.login'
]);
Route::post('/admin/login', [
	'uses' => 'AdminController@postLogin',
	'as' => 'admin.login'
]);
Route::group(['middleware' => 'auth' ], function() {

	Route::get('/admin/dashboard', [
		'uses' => 'AdminController@getAdminDashboard',
		'middleware' => 'auth',
		'as' => 'admin.dashboard'
	]);


	Route::get('/admin/logout', [
		'uses' => 'AdminController@adminLogOut',
		'as' => 'admin.logout'
	]);

});
