<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\LinkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/', [LinkController::class, "store"]);
Route::get('/animals/top', [AnimalController::class, 'top']);

