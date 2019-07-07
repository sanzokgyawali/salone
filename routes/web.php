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

Route::get('/',"HomeController@home");
Route::get('/customer/login',"CustomerController@login");
Route::get('/customer/signup','CustomerController@signup');
Route::post('/customer/signupsubmit','CustomerController@signupsubmit');
