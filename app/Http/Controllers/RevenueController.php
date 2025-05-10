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
        $revenues = Revenue::with(['bus', 'driver', 'conductor'])->orderBy('date')->get();
        return view('admin.revenues.index', compact('revenues'));
    }

    // Show form to add revenue
    public function create()
    {
        $buses = DB::table('bus_table')->get();
        $drivers = User::where('position', 'Driver')->get();
        $conductors = User::where('position', 'Conductor')->get();

        return view('admin.revenues.add', compact('buses', 'drivers', 'conductors'));
    }

    // Save new revenue
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bus_id' => 'required|exists:bus_table,id',
            'driver_id' => 'required|exists:users,id',
            'conductor_id' => 'required|exists:users,id',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        Revenue::create($validated);

        return redirect()->route('revenue.index')->with('success', 'Revenue added successfully.');
    }
}
