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

use App\Http\Controllers\InstaController;
use App\Http\Controllers\UserController;

Route::group(['middleware' => ['web']], function () {

    Route::get('/', [InstaController::class, 'home'])->name('home');

    Route::get('/login', [InstaController::class, 'login'])->name('login');

    Route::post('/login', [UserController::class, 'login'])->name('post.login');

    Route::get('/register', [InstaController::class, 'register'])->name('register');

    Route::post('/register', [UserController::class, 'register'])->name('post.register');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/like/{post_id}/{user_id}', [InstaController::class, 'like'])->name('like');

    Route::post('/comment', [InstaController::class, 'comment'])->name('comment');

    Route::post('/img-user', [InstaController::class, 'imgUser'])->name('img.user');

    Route::get('/user/{perfil}', [InstaController::class, 'perfilUser'])->name('perfil.user');

    Route::post('/public', [InstaController::class, 'publication'])->name('publication');

    Route::post('/search', [InstaController::class, 'search'])->name('search');

    Route::get('/follow/{user_id}/{user_follow}', [InstaController::class, 'follow'])->name('follow');

});
