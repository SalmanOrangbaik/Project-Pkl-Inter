<?php

use App\Http\Middleware\Admin;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Admin dan Backend
Route::group(['prefix' => 'admin', 'as' => 'backend', 'middleware' => ['auth', Admin::class]], function() {
    Route::get('/', [BackendController::class, 'index']);

});
