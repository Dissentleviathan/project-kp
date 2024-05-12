<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GuruController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/siswa', function () {
    return view('pages.siswa');
})->middleware(['auth', 'verified'])->name('siswa');
Route::get('/mapel', function () {
    return view('pages.mapel');
})->middleware(['auth', 'verified'])->name('mapel');
Route::get('/nilai', function () {
    return view('pages.nilai');
})->middleware(['auth', 'verified'])->name('nilai');

Route::middleware('auth', 'verified')->group(function () {
 Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
