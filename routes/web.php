<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/list-user', 'UserController@index')->name('user.list.index');
Route::get('/create-user', 'UserController@view')->name('user.create.view');
Route::post('/create-user', 'UserController@store')->name('user.create.store');
Route::group(['prefix' => '/search'], function () {
    Route::get('/', 'UserController@searchIndex')->name('user.search.searchIndex');
    Route::get('/data-table-search', 'UserController@getDataTable')->name('user.search.getDataTable');
    Route::post('/name', 'UserController@searchDataName')->name('user.search.searchDataName');
    Route::post('/post-total', 'UserController@searchDataPost')->name('user.search.searchDataPost');
    Route::post('/comment-total', 'UserController@searchDataComment')->name('user.search.searchDataComment');
});
Route::group(['prefix' => '/users'], function () {
    Route::get('/{id}', 'ProfileController@show')->name('user.profile.show');
    Route::get('/{id}/comments', 'CommentController@show')->name('user.comment.show');
});
Route::group(['prefix' => '/comments'], function () {
    Route::get('/', 'CommentController@index')->name('user.comment.index');
    Route::get('/{id}/users', 'CommentController@detail')->name('user.comment.detail');
});
Route::group(['prefix' => '/posts'], function () {
    Route::get('/', 'PostController@index')->name('user.post.index');
    Route::get('/{id}/users', 'PostController@show')->name('user.post.show');
});
Route::group(['prefix' => '/list-user'], function () {
    Route::group(['prefix' => '/sort'], function () {
        Route::get('/name-a-z', 'UserController@sortNameAsc')->name('user.sort.nameasc');
        Route::get('/name-z-a', 'UserController@sortNameDesc')->name('user.sort.namedesc');
        Route::get('/age-up', 'UserController@sortAgeAsc')->name('user.sort.ageasc');
        Route::get('/age-down', 'UserController@sortAgeDesc')->name('user.sort.agedesc');
    });
});
