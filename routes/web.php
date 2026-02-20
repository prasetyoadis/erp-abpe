<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::get('/login', function () {
    return view('login.index');
})->name('login');

Route::get('/dashboard/index', function () {
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
