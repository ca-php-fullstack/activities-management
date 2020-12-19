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
    return view('auth.login');
});

Auth::routes([
    'register' => false
]);

Route::get('/home', 'UserController@index')->name('home');
Route::get('/activities', 'UserActivityController@index')->name('activities');
Route::get('/create', 'UserActivityController@create')->name('create');
Route::post('/store', 'UserActivityController@store')->name('store');
Route::get('/show/{id}', 'UserActivityController@show')->name('show');
Route::get('/edit/{userActivity}', 'UserActivityController@edit')->name('edit');
Route::put('/update/{id}', 'UserActivityController@update')->name('update');
Route::delete('/destroy/{id}', 'UserActivityController@destroy')->name('destroy');