<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/request', [ServiceController::class, 'request']);

Route::get('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'register']);

Route::get('/pricing', [PackageController::class, 'index']);

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/admin-request', [AdminController::class, 'manageRequests']);

Route::get('/admin-project', [AdminController::class, 'manageProjects']);

Route::get('/admin-pricing', [AdminController::class, 'managePricing']);

Route::delete('/admin-project/{id}', [AdminController::class, 'destroyProject'])->name('admin.project.destroy');


require __DIR__.'/auth.php';
