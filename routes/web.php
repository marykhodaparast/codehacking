<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Support\Facades\Auth;

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
Route::get('/', function () {
    return view('welcome');
});
Auth::Routes();
Route::get('/logout','Auth\LoginController@logout');
Route::get('/home', 'HomeController@index');

Route::get('/post/{id}',['as' => 'home.post', 'uses'=>'AdminPostsController@post']);

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', function () {
        return view('admin.index');
    });
    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/posts', 'AdminPostsController');
    Route::resource('admin/categories', 'AdminCategoriesController');
    Route::resource('admin/media', 'AdminMediasController');
    Route::any('admin/media/upload', ['as' => 'admin.media.upload', 'uses' => 'AdminMediasController@store']);
    Route::resource('admin/comments', 'PostCommentsController');
    Route::resource('admin/comment/replies', 'CommentRepliesController');
});
Route::group(['middleware' => 'auth'],function (){
    Route::post('comment/reply','CommentRepliesController@createReply');
});