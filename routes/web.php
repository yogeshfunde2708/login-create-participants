<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordController;

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'users'], function () {
    Route::get('users/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('users/users/list', [UserController::class, 'list']);
    Route::get('users/users/add', [UserController::class, 'add']);
    Route::post('users/users/add', [UserController::class, 'insert']);
    Route::get('users/users/edit/{id}', [UserController::class, 'edit']);
    Route::post('users/users/edit/{id}', [UserController::class, 'update']);
    Route::get('users/users/delete/{id}', [UserController::class, 'delete']);

    Route::get('users/change_password', [PasswordController::class, 'change_password']);
    Route::post('users/change_password', [PasswordController::class, 'update_change_password']);
});
