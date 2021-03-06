<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\LecturesController::class, 'index'])->name('main');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/lecture/delete/{id}', [App\Http\Controllers\LecturesController::class, 'delete'])->name('delete');
Route::post('/lecture/store', [App\Http\Controllers\LecturesController::class, 'add'])->name('addLecture');
