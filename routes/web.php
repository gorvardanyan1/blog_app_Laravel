<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return  redirect('/blogs');
});

Route::get('/blogs', [BlogController::class, 'index'])->middleware('auth')->name('blogs.index');
Route::get('/blogs/create', [BlogController::class, 'create'])->middleware('auth');
Route::get('blogs/{id}', [BlogController::class, 'show'])->middleware('auth');
Route::post('/blogs/store', [BlogController::class, 'store'])->middleware('auth');
Route::get('/blogs/edit/{id}', [BlogController::class, 'edit'])->middleware('auth');
Route::put('/blogs/{id}', [BlogController::class, 'update'])->middleware('auth');
Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->middleware('auth');

Route::post('/blogs/{blog}/comment', [CommentController::class, 'store'])->name('blogs.comments.store')->middleware('auth');

Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
