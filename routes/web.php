<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RevenueController;

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
//admin index
Route::get('/admin', [AdminController::class, 'index'])->name('admin');




//BUS

Route::get('admin/bus', [BusController::class, 'index'])->name('admin.bus.index');
Route::get('admin/bus/register', [BusController::class, 'register'])->name('admin.bus.register'); 
Route::post('admin/bus', [BusController::class, 'store'])->name('admin.bus.store'); 
Route::get('admin/bus/{id}', [BusController::class, 'show'])->name('admin.bus.show');
Route::delete('admin/bus/{id}', [BusController::class, 'destroy'])->name('admin.bus.destroy');

//Employee
Route::get('admin/employees', [EmployeesController::class, 'index'])->name('admin.employees.index');
Route::get('admin/employees/create', [EmployeesController::class, 'create'])->name('admin.employees.create');
Route::post('admin/employees', [EmployeesController::class, 'store'])->name('admin.employees.store');
Route::get('admin/employees/{id}', [EmployeesController::class, 'show'])->name('admin.employees.show');
Route::get('admin/employees/{id}/edit', [EmployeesController::class, 'edit'])->name('admin.employees.edit');
Route::put('admin/employees/{id}', [EmployeesController::class, 'update'])->name('admin.employees.update');
Route::delete('admin/employees/{id}', [EmployeesController::class, 'destroy'])->name('admin.employees.destroy');

// Revenue

Route::get('/admin/revenue', [RevenueController::class, 'index'])->name('revenue.index');
Route::get('/revenue/add', [RevenueController::class, 'create'])->name('revenue.create');
Route::post('/revenue/store', [RevenueController::class, 'store'])->name('revenue.store');

