<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SalesController;
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
    
    Route::get('/dashboard/sales', [SalesController::class, 'index'])
        ->name('dashboard.sales');
    Route::post('/dashboard/sales/', [SalesController::class, 'store'])
        ->name('dashboard.sales.create');
    
    Route::get('/dashboard/purchases', function () {
        return view('dashboard.pembelian.index');
    })->name('dashboard.purchase');
    
    Route::get('/dashboard/produksi', function () {
        return view('dashboard.produksi.index');
    })->name('dashboard.produksi');
    
    route::get('/dashboard/warehouse', function () {
        return view('dashboard.gudang.index');
    })->name('dashboard.warehouse');
    
    Route::get('/dashboard/qc', function () {
        return view('dashboard.qc.index');
    })->name('dashboard.qc');
    
    Route::get('/dashboard/shipments', function () {
        return view('dashboard.pengiriman.index');
    })->name('dashboard.shipment');
    
    
    Route::get('/dashboard/finaces', function () {
        return view('dashboard.keuangan.index');
    })->name('dashboard.finance');
    
    
    Route::get('/dashboard/hr', function () {
        return view('dashboard.hr.index');
    })->name('dashboard.hr');
});
