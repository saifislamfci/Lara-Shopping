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


Route::prefix('cart')->group(function (){ 
Route::get('/', 'Api\CartController@show')->name('carts'); 
Route::post('/store', 'Api\CartController@store')->name('cart.store'); 
Route::post('/cartupdate/{cartsid}','Api\CartController@update')->name('carts.update'); 
Route::post('/delete/{id}', 'Api\CartController@destroy')->name('carts.delete'); 
});
