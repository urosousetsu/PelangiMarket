<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('homepage');
})->middleware('auth'); // Hanya bisa diakses jika sudah login

Route::get('/login', function () {
    return view('authentication.login');
})->name('login')->middleware('guest'); // Tampilkan login jika belum login

Route::get('/register', function () {
    return view('authentication.register');
})->name('register')->middleware('guest'); // Tampilkan register jika belum login

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout')->middleware('auth');

Route::get('/jenis-motor/beat', function () {
    return view('beat');
});
Route::get('/jenis-motor/vario', function () {
    return view('vario');
});
Route::get('/reset-password', [App\Http\Controllers\AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [App\Http\Controllers\AuthController::class, 'resetPassword'])->name('password.update');

Route::get('/keranjang', [OrderController::class, 'cartIndex'])->middleware('auth')->name('keranjang');

Route::get('/suku-cadang', [ProductController::class, 'fetchSukuCadang'])->middleware('auth')->name('suku-cadang');

Route::post('/store-cart/{product}', [CartController::class, 'store'])->middleware('auth')->name('store-cart');

Route::post('/update-cart/{product}', [CartController::class, 'update'])->middleware('auth')->name('update-cart');

Route::get('/aksesoris', [ProductController::class, 'fetchAksesoris'])->middleware('auth')->name('aksesoris');

Route::post('/store-order', [OrderController::class, 'store'])->middleware('auth')->name('store-order');

Route::post('/update-status', [OrderController::class, 'update'])->middleware('auth')->name('update-status');

Route::get('/sparepart/search', [ProductController::class, 'searchSparepart'])->middleware('auth')->name('sparepart-search');

Route::get('/aksesoris/search', [ProductController::class, 'searchAksesoris'])->middleware('auth')->name('aksesoris-search');