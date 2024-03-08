<?php

use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/operario', [OperatorController::class, 'index'])->name('operators.index');
    Route::get('/operario/create', [OperatorController::class, 'create'])->name('operators.create');
    Route::post('/operario', [OperatorController::class, 'store'])->name('operators.store');
    Route::get('/operario/{operator}/edit', [OperatorController::class, 'edit'])->name('operators.edit');
    Route::put('/operario/{operator}/update', [OperatorController::class, 'update'])->name('operators.update');
    Route::delete('/{operator}', [OperatorController::class, 'destroy'])->name('operators.destroy');
});

require __DIR__.'/auth.php';
