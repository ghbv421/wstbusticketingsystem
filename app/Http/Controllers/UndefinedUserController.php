<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UndefinedUserController extends Controller
{
    public function index()
    {
        // You can add any logic here if needed
        // For now, just return the view
        return view('wait');
    }
}
