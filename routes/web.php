<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProgramController as AdminProgramController;
use App\Http\Controllers\Admin\ProgramPageController as AdminProgramPageController;

// Root langsung ke prodi default
Route::get('/', [PortalController::class, 'redirectToDefault']);

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Portal per prodi
Route::get('/p/{programSlug}', [PortalController::class, 'program']);
Route::get('/p/{programSlug}/{pageSlug}', [PortalController::class, 'subpage']);

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
