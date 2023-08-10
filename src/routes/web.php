<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;

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

  Route::post('/setting/type', [UserController::class, 'settingType'])->name('type.setting');
  Route::post('/setting/target', [UserController::class, 'settingTarget'])->name('target.setting');
  Route::post('/setting/way', [UserController::class, 'settingWay'])->name('way.setting');
  Route::get('/setting', [UserController::class, 'type'])->name('type');
  Route::post('/setting', [UserController::class, 'setting'])->name('setting');
  
  Route::get('/check', [UserController::class, 'check'])->name('check');
  Route::get('/check/result', [UserController::class, 'judge'])->name('judge');

  Route::get('favorite', [FavoriteController::class, 'show'])->name('favorite');
  Route::post('/favorite/on', [FavoriteController::class, 'on'])->name('favorite.on');
  Route::post('/favorite/off', [FavoriteController::class, 'off'])->name('favorite.off');

  Route::get('/record', [PostController::class, 'show'])->name('post.show');
  Route::get('/record/add', [PostController::class, 'add'])->name('post.add');
  Route::post('/record/add', [PostController::class, 'submit'])->name('post.submit');
  Route::get('/record/user', [PostController::class, 'review'])->name('post.review');
  Route::get('/record/search', [PostController::class, 'search'])->name('post.search');
  Route::get('/record/{id}', [PostController::class, 'detail'])->name('post.detail');
});
