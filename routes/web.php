<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{category?}/news', [App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');
Route::resource('/news', 'App\Http\Controllers\NewsController');
