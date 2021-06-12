<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AdminController;


Route::group([
    'namespace' => 'api',
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('checktoken', [AuthController::class, 'checktoken']);
    Route::post('logout', [AuthController::class, 'logout']);

});