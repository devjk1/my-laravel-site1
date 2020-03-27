<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customers', 'CustomerController@index')->name('customer.index');
Route::get('/customers/create', 'CustomerController@create')->name('customer.create');
Route::post('/customers/store', 'CustomerController@store')->name('customer.store');
Route::get('/customers/{customer}', 'CustomerController@show')->name('customer.show');
Route::get('/customers/{customer}/edit', 'CustomerController@edit')->name('customer.edit');
Route::put('/customers/{customer}/update', 'CustomerController@update')->name('customer.update');

Route::get('/customers/{customer}/orders', 'OrderController@index')->name('order.index');
Route::get('/customers/{customer}/orders/{order}', 'OrderController@show')->name('order.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/csv', 'HomeController@csv')->name('csv');
