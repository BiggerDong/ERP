<?php

use Illuminate\Http\Request;

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

Route::get('/materials','MaterialsController@apiMaterials');
Route::delete('/materials/{id}','MaterialsController@destroy');
Route::put('/materials/{id}','MaterialsController@apiMaterialHidden');

Route::get('/materials/search','MaterialsController@apiSearchMaterials');

Route::get('/bills/st/search','BillsController@stApiSearchMid');

Route::get('/bills/or/search','BillsController@orApiSearchSid');

Route::get('/bills/time','BillsController@time');

