<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function() {
    Route::get('/admin', [AdminController::class, 'viewDashboard']);
    Route::get('/member', [MemberController::class, 'viewDashboard']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::prefix('/admin')->group(function() {
        Route::get('/buku', [BukuController::class, 'readAll']);
        Route::get('/buku/create', [BukuController::class, 'viewCreate']);
        Route::post('/buku/create', [BukuController::class, 'create']);
        Route::get('/buku/{id}', [BukuController::class, 'read']);
        Route::get('/buku/{id}/edit', [BukuController::class, 'viewUpdate']);
        Route::post('/buku/{id}/edit', [BukuController::class, 'update']);
        Route::post('/buku/{id}/delete', [BukuController::class, 'delete']);
    });
});

Route::middleware('guest')->group(function() {
    Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'viewRegister']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/forget-password', [AuthController::class, 'viewForgetPassword']);
    Route::post('/forget-password', [AuthController::class, 'forgetPassword']);
    Route::get('/reset-password/{token}', [AuthController::class, 'viewResetPassword'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword']);
});
