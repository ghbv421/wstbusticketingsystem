<?php

namespace App\Http\Controllers;

use App\Models\Terminal;
use Illuminate\Http\Request;

class TerminalController extends Controller
{
    public function index(){
        $terminals = Terminal::all();
        return view ('admin.terminal.index', compact('terminals'));
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
}
