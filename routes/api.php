<?php

use App\Http\Controllers\Api\NewsController;
use Illuminate\Support\Facades\Route;


Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::post('/news', [NewsController::class, 'store'])->name('news.store');
Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.delete');

Route::get('/', function () {
    return response()->json([
        'success' => true
    ]);
});