<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SidebarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;

// SIDEBAR
Route::get('/', [SidebarController::class, 'index'])->name('sidebar');

// SURAT MASUK
Route::get('/suratmasuk', [SuratMasukController::class, 'index'])->name('surat_masuk.index');
Route::get('/suratmasuk/create', [SuratMasukController::class, 'create'])->name('surat_masuk.create');
Route::post('/suratmasuk', [SuratMasukController::class, 'store'])->name('surat_masuk.store');
Route::get('/suratmasuk/{id}/edit', [SuratMasukController::class, 'edit'])->name('surat_masuk.edit');
Route::put('/suratmasuk/{id}', [SuratMasukController::class, 'update'])->name('surat_masuk.update');
Route::delete('/suratmasuk/{id}', [SuratMasukController::class, 'destroy'])->name('surat_masuk.destroy');

//SURAT KELUAR
Route::get('/suratkeluar', [SuratKeluarController::class, 'index'])->name('surat_keluar.index');
Route::get('/suratkeluar/create', [SuratKeluarController::class, 'create'])->name('surat_keluar.create');
Route::post('/suratkeluar', [SuratKeluarController::class, 'store'])->name('surat_keluar.store');
Route::get('/suratkeluar/{id}/edit', [SuratKeluarController::class, 'edit'])->name('surat_keluar.edit');
Route::put('/suratkeluar/{id}', [SuratKeluarController::class, 'update'])->name('surat_keluar.update');
Route::delete('/suratkeluar/{id}', [SuratKeluarController::class, 'destroy'])->name('surat_keluar.destroy');