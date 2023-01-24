<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;

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

//Admin-only routes
Route::get('/admin',	[UserController::class, "adminPage"])->middleware('can:accessAdminPage');

//User Routes
Route::get('/', [UserController::class, "showHomePage"])->name('login');
Route::post('/register', [UserController::class, "register"])->middleware('guest');
Route::post('/login', [UserController::class, "login"])->middleware('guest');
Route::post('/logout', [UserController::class, "logout"])->middleware('auth');
Route::get('/manage-avatar', [UserController::class, "manageAvatarForm"])->middleware('auth');
Route::post('/manage-avatar', [UserController::class, "storeAvatar"])->middleware('auth');

//Profile routes
Route::get('/profile/{user:username}', [UserController::class, "profile"]);
Route::get('/profile/{user:username}/followers', [UserController::class, "profileFollowers"]);
Route::get('/profile/{user:username}/following', [UserController::class, "profileFollowing"]);

//Blog post routes
Route::get('/create-post', [BlogController::class, "createPost"])->middleware('auth');
Route::get('/post/{post}', [BlogController::class, "viewPost"]);
Route::post('/create-post', [BlogController::class, "storePost"])->middleware('auth');
Route::delete('/post/{post}', [BlogController::class, "deletePost"])->middleware('can:delete,post');
Route::get('/post/{post}/edit', [BlogController::class, "editPostForm"])->middleware('can:update,post');
Route::put('/post/{post}', [BlogController::class, "updatePost"])->middleware('can:update,post');
Route::get('/search/{term}', [BlogController::class, "search"]);


//Follow user routes
Route::post('/follow/{user}', [FollowController::class, "assignFollower"])->middleware('auth');
Route::delete('/follow/{user}', [FollowController::class, "unassignFollower"])->middleware('auth');


//Chat routes
Route::post('/send-message', [ChatController::class, "sendMessage"])->middleware('auth');
