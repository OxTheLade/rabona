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
Route::get('/rygter', ['as' => 'all_rumours', 'uses' => 'HomeController@rumours']);
Route::get('/liga-tabeller', ['as' => 'league_tables', 'uses' => 'HomeController@leagueTables']);



Route::group(['middleware' => 'admin'], function () {

    Route::get('/admin', 'AdminController@index')->name('admin.index');

    Route::get('admin/profile/change_password', 'AdminProfileController@changePasswordView')->name('profile.password');
    Route::patch('admin/profile/change_password', 'AdminProfileController@changePassword')->name('profile.change_password');
    Route::resource('admin/profile', 'AdminProfileController');



    Route::resource('admin/posts', 'AdminPostsController', ['names' => [

        'index' => 'posts.index'

    ]]);
    Route::resource('admin/leagues', 'AdminLeaguesController');
    Route::resource('admin/teams', 'AdminTeamsController');
    Route::get('admin/leagues/teams/create', 'AdminTeamsController@create')->name('teams.create');
    Route::get('admin/leagues/teams/{id}/edit', 'AdminTeamsController@edit')->name('teams.edit');
    Route::get('admin/leagues/{id}/teams', 'AdminTeamsController@index')->name('leagues.teams');

});
