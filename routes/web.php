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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\TaskController::class, 'index'])->name('home');

    Route::resource('/top', 'App\Http\Controllers\TopController');

    Route::get('/edit1', 'App\Http\Controllers\TopController@edit2');

    Route::get('/edit2', 'App\Http\Controllers\TopController@edit2');

    Route::get('/top/add_companies', 'App\Http\Controllers\TopController@add_companies');

    Route::get('/top/add_users', 'App\Http\Controllers\TopController@add_users');

    Route::get('/add_matters', 'App\Http\Controllers\TopController@add_matters');


    Route::resource('/tasks', 'App\Http\Controllers\TaskController');


    Route::resource('/answer', 'App\Http\Controllers\AnswerController');

});