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

Route::get('/', [\App\Http\Controllers\PostController::class, 'showPosts']);

Route::get('/list-categories', [\App\Http\Controllers\CategoryController::class, 'listCategories']);

Route::get('/create-category', [\App\Http\Controllers\CategoryController::class, 'createCategory']);

Route::post('/create-category',[\App\Http\Controllers\CategoryController::class, 'processFormNewCategory']);

Route::get('/delete-category/{category}', [\App\Http\Controllers\CategoryController::class, 'deleteCategory']);

Route::get('/update-category/{category}',[\App\Http\Controllers\CategoryController::class, 'updateCategory']);

Route::post('/update-category/{category}', [\App\Http\Controllers\CategoryController::class, 'processFormUpdateCategory']);

Route::get('/list-tags', [\App\Http\Controllers\TagController::class, 'listTags']);

Route::get('/create-tag', [\App\Http\Controllers\TagController::class, 'createTag']);

Route::post('/create-tag',[\App\Http\Controllers\TagController::class, 'processFormNewTag']);

Route::get('/delete-tag/{tag}', [\App\Http\Controllers\TagController::class, 'deleteTag']);

Route::get('/update-tag/{tag}',[\App\Http\Controllers\TagController::class, 'updateTag']);

Route::post('/update-tag/{tag}', [\App\Http\Controllers\TagController::class, 'processFormUpdateTag']);

Route::get('/create-post', [\App\Http\Controllers\PostController::class, 'createPost']);

Route::post('/create-post',[\App\Http\Controllers\PostController::class, 'processFormNewPost']);

Route::get('/delete-post/{post}',[\App\Http\Controllers\PostController::class, 'deletePost']);

Route::get('/update-post/{post}',[\App\Http\Controllers\PostController::class, 'updatePost']);

Route::post('/update-post/{post}', [\App\Http\Controllers\PostController::class, 'processFormUpdatePost']);

