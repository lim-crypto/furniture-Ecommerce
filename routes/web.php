<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products', 'ProductController@getProducts')->name('products');
Route::get('/products/{product}', 'ProductController@getProduct')->name('product');
Route::get('/products/category/{id}', 'ProductController@getProductByCategory')->name('productByCategory');

Route::get('/about', function () {
    return view('about');
});

Route::resource('/users', 'UserController');

Route::resource('/orders', 'OrderController');
Route::put('/cancel/{order}', 'OrderController@cancelOrder')->name('orders.cancel');
Route::get('/print/{order}', 'OrderController@printOrder')->name('orders.print');
Route::put('/orders/{order}', 'OrderController@updateStatus')->name('orders.updateStatus');

Route::get('/checkout', 'CheckoutController@checkout')->name('checkout');
Route::post('/checkout', 'CheckoutController@store')->name('checkout');

// Route::resource('/orderDetails', 'OrderDetailsController');
Route::resource('/reservations', 'ReservationController');
Route::resource('/shippingAddresses', 'ShippingAddressController');

Route::middleware('admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', 'AdminController@index')->name('admin.index');
        Route::get('/dashboard', 'AdminController@index')->name('dashboard');

        Route::get('/users', 'UserController@index');
        Route::put('/users/{user}', 'UserController@ban')->name('user.ban');
        Route::get('/orders', 'OrderController@index');

        Route::resource('/category', 'CategoryController');
        Route::resource('/products', 'ProductController');
    });
});

// Carts
Route::get('/carts', 'CartController@index')->name('carts.index');
Route::get('/add-to-cart/{product:id}', 'CartController@add')->name('carts.add');
Route::get('/remove/{product:id}', 'CartController@remove')->name('carts.remove');
Route::get('/remove-to-cart/{product:id}', 'CartController@destroy')->name('carts.destroy');
Route::put('/carts/update/{product:id}', 'CartController@update')->name('carts.update');
