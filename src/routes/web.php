<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PurchaseController;


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

Route::get('/', [ItemController::class, 'index']);
Route::get('/item/{item_id}', [ItemController::class, 'showDetail']);

Route::middleware('auth')->prefix('sell')->group(function () {
    Route::get('/', [ItemController::class, 'showSellForm']);
    Route::post('/', [ItemController::class, 'sellItem']);
});


Route::middleware('auth')->prefix('mypage')->group(function () {
    Route::get('/', [MypageController::class, 'showMypage']);
    Route::get('/profile', [MypageController::class, 'showProfile']);
    Route::post('/profile', [MypageController::class, 'updateProfile']);
});

Route::post('/item/{item_id}/comment', [CommentController::class, 'makeComment'])->middleware('auth');
Route::post('/item/{item_id}/like', [LikeController::class, 'likeItem'])->middleware('auth');

Route::middleware('auth')->prefix('purchase')->group(function () {
    Route::get('/{item_id}', [PurchaseController::class, 'showOrder']);
    Route::post('/{item_id}', [PurchaseController::class, 'completeOrder']);
    Route::get('/address/{item_id}', [PurchaseController::class, 'showShippingAddress']);
    Route::post('/address/{item_id}', [PurchaseController::class, 'updateShippingAddress']);
});
