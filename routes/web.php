<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
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
});

Route::middleware('guest')->group(function() {
    Route::get('/login', [AuthController::class, 'viewLogin']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'viewRegister']);
    Route::post('/register', [AuthController::class, 'register']);
});
