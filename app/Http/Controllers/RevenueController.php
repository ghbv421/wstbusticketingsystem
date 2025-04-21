<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Revenue;

class RevenueController extends Controller
{
    // Show revenue graph & list
    public function index()
    {
        $revenues = Revenue::orderBy('date')->get();
        return view('revenue.index', compact('revenues'));
    }

    // Show form to add revenue
    public function create()
    {
        return view('revenue.add');
    }

    // Save new revenue
    public function store(Request $request)
    {
        $validated = $request->validate([
            'terminal_name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        Revenue::create($validated);

        return redirect()->route('revenue.index')->with('success', 'Revenue added successfully.');
    }
}
