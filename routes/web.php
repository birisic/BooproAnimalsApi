<?php

use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;

//Route::post('/', [LinkController::class, "store"]);
Route::get('/links', [LinkController::class, "index"]);
Route::get('/links/create', [LinkController::class, "create"]);
Route::post('/links', [LinkController::class, "store"]);

