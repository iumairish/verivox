<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/compare', function (Request $request) {
    return response()->json(['message' => 'working'], 200);
})->middleware('auth:sanctum');
