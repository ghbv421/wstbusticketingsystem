<?php

namespace App\Http\Controllers;

use App\Models\Bus;
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
        return view('user.index', compact('terminals'));
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
        if (Auth::user()->position !== 'Conductor') {
            abort(403, 'Unauthorized');
        }

        $terminals = Terminal::all();
    
        $t1 = Terminal::find($request->input('t1_id'));
        $t2 = Terminal::find($request->input('t2_id'));
    
        if (!$t1 || !$t2) {
            return view('user.index', [
                'terminals' => $terminals,
            ])->with('error', 'One or both terminals not found.');
        }
    
        $distance = $this->calculateDistanceBetweenTerminals(
            $t1->latitude, $t1->longitude,
            $t2->latitude, $t2->longitude
        );
    
        return view('user.index', [
            'distance' => $distance,
            't1name' => $t1->name,
            't2name' => $t2->name,
            'terminals' => $terminals,
        ]);
    }
    

    public function showDistanceForm()
    {
        $terminals = Terminal::all();
        return view('user.index', compact('terminals'));
    }
}
