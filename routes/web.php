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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', 'TestController@test');

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
Route::get('/p', 'PostController@create');
Route::post('/post', 'PostController@store');

Route::resource('pictures', 'PictureController'); 