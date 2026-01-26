<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;

// Route utama
Route::get('/', function () {
    return view('index');
});

// Resource routes untuk pesanan (menggantikan route manual sebelumnya)
Route::resource('pesanan', PesananController::class);

// Jika masih butuh route khusus untuk form pesan (opsional)
Route::get('/pesan', [PesananController::class, 'create']);
Route::post('/pesan', [PesananController::class, 'store']);