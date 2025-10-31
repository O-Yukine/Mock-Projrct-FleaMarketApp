<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;


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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'destroy']);


Route::get('/mypage/profile', [ProfileController::class, 'showProfile']);
Route::post('/mypage/profile', [ProfileController::class, 'updateProfile']);

Route::get('/', [ItemController::class, 'index']);
Route::get('/item', [ItemController::class, 'showDetail']);

Route::get('/purchase', [ItemController::class, 'showOrder']);
Route::post('/purchase', [ItemController::class, 'completeOrder']);

Route::get('/purchase/address', [ItemController::class, 'showShippingAddress']);
