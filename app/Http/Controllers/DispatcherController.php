<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DispatcherController extends Controller
{
    
    // Display a listing of the employees
    public function index()
    {
        return view('dispatcher.index');
    }

    // Show the form for creating a new employee
    public function create()
    {
        // Logic to show create employee form
    }

    // Store a newly created employee in storage
    public function store(Request $request)
    {
        // Logic to validate and store a new employee
    }

    // Display the specified employee
    public function show($id)
    {
        // Logic to display a single employee details
    }

    // Show the form for editing the specified employee
    public function edit($id)
    {
        // Logic to show edit form for employee
    }

    // Update the specified employee in storage
    public function update(Request $request, $id)
    {
        // Logic to validate and update employee details
    }

    // Remove the specified employee from storage
    public function destroy($id)
    {
        // Logic to delete an employee
    }
}
