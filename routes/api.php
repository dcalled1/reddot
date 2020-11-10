<?php

use App\Http\Controllers\Api\CommunityApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/communities/index', [CommunityApi::class, 'index'])->name('api.community.index');

Route::get('/communities/{id}/info', [CommunityApi::class, 'info'])->name('api.community.info');

Route::get('/communities/{id}/posts', [CommunityApi::class, 'posts'])->name('api.community.posts');

Route::get('/communities/{id}/posts', [CommunityApi::class, 'announcements'])->name('api.community.announcements');
