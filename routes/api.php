<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    /**
     * Auth routes
     */
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])
        ->middleware('auth:sanctum');

    /**
     * Admin-only routes
     */
    Route::middleware(['auth:sanctum', 'admin'])->group(function () {

        Route::apiResource('categories', CategoryController::class)
            ->only(['store', 'update', 'destroy']);

        Route::apiResource('suppliers', SupplierController::class)
            ->only(['store', 'update', 'destroy']);

    });

    /**
     * User routes
     */
    Route::middleware(['auth:sanctum'])->group(function () {

        Route::apiResource('categories', CategoryController::class)
            ->only(['index', 'show']);
        
        Route::apiResource('suppliers', SupplierController::class)
            ->only(['index', 'show']);

    });

});
