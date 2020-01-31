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

//-----------------------------------------------------
// Guest routes
//-----------------------------------------------------
Auth::routes();
Route::get('/', 'HomeController@index')->name('index');
Route::get('/nyheder', ['as' => 'all_news', 'uses' => 'HomeController@posts']);
Route::get('/nyheder/{id}', ['as' => 'article', 'uses' => 'AdminPostsController@post']);
Route::get('/rygter', ['as' => 'all_rumours', 'uses' => 'HomeController@rumours']);
Route::get('/liga-tabeller', ['as' => 'league_tables', 'uses' => 'HomeController@leagueTables']);
Route::get('/kategori/{id}', ['as' => 'category', 'uses' => 'HomeController@category']);
Route::post('/search', ['as' => 'search', 'uses' => 'HomeController@search']);
Route::get('/search', ['as' => 'search.index', 'uses' => 'HomeController@searchIndex']);
//-----------------------------------------------------
// Admin Route Group
//-----------------------------------------------------
Route::group(['middleware' => 'admin'], function () {

    // Admin & Author index route
    Route::get('/author', 'AuthorController@index')->name('author.index');
    Route::get('/admin', 'AdminController@index')->name('admin.index');


    // Admin Profile
    Route::get('admin/profile/change_password', 'AdminProfileController@changePasswordView')->name('profile.password');
    Route::patch('admin/profile/change_password', 'AdminProfileController@changePassword')->name('profile.change_password');
    Route::resource('admin/profile', 'AdminProfileController');

    // Admin Users
    Route::resource('admin/users', 'AdminUsersController');

    // Admin Posts
    Route::post('admin/posts/search', ['as' => 'admin.posts.search', 'uses' => 'AdminPostsController@search']);
    Route::resource('admin/posts', 'AdminPostsController', ['names' => [

        'index' => 'posts.index'

    ]]);

    // Admin Categories
    Route::resource('admin/categories', 'AdminCategoriesController');


    // Admin Leagues
    Route::resource('admin/leagues', 'AdminLeaguesController');

    // Admin Teams
    Route::resource('admin/teams', 'AdminTeamsController');
    Route::get('admin/leagues/teams/create', 'AdminTeamsController@create')->name('teams.create');
    Route::get('admin/leagues/teams/{id}/edit', 'AdminTeamsController@edit')->name('teams.edit');
    Route::get('admin/leagues/{id}/teams', 'AdminTeamsController@index')->name('leagues.teams');

});
//-----------------------------------------------------
// Author route groups
//-----------------------------------------------------

Route::group(['middleware' => 'author'], function () {

    Route::get('/author', 'AuthorController@index')->name('author.index');

    Route::resource('author/posts', 'AuthorPostsController', ['names' => [

        'index' => 'author.posts.index',
        'create' => 'author.posts.create',
        'edit' => 'author.posts.edit',

    ]]);

});
