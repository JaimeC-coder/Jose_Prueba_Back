<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
//Todo esta bien 
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/welcome', [AuthController::class, 'welcome']);

    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users/create', [UserController::class, 'store']);
    Route::put('/users/update/{id}', [UserController::class, 'update']);
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy']);

    Route::get('/product', [ProductController::class, 'index']);
    Route::post('/product/create', [ProductController::class, 'store']);
    Route::put('/product/update/{id}', [ProductController::class, 'update']);
    Route::delete('/product/delete/{id}', [ProductController::class, 'destroy']);
    //Aqui deberia de ser con el metodo path 
    Route::post('/product/stock/{id}', [ProductController::class, 'addStock']);
    Route::post('/product/remove/{id}', [ProductController::class, 'removeStock']);

});

