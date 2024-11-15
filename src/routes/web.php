<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\OriginalEmailVerificationPromptController;
use App\Http\Controllers\OriginalLoginController;
use App\Http\Controllers\OriginalRegisterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\RepresentativeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShopController;
use App\Http\Requests\AdminLoginRequest;
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
Route::get('/qrcode/{reservation_id}', [QrCodeController::class, 'visit']);

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

Route::middleware('auth:web', 'verified')->group(function () {
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
    Route::get('/qrcode', [QrCodeController::class, 'qrView']);
    Route::delete('/logout', [OriginalLoginController::class, 'destroy'])->name('login.destroy');
});

Route::get('/admin/login', [AdminLoginController::class, 'view'])->name('admin.login');;
Route::post('/admin/login', [AdminLoginController::class, 'store'])->name('admin.login.store');

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin', [AdminLoginController::class, 'index'])->name('admin');
    Route::get('/admin/representative', [AdminLoginController::class, 'create']);
    Route::post('/admin/representative', [RepresentativeController::class, 'create']);
    Route::delete('/admin/logout', [AdminLoginController::class, 'destroy'])->name('admin.login.destroy');
    Route::get('/admin/email', [EmailController::class, 'emailView']);
    Route::post('/admin/email', [EmailController::class, 'emailSend']);
});

Route::get('/representative/login', [RepresentativeController::class, 'view'])->name('representative.login');;
Route::post('/representative/login', [RepresentativeController::class, 'store'])->name('representative.login.store');

Route::middleware('auth:representative')->group(function () {
    Route::get('/representative', [RepresentativeController::class, 'index'])->name('representative');
    Route::delete('/representative/logout', [RepresentativeController::class, 'destroy'])->name('representative.login.destroy');
    Route::get('/representative/create', [RepresentativeController::class, 'createView']);
    Route::get('representative/edit', [RepresentativeController::class, 'editList']);
    Route::post('/representative/create/create', [ShopController::class, 'create']);
    Route::get('/representative/edit/{shop_id}', [RepresentativeController::class, 'edit'])->name('representative.edit');
    Route::post('/representative/edit/update', [ShopController::class, 'update']);
    Route::get('/representative/reservation', [RepresentativeController::class, 'reservationList']);
    Route::get('/representative/reservation/{shop_id}', [RepresentativeController::class, 'reservationView'])->name('representative.reservationView');
});
