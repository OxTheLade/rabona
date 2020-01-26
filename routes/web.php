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
//Route::get('/', function () {
//    return view('index');
//})->name('index');


Auth::routes();
Route::get('/', 'HomeController@index')->name('index');
Route::get('/nyheder', ['as' => 'all_news', 'uses' => 'HomeController@posts']);
Route::get('/nyheder/{id}', ['as' => 'article', 'uses' => 'AdminPostsController@post']);



Route::group(['middleware' => 'admin'], function () {

    Route::get('/admin', 'AdminController@index')->name('admin.index');

    Route::resource('admin/profile', 'AdminProfileController');
    Route::patch('admin/profile/{id}', 'AdminProfileController@photo');


    Route::resource('admin/posts', 'AdminPostsController', ['names' => [

        'index' => 'posts.index'

    ]]);

});
