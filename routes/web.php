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


Route::get('/projects', 'ProjectController@index');
Route::post('/projects', 'ProjectController@store')->middleware('auth');
Route::get('/project/{project}', 'ProjectController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
