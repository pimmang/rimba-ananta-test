<?php

use App\Http\Middleware\LoggingRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserApiController;
use App\Http\Middleware\ValidateRequest;

Route::middleware([LoggingRequest::class, ValidateRequest::class])->group(function () {
    Route::apiResource('users', UserApiController::class);
});
