<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ParkInfoController;
use App\Http\Controllers\FacilityReservationController;
use App\Http\Controllers\Admin\AdminFacilityReservationController;
use App\Http\Controllers\FacilityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('home');
});

/*
|--------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------
| Admin Routes (Harus login + role admin)
|--------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User Management
    Route::resource('users', \App\Http\Controllers\UserController::class)->except('show');

    // Articles CRUD
    Route::resource('articles', ArticleController::class);

    // Services CRUD
    Route::resource('services', ServiceController::class)->except('show');

    // Park Info CRUD
    Route::resource('parkinfo', ParkInfoController::class)->except('show');

    // Galleries CRUD (admin only, kecuali show)
    Route::resource('galleries', GalleryController::class)->except(['show']);

    // Facilities CRUD
    Route::resource('facilities', FacilityController::class);

    // Admin Facility Reservations
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('reservations', [AdminFacilityReservationController::class, 'index'])->name('reservations.index');
        Route::get('reservations/{reservation}', [AdminFacilityReservationController::class, 'show'])->name('reservations.show');
        Route::delete('reservations/{reservation}', [AdminFacilityReservationController::class, 'destroy'])->name('reservations.destroy');
    });
});

Route::middleware(['auth', 'staff'])->prefix('staff')->name('staff.')->group(function () {

    // Dashboard Staff
    Route::get('/dashboard', [DashboardController::class, 'staff'])->name('staffdashboard');

    // Fasilitas yang bisa dikelola staff
    Route::resource('parkinfos', ParkInfoController::class)->except('show');
    Route::resource('services', ServiceController::class)->except('show');
    Route::resource('articles', ArticleController::class);
    Route::resource('galleries', GalleryController::class)->except(['show']);

    Route::resource('reservations', AdminFacilityReservationController::class)->only(['index', 'show']);
});


/*
|--------------------------------------------------------
| Public Routes (Tidak perlu login)
|--------------------------------------------------------
*/

// Halaman Beranda Publik
Route::get('/', [PublicController::class, 'home'])->name('home');

// Artikel Publik
Route::get('/artikel', [PublicController::class, 'articles'])->name('visitor.articles.index');
Route::get('/artikel/{id}', [PublicController::class, 'articleDetail'])->name('visitor.articles.show');

// Layanan Publik
Route::get('/layanan', [PublicController::class, 'services'])->name('visitor.services.index');
Route::get('/layanan/{id}', [PublicController::class, 'serviceDetail'])->name('visitor.services.show');

// Galeri Publik
Route::get('/galeri', [PublicController::class, 'galleries'])->name('visitor.gallery');

// Informasi Taman Publik
Route::get('/informasi-taman', [PublicController::class, 'parkInfo'])->name('public.park-infos');
Route::get('/informasi-taman/{parkInfo}', [PublicController::class, 'parkInfoShow'])->name('public.park-infos.show');

// Fasilitas Publik & Pemesanan tanpa login
Route::get('/fasilitas', [PublicController::class, 'facilities'])->name('public.facilities');
Route::get('/fasilitas/{facility}/pesan', [FacilityReservationController::class, 'create'])->name('reservations.create');
Route::post('/fasilitas/{facility}/pesan', [FacilityReservationController::class, 'store'])->name('reservations.store');
Route::get('/reservations/{reservation}', [FacilityReservationController::class, 'show'])->name('reservations.show');
Route::get('/reservations/{reservation}/print', [FacilityReservationController::class, 'print'])->name('reservations.print');

Route::get('/hello', function () {
    return response()->json(['message' => 'Halo dari Laravel!']);
});



