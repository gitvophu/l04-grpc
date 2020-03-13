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

Route::get('/', 'TestController@getListProduct')->name('listProduct');
Route::get('/products', 'TestController@getListProduct')->name('listProduct');
Route::post('/add-product/{id?}', 'TestController@addProduct')->name('addProduct');
Route::get('/add-product-view/{id?}', 'TestController@addProductView')->name('addProductView');
Route::get('/delete-product/{id}', 'TestController@deleteProduct')->name('deleteProduct');
