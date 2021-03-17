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



Auth::routes();
//すべてのユーザー
Route::namespace('App\Http\Controllers')->group(function () {
    
    Route::get('/top', 'TopController@index')->name('top');

    Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
    Route::get('/top/add_companies', 'TopController@add_companies')->name('top/add_companies');
    Route::get('/top/add_users', 'TopController@add_users')->name('top/add_users');
    Route::get('/top/add_matters', 'TopController@add_matters')->name('top/add_matters');
    });
    
    Route::get('/edit1', 'TopController@edit2');
    Route::get('/edit2', 'TopController@edit2');
    Route::resource('/tasks', 'TaskController');
    Route::resource('/answer', 'AnswerController');
});

