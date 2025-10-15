<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CollectionController;
use Illuminate\Support\Facades\Route;

Route::get('/cards/search', [CardController::class, 'search']);
Route::post('/collection', [CollectionController::class, 'store']);
Route::get('/collection', [CollectionController::class, 'index']);
Route::delete('/collection/{id}', [CollectionController::class, 'destroy']);
