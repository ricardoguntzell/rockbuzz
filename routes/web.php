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

Auth::routes();

Route::get('/', 'HomeController@blog')->name('blog');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts', 'PostsController@listar')->name('posts');
Route::get('/posts/create', 'PostsController@criar')->name('posts.create');
Route::post('/posts/store', 'PostsController@salvar')->name('posts.store');
Route::get('/posts/show/{id}', 'PostsController@apresentar')->name('posts.apresentar');
Route::get('/posts/edit/{id}', 'PostsController@editar')->name('posts.edit');
Route::post('/posts/update/{id}', 'PostsController@atualizar')->name('posts.update');
Route::get('/posts/destroy/{id}', 'PostsController@deletar')->name('posts.destroy');
