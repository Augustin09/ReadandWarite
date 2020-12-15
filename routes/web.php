<?php

use App\Http\Middleware\Admin;
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
//Welcome
Route::group(['prefix' =>  '/'],function(){
    Route::get('/','WelcomeController@index');
    Route::get('book','WelcomeController@book');
    Route::get('pencil','WelcomeController@pencil');
    Route::get('ruler','WelcomeController@ruler');
    Route::get('dictionary','WelcomeController@dictionary');

});

Auth::routes();
//Home
Route::get('/home', 'HomeController@index')->name('home');

//Search
Route::get('/home', 'SearchController@search');

//Detail
Route::get('/detail/{name}','ProductController@show');
Route::get('/detail/edit/{name}','ProductController@edit')->middleware('Admin');
Route::put('/update/edit/{name}','ProductController@update')->middleware('Admin');
Route::delete('/delete/{name}','ProductController@destroy')->middleware('Admin');

//Insert Product
Route::get('/insert', 'ProductController@create')->middleware('Admin');
Route::get('/insert','ProductController@index')->middleware('Admin');
Route::post('/insert','ProductController@store')->middleware('Admin');

//Create Stationary
Route::get('/createType','StationaryController@index')->middleware('Admin');
Route::post('/createType','StationaryController@store')->middleware('Admin');


//Edit Stationary
Route::get('/edit','StationaryController@edit')->middleware('Admin');
Route::put('stationary/edit/{id}','StationaryController@update')->middleware('Admin');
Route::delete('/stationary/delete/{id}','StationaryController@destroy')->middleware('Admin');

//Cart
Route::post('cart','CartController@addToCart')->name('cart');
Route::get('/cart', 'CartController@showCart')->name('cartView');

//update Cart
Route::get('/update/cart/{name}','CartController@edit');
Route::put('/update/cart/{name}','CartController@updateCart')->name('updatecart');
//Delete Cart
Route::delete('/cart/{name}','CartController@destroy')->name('deletecart');
