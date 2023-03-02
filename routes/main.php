<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Client\CinemaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use LaravelQRCode\Facades\QRCode;



Route::get('/user/create', [UserController::class, 'create'])->name('user.create');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [CinemaController::class, 'index'])->name('cinema');
Route::get('/hall/{id}', [CinemaController::class, 'hall'])->name('hall_client');
Route::get('/payment/{id}/{arrRow?}/{arrPlace?}/{arrTaken?}', [CinemaController::class, 'payment'])->name('payment');
Route::get('/ticket/{id}', [CinemaController::class, 'ticket'])->name('ticket');





