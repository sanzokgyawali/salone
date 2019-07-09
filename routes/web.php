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
Route::get('/customer/signup2','CustomerController@signup2');
Route::post('/customer/district','CustomerController@district');
Route::post('/customer/muncipality','CustomerController@muncipality');
Route::post('/customer/ward','CustomerController@ward');
Route::post('/customer/signups2','CustomerController@signups2');
Route::get('/customer/dashboard',function(){
    echo $_COOKIE['emails'];
});
