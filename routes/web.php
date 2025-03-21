<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NewsController;


Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{category}/news', [App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');
Route::resource('news', 'App\Http\Controllers\NewsController');


Route::get('/page/{page}', function($page) {
    return view('pages.'.$page);
})->name('page');

Route::get('password',[App\Http\Controllers\AccountController::class, 'editPassword'])->name('password.edit');
Route::put('password',[App\Http\Controllers\AccountController::class, 'updatePassword'])->name('password.update');
