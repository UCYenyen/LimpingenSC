<?php

use App\Http\Controllers\AdminController;
// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminPageGuard;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/request', [ServiceController::class, 'request']);
Route::get('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'register']);
Route::get('/pricing', [PackageController::class, 'index']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::get('/services/{service}/packages', [ServiceController::class, 'getPackages']);

Route::middleware(AdminPageGuard::class)->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin-request', [AdminController::class, 'manageRequests']);
    Route::get('/admin-request/{id}/edit', [AdminController::class, 'editRequest'])->name('admin.request.edit');
    Route::put('/admin-request/{id}', [AdminController::class, 'updateRequest'])->name('admin.request.update');
    // Route::get('/admin-users', [AdminController::class, 'manageUsers']);
    Route::get('/admin-project', [AdminController::class, 'manageProjects']);
    Route::get('/admin-project/create', [AdminController::class, 'createProject'])->name('admin.project.create');
    Route::post('/admin-project', [AdminController::class, 'storeProject'])->name('admin.project.store');
    Route::get('/admin-project/{id}/edit', [AdminController::class, 'editProject'])->name('admin.project.edit');
    Route::put('/admin-project/{id}', [AdminController::class, 'updateProject'])->name('admin.project.update');
    Route::delete('/admin-project/{id}/delete-image', [AdminController::class, 'deleteProjectImage'])->name('admin.project.delete-image');
    Route::delete('/admin-project/{id}', [AdminController::class, 'destroyProject'])->name('admin.project.destroy');
    Route::get('/admin-pricing', [AdminController::class, 'managePricing']);
});
require __DIR__.'/auth.php';
