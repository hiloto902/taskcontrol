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
    

    Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
    Route::get('/top', 'TopController@index')->name('top.index');
    Route::get('/top/add_companies', 'TopController@add_companies')->name('top/add_companies');
    Route::post('/top/add_companies', 'TopController@store1')->name('top/store1');
    Route::get('/top/add_users', 'TopController@add_users')->name('top/add_users');
    Route::post('/top/add_users', 'TopController@store2')->name('top/store2');
    Route::get('/top/add_matters', 'TopController@add_matters')->name('top/add_matters');
    Route::post('/top/add_matters', 'TopController@store3')->name('top/store3');

    });
    
    Route::get('/edit1', 'TopController@edit2');
    Route::get('/edit2', 'TopController@edit2');
    Route::resource('/tasks', 'TaskController');
    Route::resource('answers', 'AnswerController');
});

