<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GradebookController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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

Route::get('/teachers', [TeacherController::class, 'index'])->middleware('auth');
Route::put('/teachers/{id}/edit', [TeacherController::class, 'update'])->middleware('auth');
Route::get('/teachers-get-all', [TeacherController::class, 'getAll'])->middleware('auth');

Route::get('/students', [StudentController::class, 'index'])->middleware('auth');

Route::get('/gradebooks', [GradebookController::class, 'index']);
Route::get('/gradebooks-get-all', [GradebookController::class, 'getAll'])->middleware('auth');
Route::get('/gradebooks/{id}', [GradebookController::class, 'show'])->middleware('auth');
Route::post('/gradebooks', [GradebookController::class, 'store'])->middleware('auth');


Route::delete('/gradebooks/{gradebook}', [GradebookController::class, 'destroy'])->middleware('auth');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/active-user', [AuthController::class, 'getActiveUser'])->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::post('/gradebooks/{id}/comments', [CommentController::class, 'store']);
Route::get('/gradebooks/{id}/comments', [CommentController::class, 'index']);
