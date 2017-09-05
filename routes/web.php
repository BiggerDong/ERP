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
    return redirect('/login');
});

Auth::routes();

Route::get('/logout','Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/materials','MaterialsController@index');
Route::get('/materials/create','MaterialsController@create');
Route::post('/materials','MaterialsController@store');
Route::get('/materials/{id}/edit','MaterialsController@edit');
Route::put('/materials/{id}','MaterialsController@update');
Route::get('/materials/search','MaterialsController@search');

Route::get('/suppliers/search','SuppliersController@search');
Route::resource('/suppliers','SuppliersController');

Route::get('/bills/st/create','BillsController@stCreate');
Route::post('/bills/st','BillsController@stStore');
Route::get('/bills/st/{id}','BillsController@stShow')->name('stshow');
Route::get('/bills/st','BillsController@stIndex');

Route::get('/bills/or/create','BillsController@orCreate');
Route::post('/bills/or','BillsController@orStore');
Route::get('/bills/or/{id}','BillsController@orShow')->name('orshow');
Route::get('/bills/or','BillsController@orIndex');

Route::get('/bills/ai/create','BillsController@aiCreate');
Route::post('/bills/ai','BillsController@aiStore');
Route::get('/bills/ai/{id}','BillsController@aiShow')->name('aishow');
Route::get('/bills/ai','BillsController@aiIndex');

Route::get('/bills/di/create','BillsController@diCreate');
Route::post('/bills/di','BillsController@diStore');
Route::get('/bills/di/{id}','BillsController@diShow')->name('dishow');
Route::get('/bills/di','BillsController@diIndex');

Route::get('/bills/pi/create','BillsController@piCreate');
Route::post('/bills/pi','BillsController@piStore');
Route::get('/bills/pi/{id}','BillsController@piShow')->name('pishow');
Route::get('/bills/pi','BillsController@piIndex');

Route::resource('/bills','BillsController');

