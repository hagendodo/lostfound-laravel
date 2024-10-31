<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|max:20|unique:users',
            'password' => 'required|string|min:6',
            'name' => 'required|string|max:255',
        ]);

        $user = User::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }

    public function login(Request $request)
{
    // Validate request data
    $request->validate([
        'nim' => 'required|string|max:20',
        'password' => 'required|string|min:6',
    ]);

    // Attempt to log the user in using 'nim' as the identifier
    if (Auth::attempt(['nim' => $request->nim, 'password' => $request->password])) {
        // Regenerate session to prevent session fixation attacks
        $request->session()->regenerate();

        return redirect()->route('search')->with('success', 'Login successful!');
    }

    // Redirect back with an error message if login fails
    return redirect()->back()->with('error', 'Invalid credentials');
}

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logged out successfully');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }
}
