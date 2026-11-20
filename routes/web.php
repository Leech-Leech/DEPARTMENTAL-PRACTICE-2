<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ReportsController;


Route::middleware(['auth'])->group(function () {

    // Equipment CRUD routes
    Route::resource('equipment', EquipmentController::class);

    // Equipment report routes
    Route::get('/reports', [ReportsController::class, 'index'])
        ->name('reports.index');

    // PDF export route
    Route::get('/reports/pdf', [ReportsController::class, 'pdf'])
        ->name('reports.pdf');

});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
