<?php

use App\Http\Controllers\Api\AgendaController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BudayaController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\SenimanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Seniman (public)
Route::get('/seniman', [SenimanController::class, 'index']);
Route::get('/seniman/{id}', [SenimanController::class, 'show']);

// Budaya (public)
Route::get('/budaya', [BudayaController::class, 'index']);
Route::get('/budaya/{id}', [BudayaController::class, 'show']);

// Agenda (public)
Route::get('/agenda', [AgendaController::class, 'index']);
Route::get('/agenda/{id}', [AgendaController::class, 'show']);

// Contact (public)
Route::post('/contact', [ContactController::class, 'store']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    // User info and logout
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Profile management
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::put('/profile', [ProfileController::class, 'update']);
    
    // User posts
    Route::get('/profile/posts', [ProfileController::class, 'getUserPosts']);
    Route::post('/profile/posts', [ProfileController::class, 'storePost']);
    Route::put('/profile/posts/{id}', [ProfileController::class, 'updatePost']);
    Route::delete('/profile/posts/{id}', [ProfileController::class, 'deletePost']);

    
    Route::get('/seniman', [SenimanController::class, 'index']);
    Route::get('/budaya', [BudayaController::class, 'index']);
    Route::get('/agenda', [AgendaController::class, 'index']);
    
    
    // Admin only routes
    Route::middleware('admin')->prefix('admin')->group(function () {
        // Sen    iman management
        Route::post('/seniman', [SenimanController::class, 'store']);
        Route::put('/seniman/{id}', [SenimanController::class, 'update']);
        Route::delete('/seniman/{id}', [SenimanController::class, 'destroy']);
        
        // Budaya management
      
        Route::post('/budaya', [BudayaController::class, 'store']);
        Route::put('/budaya/{id}', [BudayaController::class, 'update']);
        Route::delete('/budaya/{id}', [BudayaController::class, 'destroy']);
        
        // Agenda management

        Route::post('/agenda', [AgendaController::class, 'store']);
        Route::put('/agenda/{id}', [AgendaController::class, 'update']);
        Route::delete('/agenda/{id}', [AgendaController::class, 'destroy']);
        
        // Contact management
        Route::get('/contacts', [ContactController::class, 'index']);
    });
});
