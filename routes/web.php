<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiBusController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/bus/search', [HomeController::class, 'search'])->name('home.search');
Route::get('/bus/{bus}', [HomeController::class, 'show'])->name('home.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
    Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');
    Route::put('/changePassword', [AccountController::class, 'changePassword'])->name('account.changePassword');

    Route::get('/my-reservations', [ReservationController::class, 'index'])->name('reservation.index');
    Route::post('/bus/applyReservation/{bus}', [ReservationController::class, 'create'])->name('reservation.create');
    Route::get('/my-reservations/{id}/destroy', [ReservationController::class, 'destroy'])->name('reservation.destroy');
    Route::get('/my-reservations-api', [ReservationController::class, 'myReservationsApi'])->name('reservation.myReservationsApi');
});

Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('buses', [AdminController::class, 'buses'])->name('admin.buses');
    Route::get('customers', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('reservations', [CustomerController::class, 'reservations'])->name('customer.reservations');

    // admin api routes
    Route::get('/get-all-buses', [ApiBusController::class, 'getAllBuses'])->name('bus.all');
    Route::get('/get-all-customers', [CustomerController::class, 'all'])->name('customer.all');
    Route::get('/get-all-reservations', [CustomerController::class, 'reservationsApi'])->name('customer.reservationsApi');

    Route::get('/bus/create', [BusController::class, 'create'])->name('bus.create');
    Route::post('/bus', [BusController::class, 'store'])->name('bus.store');
    Route::get('/bus/{id}/edit', [BusController::class, 'edit'])->name('bus.edit');
    Route::put('/bus/{id}', [BusController::class, 'update'])->name('bus.update');
    Route::delete('/bus,{id}', [BusController::class, 'destroy'])->name('bus.destroy');
});
