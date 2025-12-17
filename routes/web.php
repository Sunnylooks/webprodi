<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProgramController as AdminProgramController;
use App\Http\Controllers\Admin\ProgramPageController as AdminProgramPageController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

// Root ke portal
Route::get('/', [PortalController::class, 'portal'])->middleware('auth');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Portal per prodi (semua role termasuk universitas bisa akses)
Route::middleware('auth')->group(function () {
    Route::get('/p/{programSlug}', [PortalController::class, 'program']);
    Route::get('/p/{programSlug}/{pageSlug}', [PortalController::class, 'subpage']);
});

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
    Route::get('/admin/programs', [AdminProgramController::class, 'index'])->name('admin.programs.index');
    Route::get('/admin/programs/create', [AdminProgramController::class, 'create']);
    
    // Edit home page (for kaprodi and superadmin) - MUST be before {id} routes
    Route::get('/admin/programs/edit-home', [AdminProgramController::class, 'editHomePage'])->name('admin.programs.edit-home');
    Route::put('/admin/programs/update-home', [AdminProgramController::class, 'updateHomePage'])->name('admin.programs.update-home');
    
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
    
    // TinyMCE upload routes
    Route::post('/admin/pages/upload-image', [AdminProgramPageController::class, 'uploadImage'])->name('admin.pages.upload-image');
    Route::post('/admin/pages/upload-media', [AdminProgramPageController::class, 'uploadMedia'])->name('admin.pages.upload-media');

    Route::get('/admin/categories', [AdminCategoryController::class, 'index']);
    Route::get('/admin/categories/create', [AdminCategoryController::class, 'create']);
    Route::post('/admin/categories', [AdminCategoryController::class, 'store']);
    Route::get('/admin/categories/{id}/edit', [AdminCategoryController::class, 'edit']);
    Route::put('/admin/categories/{id}', [AdminCategoryController::class, 'update']);
    Route::delete('/admin/categories/{id}', [AdminCategoryController::class, 'destroy']);
});
