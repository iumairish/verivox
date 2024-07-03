<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarrifController;


Route::middleware([])
    ->prefix('tarrif')
    ->group(function () {
        Route::post('/compare', [TarrifController::class, 'compareCost']);
    });
