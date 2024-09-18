<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\OriginalEmailVerificationPromptController;
use App\Http\Controllers\OriginalLoginController;
use App\Http\Controllers\OriginalRegisterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShopController;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/', [ShopController::class, 'index']);
Route::get('/search', [ShopController::class, 'search']);
Route::get('/nav', [NavigationController::class, 'nav']);
Route::get('/detail/{shop_id}', [ShopController::class, 'detail'])->name('shop.detail');

Route::get('/thanks', function () {
    //ここでメール認証せずにログインして認証必要ページにいった場合に下記で指定したビューが表示される
    return view('auth.thanks');
})->middleware('auth')->name('verification.notice');

// メール確認ボタンをクリックした時の処理
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth'])->name('verification.verify');

// メール再送ボタンroute
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware('auth', 'verified')->group(function () {
    Route::post('/favorite', [FavoriteController::class, 'create']);
    Route::post('/remove', [FavoriteController::class, 'delete']);
    Route::get('/mypage', [MyPageController::class, 'mypage']);
    Route::post('/done', [ReservationController::class, 'reservation']);
    Route::post('/cancel', [ReservationController::class, 'cancel']);
    Route::post('/mypage/remove', [FavoriteController::class, 'mypage']);
    Route::get('/change', [ReservationController::class, 'change']);
    Route::post('/change/reservation', [ReservationController::class, 'update']);
    Route::get('/review', [ReviewController::class, 'review']);
    Route::post('/review/post', [ReviewController::class, 'create']);
    Route::get('/payment', [PaymentController::class, 'payView']);
    Route::post('payment/store', [PaymentController::class, 'store'])->name('payment.store');
});
