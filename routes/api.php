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
Route::apiResource('/post', PostController::class);  // Les tracta totes
// Route::get('/posts', [PostController::class, 'index']); // Mostrar tots els posts
// Route::post('/posts', [PostController::class, 'store']); // Crear un nou post
// Route::get('/posts/{post}', [PostController::class, 'show']); // Mostrar un post específic
// Route::put('/posts/{post}', [PostController::class, 'update']); // Actualitzar un post
// Route::patch('/posts/{post}', [PostController::class, 'update']); // Actualitzar parcialment un post
// Route::delete('/posts/{post}', [PostController::class, 'destroy']); // Eliminar un post
// Route::get('/tomeu', [PostController::class, 'tomeu']);  // PER EXEMPLE

Route::apiResource('/category', CategoryController::class);

Route::middleware(['auth:sanctum'])->group(function () {
    //Route::apiResource('/post', PostController::class);
    Route::get('/tomeu', [PostController::class, 'tomeu']);
    Route::post('/logout', [AuthController::class, 'logout']);    
});


Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);





/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/