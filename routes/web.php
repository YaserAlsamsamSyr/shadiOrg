<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/dashboard', function () {
    return '';
})->middleware(['auth', 'verified'])->name('dashboard');
//
Route::get('/profile', [ProfileController::class,'edit'])->name('profile.edit')->middleware('auth');
Route::patch('/profile/update', [ProfileController::class,'update'])->name('profile.update')->middleware('auth');
Route::put('/profile/update/password', [PasswordController::class,'update'])->name('password.update')->middleware('auth');
Route::delete('/profile/destroy', [ProfileController::class,'destroy'])->name('profile.destroy')->middleware('auth');
//
require __DIR__.'/auth.php';
