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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'LandingPageController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shop', 'ShopController@index')->name('shop');
Route::get('/shop/detail/{id}', 'ShopController@show')->name('show');
Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/shop/category/{id}', 'ShopController@category')->name('category');
Route::post('/cart/store/{id}', 'CartController@store')->name('store');
Route::patch('/cart/{id}', 'CartController@update')->name('update');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');