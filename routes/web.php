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

Route::get('/', 'ArticlesController@index');
Route::get('/articles/create', 'ArticlesController@create');
Route::get('/articles/{id}', 'ArticlesController@show')->where('post','[0-9]+');
Route::post('/articles', 'ArticlesController@store');
Route::get('/articles/{id}/edit', 'ArticlesController@edit');
Route::patch('/articles/{article}', 'ArticlesController@update');
Route::delete('/articles/{article}', 'ArticlesController@destroy');
Route::post('/articles/{article}/documents', 'DocumentsController@store');
Route::delete('/articles/{article}/documents/{document}', 'DocumentsController@destroy');
