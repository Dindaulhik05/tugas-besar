<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BmiApiController;
use App\Http\Controllers\Api\BmrApiController;
use App\Http\Controllers\Api\UserOlahragaApiController;
use App\Models\UserOlahraga;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::apiResource('bmi', BmiApiController::class);
    Route::apiResource('bmr', BmrApiController::class);
    Route::apiResource('olahraga', UserOlahragaApiController::class);
    

    Route::get('olahraga', [UserOlahragaApiController::class, 'index']);
    Route::get('olahraga/{id}', [UserOlahragaApiController::class, 'show']);
    Route::post('olahraga', [UserOlahragaApiController::class, 'store']);
    Route::put('olahraga/{id}', [UserOlahragaApiController::class, 'update']);
    Route::patch('olahraga/{id}', [UserOlahragaApiController::class, 'update']);
    Route::delete('olahraga/{id}', [UserOlahragaApiController::class, 'destroy']);

});



