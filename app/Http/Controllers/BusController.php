<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\User;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index(){
// In your BusController
    $Buses = Bus::with(['driver', 'conductor'])->get();
    return view('admin.bus.index', compact('Buses'));


    }

    public function register(Request $request)
    {
        $drivers = User::where('position', 'Driver')->get();
        
        $conductors = User::where('position', 'Conductor')->get();
    
        return view('admin.bus.register', compact('drivers','conductors'));
    }
    

    public function store(Request $request)
    {
        $data = $request->validate([
            'bus_type' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'description' => 'nullable|string',
            'departure_time' => 'nullable|date_format:H:i',
            'arrival_time' => 'nullable|date_format:H:i',
            'driver_id' => 'required|exists:users,id',
            'conductor_id' => 'required|exists:users,id',
            'status' => 'nullable|string|max:255',
        ]);

        $newBus = Bus::create($data);

        return redirect(route('admin.bus.index'));
    }


    public function show($id)
    {
        $bus = Bus::findOrFail($id);

        return view('admin.bus.show', compact('bus'));
    }

    // In your BusController

    public function edit($id)
    {
        $bus = Bus::findOrFail($id); // Find the bus by its ID
        $drivers = User::where('position', 'Driver')->get(); // Assuming role-based filter for drivers
        $conductors = User::where('position', 'Conductor')->get(); // Assuming role-based filter for conductors

        return view('admin.bus.edit', compact('bus', 'drivers', 'conductors'));
    }


    
    // In your BusController

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'bus_type' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'description' => 'nullable|string',
            'departure_time' => 'required|date_format:H:i',
            'arrival_time' => 'required|date_format:H:i',
            'driver_id' => 'nullable|exists:users,id',
            'conductor_id' => 'nullable|exists:users,id',
            'status' => 'required|in:Available,In Transit,Under Maintenance',
        ]);

        // Find the bus and update the fields
        $bus = Bus::findOrFail($id);
        $bus->update($validated);

        // Redirect back to the bus list with a success message
        return redirect()->route('admin.bus.index')->with('success', 'Bus updated successfully.');
    }


    

    public function destroy($id)
    {
        $bus = Bus::findOrFail($id);

        $bus->delete();

        return redirect()->route('admin.bus.index')->with('success', 'Bus deleted successfully.');
    }

    public function showForm($id)
    {
        $user = User::findOrFail($id);
    
        if ($user->position === 'Driver') {
            return redirect()->route('admin.bus.register', ['id' => $user->id]);
        }
    
        // Fix: fetch drivers before returning the view
        $drivers = User::where('position', 'Driver')->get();

        if ($user->position === 'Conductor') {
            return redirect()->route('admin.bus.register', ['id' => $user->id]);
        }
    
        // Fix: fetch drivers before returning the view
        $drivers = User::where('position', 'Conductor')->get();
    
        return view('admin.bus.register', compact('conductors'));
    }    

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function conductor()
    {
        return $this->belongsTo(User::class, 'conductor_id');
    }

}
