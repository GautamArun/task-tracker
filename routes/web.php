<?php

use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Employee\TaskController as EmployeeTaskController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // return view('dashboard');
    return auth()->user()->role === 'admin' ? redirect()->route('admin.users.index') : redirect()->route('employee.tasks.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// admin routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function() {
    Route::resource('users', UserController::class);
    Route::resource('tasks', TaskController::class);
});

// employee routes
Route::middleware(['auth', 'role:employee'])->prefix('employee')->name('employee.')->group(function() {
    Route::get('/tasks', [EmployeeTaskController::class, 'index'])->name('tasks.index');

Route::patch('/tasks/{task}/status', [EmployeeTaskController::class, 'updateStatus'])->name('tasks.update-status');
});

require __DIR__.'/auth.php';
