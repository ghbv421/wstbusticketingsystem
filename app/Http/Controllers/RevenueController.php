<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Revenue;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RevenueController extends Controller
{
    // Show revenue graph & list
    public function index()
    {
        // Group by bus_id, driver_id, conductor_id and sum the amount
        $revenues = DB::table('revenues')
        ->select(
            'bus_id', 
            'driver_id', 
            'conductor_id', 
            DB::raw('SUM(amount) as total_amount'),
            DB::raw('MAX(date) as latest_date')  // get the latest date per group
        )
        ->groupBy('bus_id', 'driver_id', 'conductor_id')
        ->get();


        // Eager load related user data for drivers and conductors separately
        $driverIds = $revenues->pluck('driver_id')->unique();
        $conductorIds = $revenues->pluck('conductor_id')->unique();
        $drivers = User::whereIn('id', $driverIds)->pluck('name', 'id');
        $conductors = User::whereIn('id', $conductorIds)->pluck('name', 'id');

        return view('admin.revenues.index', compact('revenues', 'drivers', 'conductors'));
    }



    // Show form to add revenue
    public function create()
    {
        $buses = DB::table('bus_table')->get();
        $drivers = User::where('position', 'Driver')->get();
        $conductors = User::where('position', 'Conductor')->get();

        return view('admin.revenues.add', compact('buses', 'drivers', 'conductors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bus_id' => 'required|exists:bus_table,id',
            'driver_id' => 'required|exists:users,id',
            'conductor_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0',
        ]);

        Revenue::create([
            'bus_id' => $request->bus_id,
            'driver_id' => $request->driver_id,
            'conductor_id' => $request->conductor_id,
            'amount' => $request->amount,
            'date' => now()->toDateString(),
        ]);

        return redirect()->back()->with('success', 'Revenue recorded successfully!');
    }

    

}
