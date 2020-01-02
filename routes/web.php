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

Route::get('/', 'PostController@index');

Auth::routes();

Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfileController@edit');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

Route::get('/p/create', 'PostController@create');
Route::get('/p/{picture}/edit', 'PostController@edit');
Route::get('/p/{post}', 'PostController@show');
Route::post('/p/upload', 'PostController@store');
Route::patch('/p/{picture}', 'PostController@update');

Route::get('/crits/{user}', 'CriticController@index');
Route::get('/crits/show', 'CriticController@show');
Route::get('/crits/create/{picture}', 'CriticController@create');
Route::post('/crits/upload/{picture}', 'CriticController@store');

Route::post('/critic/agree/{crit}', 'CriticController@agree');
Route::post('/critic/disagree/{crit}', 'CriticController@disagree');

Route::resource('pictures', 'PictureController'); 
