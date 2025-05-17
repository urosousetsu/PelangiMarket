<?php
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

Route::get('/keranjang', function () {
    return view('keranjang');
})->middleware('auth'); 

Route::get('/suku-cadang', function () {
    return view('sparepart');
})->middleware('auth'); 

Route::get('/aksesoris', function () {
    return view('accessories');
})->middleware('auth'); 