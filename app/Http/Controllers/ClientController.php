<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    // Show registration page
    public function create()
    {
        return view('client-register');
    }

    // Save new client
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'business_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients,email',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Client::create([
            'name' => $validated['name'],
            'business_name' => $validated['business_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()
            ->route('client.login')
            ->with('success', 'Account created successfully! Please log in.');
    }

    // Show login page
    public function showLogin()
    {
        return view('client-login');
    }

    // Check login details
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $client = Client::where('email', $credentials['email'])->first();

        if (!$client || !Hash::check($credentials['password'], $client->password)) {
            return back()
                ->withErrors([
                    'email' => 'Invalid email or password.',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();
        $request->session()->put('client_id', $client->id);

        return redirect()->route('client.dashboard');
    }

    // Log out client
    public function logout(Request $request)
    {
        $request->session()->forget('client_id');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('client.login');
    }
}
