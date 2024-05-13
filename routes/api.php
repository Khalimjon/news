<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\NewsApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('categories', CategoryApiController::class);
Route::apiResource('news', NewsApiController::class);
