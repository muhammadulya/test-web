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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'management'], function() {
    // PRODUCT ITEM
    Route::group(['prefix' => 'product-item'], function() {
        Route::get('/', 'ProductItemController@index')->name('management.product_item.index');
        Route::get('/create', 'ProductItemController@create')->name('management.product_item.create');
        Route::post('/store', 'ProductItemController@store')->name('management.product_item.store');
        Route::get('/edit/{id}', 'ProductItemController@edit')->name('management.product_item.edit');
        Route::patch('/update', 'ProductItemController@update')->name('management.product_item.update');
        Route::delete('/delete', 'ProductItemController@delete')->name('management.product_item.delete');
    });
});