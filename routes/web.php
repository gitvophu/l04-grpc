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


/**
 * route distributor
 * created by : dieumi
 */
Route::get('/distributors', 'MiController@getListDistributor')->name('listDistributor');
Route::post('/adddistributor/{id?}', 'MiController@addDistributorStore')->name('addDistributorStore');
Route::get('/adddistributor/{id?}', 'MiController@addDistributor')->name('addDistributor');
Route::get('/deletedistributor/{id}', 'MiController@deleteDistributor')->name('deleteDistributor');

Route::get('/nguoiDung', 'QUI\\userController@layDanhSachNguoiDung');
Route::post('/nguoiDung/layThongTinCapNhat', 'QUI\\userController@layThongTinCapNhat')->name('layThongTinCapNhat');
Route::post('/nguoiDung/them', 'QUI\\userController@themNguoiDung')->name('themNguoiDung');
Route::post('/nguoiDung/xoa', 'QUI\\userController@xoaNguoiDung')->name('xoaNguoiDung');
Route::post('/nguoiDung/capNhat', 'QUI\\userController@capNhatNguoiDung')->name('capNhatNguoiDung');

Route::get('/hoaDon', 'QUI\\invoiceController@layDanhSachHoaDon');
Route::post('/nguoiDung/layThongTinCapNhat', 'QUI\\invoiceController@layThongTinCapNhat')->name('layThongTinCapNhatHoaDon');
Route::post('/hoaDon/them', 'QUI\\invoiceController@themHoaDon')->name('themHoaDon');
Route::post('/hoaDon/capNhat', 'QUI\\invoiceController@capNhatHoaDon')->name('capNhatHoaDon');
Route::post('/hoaDon/xoa', 'QUI\\invoiceController@xoaHoaDon')->name('xoaHoaDon');