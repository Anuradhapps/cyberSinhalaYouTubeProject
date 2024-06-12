<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use App\Models\Todo;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'index'])->name('home');

Route::prefix('/todo')->group(function(){
    Route::get('/',[TodoController::class,'index'])->name('todo');
    Route::post('/store',[TodoController::class,'store'])->name('todo.store');
    Route::get('/{task_id}/delete',[TodoController::class,'delete'])->name('todo.delete');
    Route::get('/{task_id}/done',[TodoController::class,'done'])->name('todo.done');

});
