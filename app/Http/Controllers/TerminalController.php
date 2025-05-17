<?php

namespace App\Http\Controllers;

use App\Models\Terminal;
use Illuminate\Http\Request;

class TerminalController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $terminals = Terminal::when($search, function ($query, $search) {
            return $query->where('id', 'like', "%{$search}%")
                        ->orWhere('terminal', 'like', "%{$search}%")
                        ->orWhere('contact', 'like', "%{$search}%")
                        ->orWhere('latitude', 'like', "%{$search}%")
                        ->orWhere('longitude', 'like', "%{$search}%")
                        ->orWhere('address', 'like', "%{$search}%")
                        ->orWhere('city', 'like', "%{$search}%");
        })->get();

        return view('admin.terminal.index', compact('terminals'));
    } 


    public function edit($id)
    {
        $terminal = Terminal::find($id);
        return view('admin.terminal.edit', compact('terminal'));
    }

    public function destroy($id)
    {
        Terminal::destroy($id);
        return redirect()->route('terminal.index');
    }

    public function create()
    {
        return view('admin.terminal.add');
    }

    public function store(Request $request)
    {
        Terminal::create($request->all());
        return redirect()->route('terminal.index');
    }
    public function update(Request $request, $id)
    {
        $terminal = Terminal::findOrFail($id);
        $terminal->update($request->all());

        return redirect()->route('terminal.index')->with('success', 'Terminal updated successfully.');
    }

}
