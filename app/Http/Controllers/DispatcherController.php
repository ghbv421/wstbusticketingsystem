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
        $dispatchers = Dispatcher::with(['driver', 'conductor', 'bus', 'fromTerminal', 'destinationTerminal'])->get();
        return view('dispatcher.index', compact('dispatchers'));
    }

    public function show(Dispatcher $dispatcher)
    {
        $dispatcher->load(['driver', 'conductor', 'bus', 'fromTerminal', 'destinationTerminal']);
        return view('dispatcher.index', compact('dispatcher'));
    }

    public function create()
    {
        $drivers = User::where('position', 'Driver')->get();
        $conductors = User::where('position', 'Conductor')->get();  // <-- added
        $buses = Bus::all();
        $terminals = Terminal::all();

        $busTypes = Bus::select('bus_type')->distinct()->pluck('bus_type');

        return view('dispatcher.create', compact('drivers', 'conductors', 'buses', 'terminals', 'busTypes'));
    }

    public function edit(Dispatcher $dispatcher)
    {
        $drivers = User::where('position', 'Driver')->get();
        $conductors = User::where('position', 'Conductor')->get();  // <-- added
        $buses = Bus::all();
        $terminals = Terminal::all();
        $busTypes = Bus::select('bus_type')->distinct()->pluck('bus_type');

        return view('dispatcher.edit', compact('dispatcher', 'drivers', 'conductors', 'buses', 'terminals', 'busTypes'));
    }


        public function store(Request $request)
        {
            $validated = $request->validate([
                'driver_id' => 'required|exists:users,id',
                'conductor_id' => 'required|exists:users,id',  // <-- added
                'bus_id' => 'required|exists:bus_table,id',
                'bus_type' => 'required|string',
                'from_terminal_id' => 'required|exists:terminals,id',
                'destination_terminal_id' => 'required|exists:terminals,id',
                'departure' => 'required|date',
                'arrival' => 'required|date|after_or_equal:departure',
                'status' => 'required|in:Scheduled,Departed,Arrived,Cancelled',
            ]);

            Dispatcher::create($validated);

            return redirect()->route('dispatcher.index')->with('success', 'Dispatcher added successfully.');
        }

        public function update(Request $request, Dispatcher $dispatcher)
        {
            $validated = $request->validate([
                'driver_id' => 'required|exists:users,id',
                'conductor_id' => 'required|exists:users,id',  // <-- added
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
