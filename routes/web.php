<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

// Route::get('/dashboard', function () {
//     return '';
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/',[AppController::class,'index'])->name('index');

Route::get('/profile', [ProfileController::class,'edit'])->middleware('auth')->name('profile.edit');
Route::get('/getMyForms', [FormController::class,'getMyForms'])->middleware('auth')->name('getMyForms');

Route::patch('/profile/update', [ProfileController::class,'update'])->middleware('auth')->name('profile.update');

Route::put('/profile/update/password', [PasswordController::class,'update'])->middleware('auth')->name('password.update');

Route::delete('/profile/destroy', [ProfileController::class,'destroy'])->middleware('auth')->name('profile.destroy');

Route::post('/form/create', [FormController::class,'create'])->middleware('auth')->name('createForm');

//admin
Route::get('/formWait', [FormController::class,'formWait'])->middleware(['auth','check'])->name('form.wait');
Route::get('/formFalse', [FormController::class,'formFalse'])->middleware(['auth','check'])->name('form.false');
Route::get('/formTrue', [FormController::class,'formTrue'])->middleware(['auth','check'])->name('form.true');
Route::get('/getUsers', [AppController::class,'getUsers'])->middleware(['auth','check'])->name('users');

Route::post('/formUpdate', [FormController::class,'formUpdate'])->middleware(['auth','check'])->name('form.update');
Route::post('/user/UpdatePassword', [AppController::class,'userUpdatePassword'])->middleware(['auth','check'])->name('user.updatePassword');
//
require __DIR__.'/auth.php';
