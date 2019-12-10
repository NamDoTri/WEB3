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

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfileController@edit');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

Route::get('/p/create', 'PostController@create');
Route::get('/p/{post}', 'PostController@show');
Route::post('/post', 'PostController@store');

Route::get('/instagram/update/{user}', 'ProfileController@updateInstagram');

Route::resource('pictures', 'PictureController'); 
