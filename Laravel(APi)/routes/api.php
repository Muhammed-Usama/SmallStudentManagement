<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\ApiTeacherController;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SendMailController;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Http\Controllers\TransientTokenController;
use Laravel\Passport\Http\Controllers\PersonalAccessTokenController;
// Public route for login
Route::post('/login', [AuthApiController::class, 'login']);
Route::prefix('/sendmail')->group(function () {
    Route::post('/test', [SendMailController::class, "sendtext"]);
    Route::post('file', [SendMailController::class, 'sendfile']);


});
// Group routes that require 'api_student_auth' middleware
// Route::middleware(['api_student_auth'])->group(function () {
// Notification routes
Route::post('/sendnotification', [NotificationController::class, 'sendNotification']);
Route::post('/savedevicetoken', [NotificationController::class, 'saveDeviceToken']);
Route::get('/tokens', [NotificationController::class, 'alltokens']);

Route::get('/sendgrades', [SendMailController::class, 'sendgrades']);
// Student routes
Route::prefix('/student')->group(function () {
    Route::get('/show', [ApiController::class, 'show']);
    Route::get('/showid/{id}', [ApiController::class, 'showid']);
    Route::get('/delete/{id}', [ApiController::class, 'delete']);
    Route::post('/add', [ApiController::class, 'add']);
    Route::post('/update', [ApiController::class, 'update']);
});

// Teacher routes
Route::prefix('/teacher')->group(function () {
    Route::get('/show', [ApiTeacherController::class, 'show']);
    Route::get('/avg_grades', [ApiTeacherController::class, 'avg_grades']);
    Route::get('/showid/{id}', [ApiTeacherController::class, 'showid']);
    Route::get('/delete/{id}', [ApiTeacherController::class, 'delete']);
    Route::post('/add', [ApiTeacherController::class, 'add']);
    Route::post('/update', [ApiTeacherController::class, 'update']);
});
// });
