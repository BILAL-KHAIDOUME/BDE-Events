<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);

    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

});

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return redirect()->route('events.index');
    })->name('home');

    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::resource('events', EventController::class)->only(['index', 'show']);

    Route::post('/events/{event}/reserve', [ReservationController::class, 'store'])
        ->name('reservations.store');

    Route::get('/myTickets' , [TicketController::class , 'index'])->name('tickets.index');

});
