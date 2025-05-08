<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'sex' => ['required'],
        'age' => ['required'],
        'address' => ['required'],
        'phone' => ['required'],
    ]);

    // Create user with position set to null by default
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'position' => null, // Position is set to null initially
        'age' => $request->age,
        'sex' => strtolower($request->sex), // Store sex as lowercase
        'address' => $request->address,
        'phone' => $request->phone,
    ]);

    // Event to indicate user registration
    event(new Registered($user));

    // Login the user
    Auth::login($user);

    // Check if position is null, redirect to 'wait' page
    if ($user->position === null) {
        return redirect()->route('wait'); // Redirect to 'wait' page if position is null
    }

    // If position is set, redirect based on the position (can still use the admin page or wherever needed)
    return redirect()->route('adminpage');
}

}
