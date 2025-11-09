<?php

use App\Http\Controllers\AdminController;
// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminPageGuard;
use App\Http\Middleware\RequireLogIn;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'register']);
Route::get('/pricing', [PackageController::class, 'index']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);

Route::middleware(RequireLogIn::class)->group(function () {
    Route::get('/services/{service}/packages', [RequestController::class, 'getPackages']);
    Route::post('/request', [RequestController::class, 'createRequest'])->name('request.store');
    Route::get('/request', [RequestController::class, 'request']);
});


Route::middleware(AdminPageGuard::class)->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin-request', [AdminController::class, 'manageRequests']);
    Route::get('/admin-request/{id}', [AdminController::class, 'viewRequestDetail'])->name('request-detail');
    Route::get('/admin-request/{id}/edit', [AdminController::class, 'editRequest'])->name('admin.request.edit');
    Route::put('/admin-request/{id}', [AdminController::class, 'updateRequest'])->name('admin.request.update');
    Route::get('/admin-project', [AdminController::class, 'manageProjects']);
    Route::get('/admin-project/create', [AdminController::class, 'createProject'])->name('admin.project.create');
    Route::post('/admin-project', [AdminController::class, 'storeProject'])->name('admin.project.store');
    Route::get('/admin-project/{id}/edit', [AdminController::class, 'editProject'])->name('admin.project.edit');
    Route::put('/admin-project/{id}', [AdminController::class, 'updateProject'])->name('admin.project.update');
    Route::delete('/admin-project/{id}/delete-image', [AdminController::class, 'deleteProjectImage'])->name('admin.project.delete-image');
    Route::delete('/admin-project/{id}', [AdminController::class, 'destroyProject'])->name('admin.project.destroy');
    Route::get('/admin-pricing', [AdminController::class, 'managePricing']);
    Route::get('/admin-pricing/create', [AdminController::class, 'createPackage'])->name('admin.package.create');
    Route::post('/admin-pricing', [AdminController::class, 'storePackage'])->name('admin.package.store');
    Route::get('/admin-pricing/{id}/edit', [AdminController::class, 'editPackage'])->name('admin.package.edit');
    Route::put('/admin-pricing/{id}', [AdminController::class, 'updatePackage'])->name('admin.package.update');
    Route::delete('/admin-pricing/{id}', [AdminController::class, 'destroyPackage'])->name('admin.package.destroy');
});
require __DIR__ . '/auth.php';
