<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{slug}', [PostController::class, 'show']);

Route::get('/dashboard', [PostController::class, 'userPosts'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::post('/create', [PostController::class, 'create']);
Route::post('/update', [PostController::class, 'update']);

Route::get('/delete/{slug}', [PostController::class, 'delete'])
    ->middleware(['auth']);
Route::get('/edit/{slug}', [PostController::class, 'edit'])
    ->middleware(['auth']);

Route::get('/new-post', [PostController::class, 'add'])
    ->name('new-post')
    ->middleware(['auth']);


Route::post('/comments/create', [CommentController::class, 'create'])->middleware(['auth']);
Route::get('/comments/delete/{comment:id}', [CommentController::class, 'delete']);


Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories')
    ->middleware(['auth']);

Route::get('categories/{slug}', [CategoryController::class, 'show']);

Route::post('/categories/create', [CategoryController::class, 'create'])
    ->middleware(['auth']);
Route::post('/categories/update', [CategoryController::class, 'update'])
    ->middleware(['auth']);

Route::get('/categories/delete/{slug}', [CategoryController::class, 'delete'])
    ->middleware(['auth']);
Route::get('/categories/edit/{slug}', [CategoryController::class, 'edit'])
    ->middleware(['auth']);




require __DIR__ . '/auth.php';
