<?php

use App\Http\Middleware\Admin;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\RuanganController;
use App\Http\Controllers\Backend\JadwalController;
use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\BookingUserController;

Route::get('/', [FrontendController::class, 'index']);

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/booking/create', [BookingUserController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingUserController::class, 'store'])->name('booking.store');
});
Route::patch('/backend/booking/{id}/status', [BookingController::class, 'updateStatus'])->name('backend.booking.updateStatus');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Admin dan Backend
Route::group(['prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth', Admin::class]], function() {
    Route::get('/', [BackendController::class, 'index'])->name('index');
    Route::resource('user', UserController::class);
    Route::resource('ruang', RuanganController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('booking', BookingController::class);

});
