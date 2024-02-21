<?php

use App\Http\Controllers\Api\NewsController;
use Illuminate\Support\Facades\Route;

Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('destroy');
Route::patch('/news/{id}', [NewsController::class, 'update'])->name('update');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('show');
Route::get('/news', [NewsController::class, 'index'])->name('index');
Route::post('/news', [NewsController::class, 'store'])->name('store');

Route::get('/', function () {
    return response()->json([
        'success' => true
    ]);
});