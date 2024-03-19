<?php

use App\Http\Controllers\OperatorController;
use App\Http\Controllers\OperatorDataController;
use App\Http\Controllers\OperatorDataReportsExportController;
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
    Route::post('/operariodata', [OperatorDataController::class, 'store'])->name('operatordatas.store');
    Route::get('/operariodata/export', [OperatorDataReportsExportController::class, '__invoke'])->name('operatordatas.export');
    
    Route::get('/operario/{operator}/edit', [OperatorController::class, 'edit'])->name('operators.edit');
    Route::put('/operario/{operator}/update', [OperatorController::class, 'update'])->name('operators.update');
    Route::delete('/{operator}', [OperatorController::class, 'destroy'])->name('operators.destroy');
    
    
    Route::get('/operariodata/{operator?}', [OperatorDataController::class, 'index'])->name('operatordatas.index');
    Route::get('/operariodata/create/{operator?}', [OperatorDataController::class, 'create'])->name('operatordatas.create');
    Route::get('/operariodata/{operatorData}/edit', [OperatorDataController::class, 'edit'])->name('operatordatas.edit');
    Route::put('/operariodata/{operatorData}/update', [OperatorDataController::class, 'update'])->name('operatordatas.update');
    Route::delete('/operariodata/{operatorData}', [OperatorDataController::class, 'destroy'])->name('operatordatas.destroy');

   
});

require __DIR__.'/auth.php';