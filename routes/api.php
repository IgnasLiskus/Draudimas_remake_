<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\OwnerController;
use Illuminate\Support\Facades\Route;

// Public — login
Route::post('/login', [AuthController::class, 'login']);

// Protected — require token
Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me',      [AuthController::class, 'me']);

    Route::apiResource('owners', OwnerController::class);
    Route::apiResource('cars',   CarController::class);
});
