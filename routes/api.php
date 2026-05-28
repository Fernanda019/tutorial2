<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudsController;

Route::get('/cruds', [CrudsController::class, 'index']);
Route::post('/cruds', [CrudsController::class, 'store']);
Route::put('/cruds/{id}', [CrudsController::class, 'update']);
Route::delete('/cruds/{id}', [CrudsController::class, 'destroy']);