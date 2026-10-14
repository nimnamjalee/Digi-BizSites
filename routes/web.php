<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return view('home');
});

require __DIR__.'/auth.php';

// Client Registration
Route::get('/client-register', [ClientController::class, 'create'])
    ->name('client.register');

Route::post('/client-register', [ClientController::class, 'store'])
    ->name('client.register.store');

// Client Login
Route::get('/client-login', [ClientController::class, 'showLogin'])
    ->name('client.login');

Route::post('/client-login', [ClientController::class, 'login'])
    ->name('client.login.submit');

// Client Dashboard
Route::get('/client-dashboard', function (Request $request) {
    if (!$request->session()->has('client_id')) {
        return redirect()->route('client.login');
    }

    return view('client-dashboard');
})->name('client.dashboard');

// Client Logout
Route::post('/client-logout', [ClientController::class, 'logout'])
    ->name('client.logout');
Route::get('/client-profile', function (
    \Illuminate\Http\Request $request
) {
    if (!$request->session()->has('client_id')) {
        return redirect()->route('client.login');
    }

    return view('client-profile');
})->name('client.profile');

Route::get('/create-site', function (
    \Illuminate\Http\Request $request
) {
    if (!$request->session()->has('client_id')) {
        return redirect()->route('client.login');
    }

    return view('client-create-site');
})->name('client.create-site');