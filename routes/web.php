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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//Route::get('/', 'HomeController@index')->name("home.index");


Route::get('/{community}/create', 'App\Http\Controllers\PostController@create')->name("post.create");
Route::get('/{community}/posts/index', 'App\Http\Controllers\PostController@index')->name("post.index");
Route::get('/{community}/posts/show/{post}', 'App\Http\Controllers\PostController@show')->name("post.show");
Route::post('/post/save', 'App\Http\Controllers\PostController@save')->name("post.save");