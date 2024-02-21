<?php

use App\Http\Controllers\NewsPageController;
use Illuminate\Support\Facades\Route;


Route::get('/', [NewsPageController::class, 'index'])->name('home');
