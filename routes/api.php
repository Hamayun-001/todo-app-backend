<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('home', [ContactController::class, 'index'])->name('index');
// Route::post('/addcontact', [ContactController::class, 'add']);
// Route::get('/delete/{id}', [ContactController::class, 'delete']);
// Route::get('/status/{id}', [ContactController::class, 'status']);
// Route::get('/edit/{id}', [ContactController::class, 'edit']);
// Route::post('/edit/{id}', [ContactController::class, 'update']); 
