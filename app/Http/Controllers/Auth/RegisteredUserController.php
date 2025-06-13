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
              'first_name' => 'required|string|max:255',
              'last_name' => 'nullable|string|max:255',
            'phone' => ['required', 'regex:/^\+\d{10,15}$/'
],
], [
    'phone.regex' => 'Please enter a valid phone number with country code (e.g. +1 555 123 4567 or +44 20 7946 0958).',


              'address' => 'nullable|string|max:255',
              'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
              'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => 'user', // default value or dynamic if needed
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        //Auth::login($user);

       // Redirect based on role
    if ($user->role === 'user') {
        return redirect()->intended('/dashboard');
    }

    return redirect()->intended('/dashboard');
    }
}
