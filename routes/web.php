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
Route::get('/products', 'TestController@getListProduct')->name('listProduct');
Route::post('/add-product/{id?}', 'TestController@addProduct')->name('addProduct');
Route::get('/add-product-view/{id?}', 'TestController@addProductView')->name('addProductView');
Route::get('/delete-product/{id}', 'TestController@deleteProduct')->name('deleteProduct');


/**
 * route distributor
 * created by : dieumi
 */
Route::get('/distributors', 'MiController@getListDistributor')->name('listDistributor');
Route::post('/adddistributor/{id?}', 'MiController@addDistributorStore')->name('addDistributorStore');
Route::get('/adddistributor/{id?}', 'MiController@addDistributor')->name('addDistributor');
Route::get('/deletedistributor/{id}', 'MiController@deleteDistributor')->name('deleteDistributor');
Route::get('/nguoiDung', 'userController@layDanhSachNguoiDung');
Route::post('/nguoiDung/layThongTinCapNhat', 'userController@layThongTinCapNhat')->name('layThongTinCapNhat');
Route::post('/nguoiDung/them', 'userController@themNguoiDung')->name('them');
Route::post('/nguoiDung/xoa', 'userController@xoaNguoiDung')->name('xoa');
Route::post('/nguoiDung/capNhatNguoiDung', 'userController@capNhatNguoiDung')->name('capNhatNguoiDung');
