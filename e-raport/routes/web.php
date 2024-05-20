<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GuruController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/siswa', function () {
    return view('pages.siswa');
})->middleware(['auth'])->name('siswa');
Route::get('/mapel', function () {
    return view('pages.mapel');
})->middleware(['auth'])->name('mapel');
Route::get('/nilai', function () {
    return view('pages.nilai');
})->middleware(['auth'])->name('nilai');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::post('/guru-store', [GuruController::class, 'store'])->name('guru.store');
    Route::delete('/guru-delete/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');
});

require __DIR__ . '/auth.php';
