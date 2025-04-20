<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DepartementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Welcome Page
Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : redirect()->route('login');
});


// Profile Routes (Requires Authentication)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('departements', DepartementController::class);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Employee Routes
    Route::resource('employees', EmployeeController::class);

    // Category Routes
    Route::resource('categories', CategoryController::class);

    // Fournisseur Routes
    Route::resource('fournisseurs', FournisseurController::class);

    // Article Routes
    Route::resource('articles', ArticleController::class);
});

require __DIR__.'/auth.php';
