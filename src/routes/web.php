<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'auth'], function () {
  Route::get('/', [PostController::class, 'index'])->name('home');
  Route::get('/setting', [UserController::class, 'type'])->name('type');
  Route::post('/setting', [UserController::class, 'setting'])->name('setting');
  Route::get('/check', [UserController::class, 'check'])->name('check');
  Route::get('/check/result', [UserController::class, 'judge'])->name('judge');
});
