<?php

use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;

Route::get('/links/create', [LinkController::class, "create"]);
Route::post('/links', [LinkController::class, "store"]);

