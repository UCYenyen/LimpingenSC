<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
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

Route::middleware(AdminPageGuard::class)->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin-request', [AdminController::class, 'manageRequests']);
    Route::get('/admin-users', [AdminController::class, 'manageUsers']);
    Route::get('/admin-project', [AdminController::class, 'manageProjects']);
    Route::get('/admin-project/create', [AdminController::class, 'createProject'])->name('admin.project.create');
    Route::post('/admin-project', [AdminController::class, 'storeProject'])->name('admin.project.store');
    Route::delete('/admin-project/{id}', [AdminController::class, 'destroyProject'])->name('admin.project.destroy');
    Route::get('/admin-pricing', [AdminController::class, 'managePricing']);
});

Route::get('/test-cloudinary', function () {
    try {
        $cloudName = config('cloudinary.cloud_name');
        $apiKey = config('cloudinary.api_key');
        $apiSecret = config('cloudinary.api_secret');
        
        return response()->json([
            'cloud_name' => $cloudName ? 'Set ✓' : 'Not set ✗',
            'api_key' => $apiKey ? 'Set ✓' : 'Not set ✗',
            'api_secret' => $apiSecret ? 'Set ✓' : 'Not set ✗',
            'cloud_name_value' => $cloudName,
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
    }
});
require __DIR__.'/auth.php';
