<?php


Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'PagesController@dashboard')->middleware('auth')->name('dashboard');
Route::get('/post/{id}', 'PagesController@user_post')->middleware('auth')->name('user_post');

Route::resource('posts', 'PostsController')->middleware('auth');
Route::resource('comments', 'CommentsController')->middleware('auth');

