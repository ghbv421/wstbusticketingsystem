<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\User;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index(){
        $Buses = Bus::all(); 

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
        'description' => 'nullable|string',
        'departure_time' => 'nullable|date_format:H:i',
        'arrival_time' => 'nullable|date_format:H:i',
        'driver' => 'nullable|string|max:255',
        'conductor' => 'nullable|string|max:255',
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

    public function edit($id)
    {
        $bus = Bus::findOrFail($id);
        return view('admin.bus.edit', compact('bus'));
    }
    
    public function update(Request $request, $id)
    {
        $bus = Bus::findOrFail($id);
        $bus->update($request->all());
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
}
