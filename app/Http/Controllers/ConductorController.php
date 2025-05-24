<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\User;
use App\Models\Dispatcher;
use App\Models\Revenue;
use Carbon\Carbon;
use App\Models\Terminal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ConductorController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Ensure user is a Conductor
        if ($user->position !== 'Conductor') {
            abort(403, 'Unauthorized');
        }

        $terminals = Terminal::all();
        $buses = Bus::all();

        // Get only drivers (assuming 'position' is used to identify roles)
        $drivers = User::where('position', 'Driver')->get();

        return view('user.index', compact('terminals', 'buses', 'drivers'));
    }
    
    

    public function register()
    {

    }

    public function store()
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $terminal = Terminal::find($id);
        return view('terminals.edit', compact('terminal'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Terminal::destroy($id);
    }
    public function calculateDistanceBetweenTerminals($lat1, $long1, $lat2, $long2)
    {
        $earthRadius = 6371;
    
        $dlat = deg2rad($lat2 - $lat1);
        $dlong = deg2rad($long2 - $long1);
    
        $a = sin($dlat / 2) * sin($dlat / 2) +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
             sin($dlong / 2) * sin($dlong / 2);
    
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $earthRadius * $c;
    
        return round($distance, 2); // Rounded for cleaner display
    }
    
    public function deg2rad($deg)
    {
        return $deg * pi() / 180;
    }


        public function calculateDistance(Request $request)
    {
        // Validate inputs
        $request->validate([
            't1_id' => 'required|exists:terminals,id',
            't2_id' => 'required|exists:terminals,id',
        ]);

        // Fetch terminals by their IDs
        $t1 = Terminal::find($request->input('t1_id'));
        $t2 = Terminal::find($request->input('t2_id'));

        // Calculate the distance
        $distance = $this->calculateDistanceBetweenTerminals(
            $t1->latitude, $t1->longitude,
            $t2->latitude, $t2->longitude
        );

        // Calculate the price (Php 3.00 per kilometer)
        $price = $distance * 3;

        // Pass data to the view for the ticket preview
        return view('user.index', [
            'terminals' => Terminal::all(),
            't1name' => $t1->terminal,
            't2name' => $t2->terminal,
            'price' => $price,
        ]);
    }


   public function printTicket(Request $request)
    {
        $t1name = $request->input('t1name');
        $t2name = $request->input('t2name');
        $price = $request->input('price');
        $conductorId = Auth::id();

        // Get the latest dispatcher with 'Scheduled' or 'Departed' status for the logged-in conductor
        $dispatcher = Dispatcher::where('conductor_id', $conductorId)
            ->whereIn('status', ['Scheduled', 'Departed'])
            ->latest()
            ->first();

        if (!$dispatcher) {
            return redirect()->back()->withErrors(['No active dispatcher found for this conductor.']);
        }

        // Check for existing revenue record (by dispatcher ID + date)
        $existingRevenue = Revenue::where('dispatcher_id', $dispatcher->id)
            ->whereDate('date', Carbon::today())
            ->first();

        if ($existingRevenue) {
            $existingRevenue->amount += $price;
            $existingRevenue->save();
        } else {
            Revenue::create([
                'dispatcher_id' => $dispatcher->id,
                'bus_id' => $dispatcher->bus_id,
                'driver_id' => $dispatcher->driver_id,
                'conductor_id' => $dispatcher->conductor_id,
                'amount' => $price,
                'date' => Carbon::today(),
            ]);
        }

        // Show the printed ticket view
        return view('user.ticket', compact('t1name', 't2name', 'price'));
    }



    

    public function showDistanceForm()
    {
        $terminals = Terminal::all();
        return view('user.index', compact('terminals'));
    }


}
