<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CategoryController;


Route::get('/user', function (Request $request) {
    return $request->user();
});

// Noves rutes
Route::apiResource('/post', PostController::class);
Route::apiResource('/category', CategoryController::class);
Route::get('/tomeu', [PostController::class, 'tomeu']);

Route::middleware(['auth:sanctum'])->group(function () {
    //Route::apiResource('/post', PostController::class);
    Route::get('/tomeu', [PostController::class, 'tomeu']);       // PER EXEMPLE
    Route::post('/logout', [AuthController::class, 'logout']);    
});


Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);





/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/