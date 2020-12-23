<?php
use App\Product;

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
    $products = Product::latest()->get();
    return view('welcome')->with('products', $products);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cart', 'CartController@index')->name('cart');

Route::get('/cart/add/{id}', 'CartController@add');
Route::get('/cart/remove/{id}', 'CartController@remove');


Route::get('/place-order', 'API\OrderDetailsController@placeOrder')->name('place-order');
Route::get('/cart/checkout/{id}', 'API\OrdersController@checkout');
Route::post('/confirm', 'API\OrdersController@store')->name('confirm');
