<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
        $request->validate([
            'nim' => 'required|string|max:20',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('nim', $request->nim)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Invalid credentials');
        }

        // Log the user in (using session or token)
        // Session::put('user', $user); // Example for session-based auth

        return redirect()->route('home')->with('success', 'Login successful!');
    }

    public function logout(Request $request)
    {
        // Implement logout logic (e.g., clear session)
        return redirect()->route('login')->with('success', 'Logged out successfully');
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
