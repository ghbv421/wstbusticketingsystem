<?php

namespace App\Http\Controllers;

use App\Models\Dispatcher;
use App\Models\User;
use App\Models\Bus;
use App\Models\Terminal;
use Illuminate\Http\Request;

class DispatcherController extends Controller
{
    public function index()
    {
        $dispatchers = Dispatcher::with(['driver', 'bus', 'fromTerminal', 'destinationTerminal'])->get();
        return view('dispatcher.index', compact('dispatchers'));
    }

    public function create()
    {
        $drivers = User::where('position', 'Driver')->get();
        $buses = Bus::all();
        $terminals = Terminal::all();

        // Get unique bus types from the buses table
        $busTypes = Bus::select('bus_type')->distinct()->pluck('bus_type');

        return view('dispatcher.create', compact('drivers', 'buses', 'terminals', 'busTypes'));
    }

    public function edit(Dispatcher $dispatcher)
    {
        $drivers = User::where('position', 'Driver')->get();
        $buses = Bus::all();
        $terminals = Terminal::all();
        $busTypes = Bus::select('bus_type')->distinct()->pluck('bus_type');

        return view('dispatcher.edit', compact('dispatcher', 'drivers', 'buses', 'terminals', 'busTypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'driver_id' => 'required|exists:users,id',
            'bus_id' => 'required|exists:bus_table,id',
            'bus_type' => 'required|string',  // assuming it's a string, not an FK
            'from_terminal_id' => 'required|exists:terminals,id',
            'destination_terminal_id' => 'required|exists:terminals,id',
            'departure' => 'required|date',
            'arrival' => 'required|date|after_or_equal:departure',
            'status' => 'required|in:Scheduled,Departed,Arrived,Cancelled',
        ]);

        Dispatcher::create($validated);

        return redirect()->route('dispatcher.index')->with('success', 'Dispatcher added successfully.');
    }



    public function show(Dispatcher $dispatcher)
    {
        $dispatcher->load(['driver', 'bus', 'fromTerminal', 'destinationTerminal']);
        return view('dispatcher.show', compact('dispatcher'));
    }
    
    public function update(Request $request, Dispatcher $dispatcher)
    {
        $validated = $request->validate([
            'driver_id' => 'required|exists:users,id',
            'bus_id' => 'required|exists:bus_table,id',
            'bus_type' => 'required|string',
            'from_terminal_id' => 'required|exists:terminals,id',
            'destination_terminal_id' => 'required|exists:terminals,id',
            'departure' => 'required|date',
            'arrival' => 'required|date|after_or_equal:departure',
            'status' => 'required|in:Scheduled,Departed,Arrived,Cancelled',
        ]);

        $dispatcher->update($validated);

        return redirect()->route('dispatcher.index')->with('success', 'Dispatcher updated successfully.');
    }

    public function destroy(Dispatcher $dispatcher)
    {
        $dispatcher->delete();
        return redirect()->route('dispatcher.index')->with('success', 'Dispatcher deleted successfully.');
    }
}
