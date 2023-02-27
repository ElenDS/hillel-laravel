<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', [\App\Http\Controllers\Controller::class, 'show']);

Route::get('/admin', [\App\Http\Controllers\AuthController::class, 'checkAuth']);

Route::prefix('admin')->group(function () {
    Route::resource('categories',\App\Http\Controllers\CategoryController::class)->middleware('auth');
    Route::resource('tags',\App\Http\Controllers\TagController::class)->middleware('auth');
    Route::resource('posts',\App\Http\Controllers\PostController::class)->middleware('auth');
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function(){
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'handleLogin']);
    Route::get('/registration', [\App\Http\Controllers\AuthController::class, 'registration'])->name('registration');

});


Route::post('/registration', [\App\Http\Controllers\AuthController::class, 'handleRegistration']);
