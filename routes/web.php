<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DispatcherController;
use App\Http\Controllers\ConductorController;
use App\Http\Controllers\EmployeesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\TerminalController;
use App\Http\Controllers\UndefinedUserController;
use App\Models\Terminal;

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

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
Route::post('admin/bus/store', [BusController::class, 'store'])->name('admin.bus.store');
Route::get('admin/bus/{id}', [BusController::class, 'show'])->name('admin.bus.show');
Route::get('admin/bus/{id}/edit', [BusController::class, 'edit'])->name('admin.bus.edit');
Route::put('admin/bus/{id}', [BusController::class, 'update'])->name('admin.bus.update');
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


// Dispatcher

Route::get('/dispatchers', [DispatcherController::class, 'index'])->name('dispatcher.index');
Route::get('/dispatchers/create', [DispatcherController::class, 'create'])->name('dispatcher.create');
Route::post('/dispatchers', [DispatcherController::class, 'store'])->name('dispatcher.store');
Route::get('/dispatchers/{dispatcher}', [DispatcherController::class, 'show'])->name('dispatcher.show');
Route::get('/dispatchers/{dispatcher}/edit', [DispatcherController::class, 'edit'])->name('dispatcher.edit');
Route::put('/dispatchers/{dispatcher}', [DispatcherController::class, 'update'])->name('dispatcher.update');
Route::delete('/dispatchers/{dispatcher}', [DispatcherController::class, 'destroy'])->name('dispatcher.destroy');




//Login Auth
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('adminpage');
    Route::get('/user', [ConductorController::class, 'index'])->name('conductorpage');
    Route::get('/dispatcher', [DispatcherController::class, 'index'])->name('dispatcherpage');
});

//terminal
Route::get('/terminal', [TerminalController::class, 'index'])->name('terminal.index');
Route::get('/admin/terminal', [TerminalController::class, 'index'])->name('admin.terminal.index');


//Conductor route
/* Route::post('/user',[ConductorController::class, 'calculateDistance'])->name('calculatedistance'); */
Route::get('/terminals/{id}/edit', [TerminalController::class, 'edit'])->name('terminals.edit');
Route::put('/terminals/{id}', [TerminalController::class, 'update'])->name('terminals.update');
Route::delete('/terminals/{id}', [TerminalController::class, 'destroy'])->name('terminals.destroy');
Route::get('/terminals/create', [TerminalController::class, 'create'])->name('terminals.create');
Route::post('/terminals', [TerminalController::class, 'store'])->name('terminals.store');



//wait
Route::get('/wait',[UndefinedUserController:: class, 'index'])->name('wait');

use App\Http\Middleware\CheckPosition;

Route::middleware([CheckPosition::class])->group(function () {
    Route::get('/admin', function () {
        if (Auth::user()->position !== 'Admin') {
            abort(403, 'Unauthorized');
        }

        return view('admin.index');
    })->name('adminpage');

    Route::middleware(['auth'])->group(function () {
        Route::get('/user', function () {
            if (Auth::user()->position !== 'Conductor') {
                abort(403, 'Unauthorized');
            }
    
            // Manually call the controller method
            return app(ConductorController::class)->index();
        })->name('conductorpage'); 
    });

});

Route::post('/calculate-distance', [ConductorController::class, 'calculateDistance'])->name('calculate.distance');
Route::get('/print-ticket', [ConductorController::class, 'printTicket'])->name('print.ticket');


//revenuesfrom condcutro
Route::post('/revenue/store', [RevenueController::class, 'store'])->name('revenue.store');





