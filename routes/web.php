<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/greeting', function () {
//     return 'Hello World';
// });

Route::get('/', function () {return view('home');})->name('home');

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store'])->middleware('auth');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');

Route::get('/messages', function () {
    return view('messages');
});

//28-12-2020
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes')->middleware('auth');
Route::delete('/posts/{post}/unlike', [PostLikeController::class, 'destroy'])->name('posts.unlike')->middleware('auth');
// end 28-12-2020
Route::get('users/{user:username}', [UserProfileController::class, 'index'])->name('user.profile');



