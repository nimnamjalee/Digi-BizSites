<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show registration page
    public function create()
    {
        return view('user-register');
    }

    // Register a normal user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:2000',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'] ?? null,
            'password' => Hash::make($validated['password']),
            'role' => 'user',
        ]);

        return redirect()
            ->route('client.login')
            ->with(
                'success',
                'Account created successfully! Please log in.'
            );
    }

    // Show login page
    public function showLogin()
    {
        return view('user-login');
    }

    // Login user
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where(
            'email',
            $credentials['email']
        )->first();

        if (
            !$user ||
            !Hash::check(
                $credentials['password'],
                $user->password
            )
        ) {
            return back()
                ->withErrors([
                    'email' => 'Invalid email address or password.',
                ])
                ->onlyInput('email');
        }

        // Regenerate session after successful login
        $request->session()->regenerate();

        // Clear old login sessions
        $request->session()->forget([
            'admin_id',
            'user_id',
            'client_id',
            'seller_id',
            'customer_id',
        ]);

        // Super Admin uses the Admin Dashboard
        if ($user->role === 'super_admin') {
            $request->session()->put('admin_id', $user->id);

            return redirect()->route('admin.dashboard');
        }

        // All normal users use one dashboard
        if (in_array($user->role, [
            'user',
            'client',
            'seller',
            'customer',
        ])) {
            $request->session()->put('user_id', $user->id);

            return redirect()->route('user.dashboard');
        }

        return back()->withErrors([
            'email' => 'Your account role is not supported.',
        ]);
    }

    // Show normal user dashboard
    public function dashboard(Request $request)
    {
        $userId = $request->session()->get('user_id');

        if (!$userId) {
            return redirect()->route('client.login');
        }

        $user = User::find($userId);

        if (!$user || $user->role === 'super_admin') {
            $request->session()->forget('user_id');

            return redirect()->route('client.login');
        }

        return view('user-dashboard', compact('user'));
    }

    // Logout
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('client.login')
            ->with(
                'success',
                'You have logged out successfully.'
            );
    }
}
