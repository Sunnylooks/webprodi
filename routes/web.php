<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProgramController as AdminProgramController;
use App\Http\Controllers\Admin\ProgramPageController as AdminProgramPageController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

// Root ke portal
Route::get('/', [PortalController::class, 'portal'])->middleware('auth');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Portal per prodi
Route::get('/p/{programSlug}', [PortalController::class, 'program']);
Route::get('/p/{programSlug}/{pageSlug}', [PortalController::class, 'subpage']);

// Admin (hanya superadmin untuk users management)
Route::middleware('role:superadmin')->group(function () {
    Route::get('/admin/users', [AdminUserController::class, 'index']);
    Route::get('/admin/users/create', [AdminUserController::class, 'create']);
    Route::post('/admin/users', [AdminUserController::class, 'store']);
    Route::get('/admin/users/{id}/edit', [AdminUserController::class, 'edit']);
    Route::put('/admin/users/{id}', [AdminUserController::class, 'update']);
    Route::delete('/admin/users/{id}', [AdminUserController::class, 'destroy']);
});

// Admin (hanya kaprodi/superadmin)
Route::middleware('role:kaprodi,program')->group(function () {
    Route::get('/admin', function () { return view('admin.index'); });
    Route::get('/admin/programs', [AdminProgramController::class, 'index']);
    Route::get('/admin/programs/create', [AdminProgramController::class, 'create']);
    Route::post('/admin/programs', [AdminProgramController::class, 'store']);
    Route::get('/admin/programs/{id}/edit', [AdminProgramController::class, 'edit']);
    Route::put('/admin/programs/{id}', [AdminProgramController::class, 'update']);
    Route::delete('/admin/programs/{id}', [AdminProgramController::class, 'destroy']);

    Route::get('/admin/pages', [AdminProgramPageController::class, 'index']);
    Route::get('/admin/pages/create', [AdminProgramPageController::class, 'create']);
    Route::post('/admin/pages', [AdminProgramPageController::class, 'store']);
    Route::get('/admin/pages/{id}/edit', [AdminProgramPageController::class, 'edit']);
    Route::put('/admin/pages/{id}', [AdminProgramPageController::class, 'update']);
    Route::delete('/admin/pages/{id}', [AdminProgramPageController::class, 'destroy']);
});
