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
Route::get('/', [UserController::class, "showHomePage"]);
Route::post('/register', [UserController::class, "register"]);
Route::post('/login', [UserController::class, "login"]);
Route::post('/logout', [UserController::class, "logout"]);

//Blog post routes
Route::get('/create-post', [BlogController::class, "createPost"]);
Route::get('/post/{post}', [BlogController::class, "viewPost"]);
Route::post('/create-post', [BlogController::class, "storePost"]);
