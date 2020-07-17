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

use App\Http\Controllers\Blog\PostsController;

Route::get('/', 'WelcomeController@home');
Route::get('/blog/posts/{post}', [PostsController::class, 'show'])->name('blog.show');

Auth::routes();



Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('tags', 'TagsController');
    Route::resource('posts', 'PostsController');
    Route::get('trashed-post', 'PostsController@trashed')->name('trashed-posts.index');
    Route::put('restore-post/{post}', 'PostsController@restore')->name('restore-posts');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('users/profile', 'UserController@edit')->name('users.edit-profile');
    Route::resource('categories', 'CategoriesController');
    Route::resource('tags', 'TagsController');
    Route::get('users', 'UserController@index')->name('users.index');
    Route::post('users/{user}/make-admin', 'UserController@makeAdmin')->name('users.make-admin');
    Route::put('users/profile', 'UserController@update')->name('users.update-profile');
});