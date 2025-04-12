<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index(){
        $Buses = Bus::all(); 

        return view('admin.bus.index', compact('Buses'));
    }

    public function register(){
        return view('admin.bus.register');
    }

    public function store(Request $request){
        $data = $request->validate([
            'bus_type' => 'required',
            'description' => 'nullable'
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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $bus = Bus::findOrFail($id);

        $bus->delete();

        return redirect()->route('admin.bus.index')->with('success', 'Bus deleted successfully.');
    }
}
