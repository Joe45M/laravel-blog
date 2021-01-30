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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Post management routes
|--------------------------------------------------------------------------
|
| Post management routes for users to manage their posts.
|
*/

Route::resource('post', \App\Http\Controllers\CreatePostController::class);

Route::get('/profile/{id}', [\App\Http\Controllers\UserProfileController::class, 'index'])->name('profile.index');

Route::resource('comment', \App\Http\Controllers\CommentController::class);
