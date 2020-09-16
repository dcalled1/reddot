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
    return view('home.index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//Route::get('/', 'HomeController@index')->name("home.index");

//Post
Route::get('/{community}/posts/create', 'App\Http\Controllers\PostController@create')->name("post.create");
Route::get('/{community}/posts/index', 'App\Http\Controllers\PostController@index')->name("post.index");
Route::get('/{community}/posts/show/{post}', 'App\Http\Controllers\PostController@show')->name("post.show");
Route::post('/post/save', 'App\Http\Controllers\PostController@save')->name("post.save");
Route::get('/{community}/posts/update/{post}', 'App\Http\Controllers\PostController@update')->name("post.update");
Route::post('post/save_update', 'App\Http\Controllers\PostController@saveUpdate')->name("post.save_update");
Route::post('post/delete', 'App\Http\Controllers\PostController@delete')->name("post.delete");
//Communities
Route::get('/communities/create', 'App\Http\Controllers\CommunityController@create')->name("community.create");
Route::post('/communities/save', 'App\Http\Controllers\CommunityController@save')->name("community.save");
Route::get('/communities/index', 'App\Http\Controllers\CommunityController@index')->name("community.index");
Route::get('/communities/show/{community}', 'App\Http\Controllers\CommunityController@show')->name("community.show");
Route::get('/communities/update/{community}', 'App\Http\Controllers\CommunityController@update')->name("community.update");
Route::post('/communities/save_update/{community}', 'App\Http\Controllers\CommunityController@saveUpdate')->name("community.save_update");
Route::delete('/communities/delete/{community}', 'App\Http\Controllers\CommunityController@delete')->name("community.delete");
Route::post('/communities/{community}/join', 'App\Http\Controllers\CommunityController@join')->name("community.join");
//Announcement
Route::get('/{community}/announcements/create', 'App\Http\Controllers\AnnouncementController@create')->name("announcement.create");
Route::get('/{community}/announcements/index', 'App\Http\Controllers\AnnouncementController@index')->name("announcement.index");
Route::get('/{community}/announcements/show/{announcement}', 'App\Http\Controllers\AnnouncementController@show')->name("announcement.show");
Route::post('/announcement/save', 'App\Http\Controllers\AnnouncementController@save')->name("announcement.save");
Route::get('/{community}/announcements/update/{announcement}', 'App\Http\Controllers\AnnouncementController@update')->name("announcement.update");
Route::post('announcement/save_update', 'App\Http\Controllers\AnnouncementController@saveUpdate')->name("announcement.save_update");
Route::post('announcement/delete', 'App\Http\Controllers\AnnouncementController@delete')->name("announcement.delete");