<?php

use Illuminate\Http\Request;
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

Route::get('/teachers', [CarController::class, 'index']);
Route::get('/cars/{car}', [CarController::class, 'show']);
Route::post('/cars', [CarController::class, 'store']);
Route::put('/cars/{car}', [CarController::class, 'update']);
Route::delete('/cars/{car}', [CarController::class, 'destroy']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/active-user', [AuthController::class, 'getActiveUser'])->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
