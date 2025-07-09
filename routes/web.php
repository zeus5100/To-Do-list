<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskHistoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::get('/tasks/{task}/history', TaskHistoryController::class)->name('tasks.history');
});
