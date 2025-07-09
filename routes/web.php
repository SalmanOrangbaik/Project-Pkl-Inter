<?php

use App\Http\Middleware\Admin;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\RuanganController;
use App\Http\Controllers\Backend\JadwalController;

Route::get('/', [FrontendController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Admin dan Backend
Route::group(['prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth', Admin::class]], function() {
    Route::get('/', [BackendController::class, 'index'])->name('index');
    Route::resource('user', UserController::class);
    Route::resource('ruang', RuanganController::class);
    Route::resource('jadwal', JadwalController::class);

});
