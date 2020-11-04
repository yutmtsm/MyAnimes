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

Auth::routes();

Route::get('/', 'AnimesController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index', 'UsersController@index')->name('home');

// ログイン状態
Route::group(['middleware' => 'auth'], function() {
    
    // アニメ関連
    Route::resource('animes', 'AnimesController', ['only' => 'create', 'store', 'show', 'edit', 'update']);
    
    // ユーザ関連
    Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'edit', 'update']]);

    // フォロー/フォロー解除を追加
    Route::post('users/{user}/follow', 'UsersController@follow')->name('follow');
    Route::delete('users/{user}/unfollow', 'UsersController@unfollow')->name('unfollow');

    // ツイート関連
    Route::resource('tweets', 'TweetsController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']]);
    
    // コメント関連
    Route::resource('comments', 'CommentsController', ['only' => ['store']]);
    
    // いいね関連
    Route::resource('favorites', 'FavoritesController', ['only' => ['store', 'destroy']]);

});
