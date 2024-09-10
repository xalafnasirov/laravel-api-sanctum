<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::controller(UserController::class)->group(function() {
    Route::post('register', [UserController::class,'register']);
});

Route::controller(ProductController::class)->group(function () {
    Route::get('products','index');
    Route::get('products/{id}', 'show');
    Route::get('products/search/{name}', 'search');
});

Route::middleware('auth:sanctum')->controller(ProductController::class)->group(function () {
    Route::post('products', 'store');
    Route::put('products/{id}', 'update');  
    Route::delete('products/{id}', 'destroy');
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
