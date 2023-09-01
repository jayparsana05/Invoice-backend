<?php

use App\Http\Controllers\ClientCntroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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

Route::get('/', [LoginController::class, 'index'])->middleware('LoggedIn');
 
Route::post('/check', [LoginController::class, 'check'])->name('check');

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard',[LoginController::class,'dashboard'])->middleware('isLoggedIn');

Route::get('/login', [LoginController::class, 'index'])->middleware('LoggedIn');

Route::get('/create_user', [UserController::class, 'create']);

Route::post('/store', [UserController::class, 'store'])->name('store_user');

Route::get('/users', [UserController::class, 'show']);

Route::get('/edit/{id}', [UserController::class, 'edit']);

Route::post('/update/{id}', [UserController::class, 'update'])->name('update');

Route::get('/create_client', [ClientCntroller::class, 'create']);

Route::post('/store_client', [ClientCntroller::class, 'store'])->name('store_client');

Route::get('/clients', [ClientCntroller::class, 'show']);

Route::get('/edit_client/{id}', [ClientCntroller::class, 'edit']);

Route::post('/update_client/{id}', [ClientCntroller::class, 'update'])->name('update_client');