<?php

use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);
});

// 🔒 Protected Routes
Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('tasks', TaskController::class);
});
