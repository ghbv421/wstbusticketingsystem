<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employees::all();
        return view('admin.employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'position' => 'required'
        ]);
    

        Employees::create([
            'name' => $request->name,
            'email' => $request->email,
            'position' => $request->position
        ]);
    
        return redirect()->route('admin.employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employees = Employees::findOrFail($id); 
        
        return view('admin.employees.show', compact('employees')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employees = Employees::findOrFail($id);
        return view('admin.employees.edit', compact('employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'position' => 'required'
        ]);
    
        $employees = Employees::findOrFail($id);
        $employees->update([
            'name' => $request->name,
            'email' => $request->email,
            'position' => $request->position
        ]);
    
        return redirect()->route('admin.employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
            $employees = Employees::findOrFail($id);
        $employees->delete();

        return redirect()->route('admin.employees.index');
    }
}
