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

Route::apiResources(['products' => 'API\ProductsController']);
Route::apiResources(['customers' => 'API\CustomersController']);
Route::apiResources(['orders' => 'API\OrdersController']);
Route::apiResources(['order-details' => 'API\OrderDetailsController']);


Route::get('/customer-info', 'API\CustomersController@getInfo');
Route::get('/orders-info', 'API\OrderDetailsController@getOrder');