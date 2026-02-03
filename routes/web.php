<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;

// Route utama
Route::get('/', function () {
    return view('index');
});

// Resource routes untuk pesanan (menggantikan route manual sebelumnya)
Route::resource('pesanan', PesananController::class);

// Dashboard terpisah untuk manajemen pesanan (hanya admin)
Route::get('/dashboard', [PesananController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware(\App\Http\Middleware\EnsureAdmin::class);

// Simple admin session-based login (development-friendly)
Route::get('/admin/login', function (\Illuminate\Http\Request $req) {
    // Jika sudah admin (session lama) atau user auth dengan flag is_admin -> langsung ke dashboard
    if ($req->session()->get('role') === 'admin' || (auth()->check() && (auth()->user()->is_admin ?? false))) {
        return redirect()->intended(route('dashboard'));
    }

    return view('admin.login');
})->name('admin.login');

Route::post('/admin/login', function (\Illuminate\Http\Request $req) {
    $req->validate(['password' => 'required']);

    $adminPass = env('ADMIN_PASSWORD', 'admin123');

    if (hash_equals($adminPass, $req->password)) {
        session(['role' => 'admin']);
        return redirect()->intended(route('dashboard'));
    }

    return redirect()->back()->with('error', 'Password salah.');
})->name('admin.login.post');

Route::post('/admin/logout', function () {
    session()->forget('role');
    return redirect('/')->with('success', 'Anda berhasil logout.');
})->name('admin.logout');

// Jika masih butuh route khusus untuk form pesan (opsional)
Route::get('/pesan', [PesananController::class, 'create']);
Route::post('/pesan', [PesananController::class, 'store']);