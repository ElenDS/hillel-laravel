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

Route::get('/', [\App\Http\Controllers\Controller::class, 'show']);

Route::get('/list-categories', [\App\Http\Controllers\Controller::class, 'listCategories']);

Route::get('/create-category', [\App\Http\Controllers\Controller::class, 'createCategory']);

Route::post('/create-category',[\App\Http\Controllers\Controller::class, 'processFormNewCategory']);

Route::get('/delete-category', [\App\Http\Controllers\Controller::class, 'deleteCategory']);

Route::get('/update-category',[\App\Http\Controllers\Controller::class, 'updateCategory']);

Route::post('/update-category', [\App\Http\Controllers\Controller::class, 'processFormUpdateCategory']);

Route::get('/list-tags', [\App\Http\Controllers\Controller::class, 'listTags']);

Route::get('/create-tag', [\App\Http\Controllers\Controller::class, 'createTag']);

Route::post('/create-tag',[\App\Http\Controllers\Controller::class, 'processFormNewTag']);

Route::get('/delete-tag', [\App\Http\Controllers\Controller::class, 'deleteTag']);

Route::get('/update-tag',[\App\Http\Controllers\Controller::class, 'updateTag']);

Route::post('/update-tag', [\App\Http\Controllers\Controller::class, 'processFormUpdateTag']);
