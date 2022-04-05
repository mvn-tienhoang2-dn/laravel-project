<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/create-user', 'Api\UserController@store')->name('api.user.store');
Route::delete('/delete-user/{id}', 'Api\UserController@destroy')->name('api.user.destroy');
Route::put('/update-user/{id}', 'Api\UserController@update')->name('api.user.update');
Route::get('/edit-user/{id}', 'Api\UserController@edit')->name('api.user.edit');
