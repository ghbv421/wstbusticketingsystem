<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index(){
        return view('admin.bus.admin-bus');
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

        return redirect(route('admin.bus.admin-bus'));
    }
}
