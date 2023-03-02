<?php

use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\HallController;
use Illuminate\Support\Facades\Route;

//
Route::prefix('admin')->middleware('auth')->middleware('admin')->group(callback: function () {
    Route::get('/', [AdminIndexController::class, 'index'])->name('index');
    Route::post('/add_hall', [HallController::class, 'store'])->name('add_hall');
    Route::delete('/delete_hall', [HallController::class, 'destroy'])->name('delete_hall');
    Route::get('/edit_hall', [HallController::class, 'edit'])->name('edit_hall');
    Route::get('/close', [AdminIndexController::class, 'close'])->name('close_sell');
});

