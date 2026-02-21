<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

route::get('/', [AuthController::class, 'index'])
    ->middleware('guest')
    ->name('login');
route::post('/', [AuthController::class, 'login'])->name('auth.login');
route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard.index');
    
    Route::get('/dashboard/penjualan', function () {
        return view('dashboard.penjualan.index');
    })->name('dashboard.penjualan');
    
    
    Route::get('/dashboard/produksi', function () {
        return view('dashboard.produksi.index');
    })->name('dashboard.produksi');
    
    route::get('/dashboard/gudang', function () {
        return view('dashboard.gudang.index');
    })->name('dashboard.gudang');
    
    Route::get('/dashboard/qc', function () {
        return view('dashboard.qc.index');
    })->name('dashboard.qc');
    
    Route::get('/dashboard/pengiriman', function () {
        return view('dashboard.pengiriman.index');
    })->name('dashboard.pengiriman');
    
    
    Route::get('/dashboard/keuangan', function () {
        return view('dashboard.keuangan.index');
    })->name('dashboard.keuangan');
    
    
    Route::get('/dashboard/hr', function () {
        return view('dashboard.hr.index');
    })->name('dashboard.hr');
});
