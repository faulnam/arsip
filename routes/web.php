<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| 🌐 Web Routes
|--------------------------------------------------------------------------
| Semua route web aplikasi Rumah BUMN Sidoarjo diatur di sini.
| Struktur sudah dipisah untuk publik, admin, dan user login.
|--------------------------------------------------------------------------
*/

// =============================
// 🏠 Landing Page (Publik)
// =============================
Route::get('/', [ArchiveController::class, 'index'])->name('landing');

// =============================
// 📜 Halaman Publik - Detail Event & Arsip
// =============================
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/archives/{archive}', [ArchiveController::class, 'show'])->name('archives.show');

// =============================
// 🔐 Authentication (Login / Logout)
// =============================
require __DIR__ . '/auth.php';

// Halaman login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

// Proses login
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

// Logout user
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// =============================
// 🧭 Admin Dashboard & CRUD Data
// =============================
Route::middleware(['auth', 'admin'])->group(function () {

    // 🏠 Dashboard utama
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // 📂 Manajemen Kategori
    Route::resource('admin/categories', CategoryController::class)->names([
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'show' => 'admin.categories.show',
        'edit' => 'admin.categories.edit',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',
    ]);

    // 📅 Manajemen Event
    Route::resource('admin/events', EventController::class)->names([
        'index' => 'admin.events.index',
        'create' => 'admin.events.create',
        'store' => 'admin.events.store',
        'show' => 'admin.events.show',
        'edit' => 'admin.events.edit',
        'update' => 'admin.events.update',
        'destroy' => 'admin.events.destroy',
    ]);

    // 🗃️ CRUD Arsip Pelatihan (Admin)
    Route::prefix('admin/archives')->name('admin.archives.')->group(function () {
        Route::get('/', [ArchiveController::class, 'adminIndex'])->name('index');
        Route::get('/create', [ArchiveController::class, 'create'])->name('create');
        Route::post('/', [ArchiveController::class, 'store'])->name('store');
        Route::get('/{archive}', [ArchiveController::class, 'show'])->name('show');
        Route::get('/{archive}/edit', [ArchiveController::class, 'edit'])->name('edit');
        Route::put('/{archive}', [ArchiveController::class, 'update'])->name('update');
        Route::delete('/{archive}', [ArchiveController::class, 'destroy'])->name('destroy');
    });
});

// =============================
// 👤 Profil Pengguna
// =============================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
