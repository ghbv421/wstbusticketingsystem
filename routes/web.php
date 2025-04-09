<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BusController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';            //method          //nameoftheroute

Route::get('admin/bus', [BusController::class, 'index'])->name('admin.bus.admin-bus');
Route::get('admin/bus/register', [BusController::class, 'register'])->name('admin.bus.register'); 
Route::post('admin/bus', [BusController::class, 'store'])->name('admin.bus.store'); 