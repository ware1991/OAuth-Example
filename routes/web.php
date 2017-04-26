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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

//OAuth 登入
Route::get('auth/{provider}', 'AuthController@authRedirect');

//OAuth 回傳
Route::get('auth/{provider}/callback', 'AuthController@authCallback');
