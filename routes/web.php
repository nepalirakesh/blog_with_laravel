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
//Page
Route::get('/','PagesController@getHome')->name('home');
Route::get('/contact','PagesController@getContact')->name('contact');
Route::get('/about','PagesController@getAbout')->name('about');
Route::get('/blog/{slug}','PagesController@getBlogBySlug')
    ->name('show.blog.by.slug');

Route::get('/blog','PagesController@getAllBlog')->name('blog');


//Post

Route::resource('posts','PostController');



Auth::routes();


//Route::get('/home', 'HomeController@index')->name('home');
//Auth/login
Route::get('/admin/login', 'AdminLoginController@showLoginForm')->name('admin.show.login');
Route::post('/admin/login', 'AdminLoginController@login')->name('admin.submit.login');
Route::get('/admin', 'AdminController@index')->name('admin_home');




//Editor login
Route::get('/editor/login','EditorLoginController@ShowloginForm')->name('editor.show.login');
Route::post('/editor/login','EditorLoginController@login')->name('editor.submit.login');
Route::get('/editor','EditorController@index')->name('editor_home');




//category
Route::resource('category','CategoryController')->only('index','store');
Route::resource('tag','TagController');



//comments
Route::post('comments/{post_id}','CommentController@store')->name('comments.store');
Route::get('comments/{id}','CommentController@destroy')->name('comment.delete');
