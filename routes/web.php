<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;

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
Route::group(['middleware' => ['auth']], function(){
//ユーザプロフィール表示
Route::get('/user', 'CyclingController@user');
//ユーザプロフィール編集画面
Route::get('/edit', 'CyclingController@edit');
//ユーザプロフィール編集
Route::post('/edit', 'CyclingController@update');
//投稿画面表示
Route::get('/posts', 'PostController@posts');
//投稿作成画面表示
Route::get('/posts/create', 'PostController@create');
// 投稿処理 
Route::post('/posts', 'PostController@store');
//投稿詳細画面表示
Route::get('/posts/{post}', 'PostController@show');
//イベント画面表示
Route::get('/events', 'EventController@events');
//イベント作成画面表示
Route::get('/events/create', 'EventController@create');
// イベント処理 
Route::post('/events', 'EventController@store');
//イベント詳細画面表示
Route::get('/events/{post}', 'EventController@show');

Route::get('/home', 'HomeController@index')->name('home');
//チャット
Route::get('/chat', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');
//申請
Route::post('/groups', 'GroupController@create');
});
Auth::routes();
