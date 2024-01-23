<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\SqlController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'title'=> 'Главная'
    ]);
})->name('home');

Route::prefix('/attachment')->group(function () {
    Route::post('/add', [AttachmentController::class, 'add'])->name('add-attachment');
});

Route::prefix('/logs')->group(function () {
    Route::get('/', [LogController::class, 'get'])->name('get-logs');
});

Route::prefix('/dumps')->group(function () {
    Route::get('/', [SqlController::class, 'get'])->name('get-dumps');
});
