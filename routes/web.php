<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskHistoryController;
use App\Http\Controllers\TaskShareController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::get('/tasks/{task}/history', TaskHistoryController::class)->name('tasks.history');
    Route::post('/tasks/{task}/share', [TaskShareController::class, 'store'])->name('tasks.share');
});


Route::get('/shared/{token}', [TaskShareController::class, 'show'])->name('tasks.share.show');
