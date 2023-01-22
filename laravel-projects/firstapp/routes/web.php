<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;

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

//User Routes
Route::get('/', [UserController::class, "showHomePage"])->name('login');
Route::post('/register', [UserController::class, "register"])->middleware('guest');
Route::post('/login', [UserController::class, "login"])->middleware('guest');
Route::post('/logout', [UserController::class, "logout"])->middleware('auth');

//Profile routes
Route::get('/profile/{user:username}', [UserController::class, "profile"]);

//Blog post routes
Route::get('/create-post', [BlogController::class, "createPost"])->middleware('auth');
Route::get('/post/{post}', [BlogController::class, "viewPost"]);
Route::post('/create-post', [BlogController::class, "storePost"])->middleware('auth');

