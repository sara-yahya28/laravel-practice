<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;




Route::get('/', function () {
 return 'Main Page';
})->name('home');

Route::get('/user', [UserController::class, 'index']);
// Route::resource('products', ProductController::class);//create all function at once

// Route::resource('post', PostController::class);
Route::get('/post', [PostController::class, 'index']);
Route::get('/post/{id}',[PostController::class,'show'])
->name('post');
