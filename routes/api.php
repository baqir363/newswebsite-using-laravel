<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function(){
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

Route::get('news/list',[NewsController::class, 'index']);
Route::get('category/list', [CategoryController::class, 'index']);

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('news', NewsController::class);
    Route::resource('category', CategoryController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});
