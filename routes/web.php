<?php

use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RentalController as AdminRentalController;
use App\Http\Controllers\Frontend\CarController as FrontendCarController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\RentalController as FrontendRentalController;
use Illuminate\Support\Facades\Route;

Route::name('frontend.')->group(function () {
    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');

    Route::get('/cars', [FrontendCarController::class, 'index'])->name('cars.index');
    Route::get('/cars/{car}', [FrontendCarController::class, 'show'])->name('cars.show');

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/rentals', [FrontendRentalController::class, 'index'])->name('rentals.index');
        Route::get('/cars/{car}/rent', [FrontendRentalController::class, 'create'])->name('rentals.create');
        Route::post('/cars/{car}/rent', [FrontendRentalController::class, 'store'])->name('rentals.store');
        Route::patch('/rentals/{rental}/cancel', [FrontendRentalController::class, 'cancel'])->name('rentals.cancel');
    });
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('cars', AdminCarController::class)->except(['show']);
    Route::get('cars/{car}', [AdminCarController::class, 'show'])->name('cars.show');

    Route::resource('rentals', AdminRentalController::class);
    Route::put('rentals/{rental}/status', [AdminRentalController::class, 'updateStatus'])
        ->name('rentals.update-status');

    Route::resource('customers', AdminCustomerController::class)->except(['show']);
    Route::get('customers/{customer}', [AdminCustomerController::class, 'show'])->name('customers.show');
});

require __DIR__.'/auth.php';
