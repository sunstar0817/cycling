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
//ユーザプロフィール表示
Route::get('/user', 'CyclingController@user');
//ユーザプロフィール編集画面
Route::get('/edit', 'CyclingController@edit');
//ユーザプロフィール編集
Route::post('/edit', 'CyclingController@update');
//投稿画面表示
Route::get('/post', 'PostController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');