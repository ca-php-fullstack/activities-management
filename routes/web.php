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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes([
    'register' => false
]);

Route::get('/profile', 'UserController@index')->name('profile');

Route::get('/create', 'UserActivityController@create')->name('create');
Route::post('/store', 'UserActivityController@store')->name('store');
Route::get('/edit/{userActivity}', 'UserActivityController@edit')->name('edit');
Route::put('/update/{userActivity}', 'UserActivityController@update')->name('update');
Route::delete('/destroy/{userActivity}', 'UserActivityController@destroy')->name('destroy');