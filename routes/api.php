<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ReplySupportController;
use App\Http\Controllers\SupportController;
use Illuminate\Support\Facades\Route;

Route::post('/auth', [AuthController::class, 'auth']);

Route::post('/forgot-password', [ResetPasswordController::class, 'seedResetLink'])->middleware('guest');
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/courses', [CourseController::class, 'index']);
    Route::get('/courses/{id}', [CourseController::class, 'show']);

    Route::get('/courses/{id}/modules', [ModuleController::class, 'index']);

    Route::get('/modules/{id}/lessons', [LessonController::class, 'index']);
    Route::get('/lessons/{id}', [LessonController::class, 'show']);

    Route::post('/lessons/viewed', [LessonController::class, 'viewed']);

    Route::get('/my-supports', [SupportController::class, 'mySupports']);

    Route::get('/supports', [SupportController::class, 'index']);
    Route::post('/supports', [SupportController::class, 'create']);

    Route::post('/replies', [ReplySupportController::class, 'createReply']);
});
