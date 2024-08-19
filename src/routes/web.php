<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\OriginalLoginController;
use App\Http\Controllers\OriginalRegisterController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', [OriginalRegisterController::class, 'store']);
Route::post('/login', [OriginalLoginController::class, 'store']);
Route::get('/thanks', [OriginalRegisterController::class, 'thanks']);

Route::get('/', [ShopController::class, 'index']);
Route::get('/search', [ShopController::class, 'search']);
Route::get('/nav', [NavigationController::class, 'nav']);
Route::get('/detail/{shop_id}', [ShopController::class, 'detail']);


Route::middleware('auth')->group(function () {
    Route::post('/favorite', [FavoriteController::class, 'store']);
    Route::post('/remove', [FavoriteController::class, 'delete']);
    Route::get('/mypage', [MyPageController::class, 'mypage']);
});
