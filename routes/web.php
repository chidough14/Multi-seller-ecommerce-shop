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

Route::redirect('/', '/home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add-to-cart/{product}', 'CartController@add')->name('cart.add')->middleware('auth');
Route::get('/cart', 'CartController@index')->name('cart.index')->middleware('auth');

Route::get('/product/search', 'ProductController@search')->name('product.search');
Route::resource('product', 'ProductController');

Route::get('/cart/destroy{id}', 'CartController@destroy')->name('cart.destroy')->middleware('auth');
Route::get('/cart/update{id}', 'CartController@update')->name('cart.update')->middleware('auth');
Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout')->middleware('auth');
Route::resource('orders', 'OrderController')->middleware('auth');
Route::resource('shop', 'ShopController')->middleware('auth');


Route::get('/paypal/checkout/{order}', 'PaypalController@getExpressCheckout')->name('paypal.checkout');
Route::get('/paypal/checkout-success/{order}', 'PaypalController@getExpressCheckoutSuccess')->name('paypal.success');
Route::get('/paypal/cancelpage', 'PaypalController@cancelPage')->name('paypal.cancel');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
