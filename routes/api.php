<?php

use App\Http\Controllers\AnimalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::get('/animals/top', [AnimalController::class, 'top']);

