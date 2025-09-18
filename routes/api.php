<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/create/token', [AuthController::class, 'generateToken']);

Route::apiResource('/posts', PostController::class)->middleware('auth:sanctum');
