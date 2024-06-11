<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use App\Models\Todo;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/todo',[TodoController::class,'index'])->name('todo');
