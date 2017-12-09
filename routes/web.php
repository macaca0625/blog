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
    return view('index');
});

Route::get('/post', "PostController@index");
Route::get('/post/create', "PostController@create");
Route::get('/post/{post}', "PostController@show");

Route::post('/post', "PostController@store");
Route::post('/post/{post}/comments', "CommentController@store");

Route::get('/ytapi', "YoutubeController@api");
