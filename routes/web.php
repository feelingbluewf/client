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
	return view('carfix/welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth', 'namespace' => 'Carfix'], function() {

	Route::resource('orders', 'OrderController')->names('carfix.orders');

	Route::get('orders/create/{service_type}', 'OrderController@create');

	Route::resource('history', 'HistoryOrderController')->names('carfix.orders.history');

	Route::resource('cars', 'CarController')->names('carfix.cars');

	Route::resource('home', 'HomeController')->names('carfix.home');


});

