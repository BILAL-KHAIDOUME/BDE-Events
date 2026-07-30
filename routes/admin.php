<?php

use App\Http\Controllers\Admin\EventController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('events', EventController::class)->only(['create', 'store']);;

    });