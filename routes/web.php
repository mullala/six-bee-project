<?php

use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppointmentController::class, 'create'])
    ->name('appointment');

Route::post('appointment', [AppointmentController::class, 'store'])
    ->name('appointment');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [AdminAppointmentController::class, 'index'])->name('dashboard');

    Route::get('/admin/appointment/{appointment}', [AdminAppointmentController::class, 'edit'])->name('admin.appointment');

    Route::patch('/admin/appointment/{appointment}', [AdminAppointmentController::class, 'update'])->name('admin.appointment.update');
});

require __DIR__ . '/auth.php';
