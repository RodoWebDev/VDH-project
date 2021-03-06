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
    return Redirect::to('/login');
    // return redirect()->action('AnotherController@someMethod');
    // return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'post'], function () {
    Route::post('create_post', 'PostController@createPost')->name('create_post');
});

Route::group(['prefix' => 'post'], function () {
    Route::get('get_all', 'PostController@getAllPosts')->name('fetch_all');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/credential/{id}', 'CredentialController@index')->name('credential');
