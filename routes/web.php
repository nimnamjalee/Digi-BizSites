
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteSampleController;
use App\Models\WebsiteSample;
use App\Models\User;

Route::get('/', function () {
    return view('home');
});

require __DIR__.'/auth.php';

// User Registration
Route::get('/user-register', [UserController::class, 'create'])
    ->name('user.register');

Route::post('/user-register', [UserController::class, 'store'])
    ->name('user.register.store');

// User Login
Route::get('/client-login', [UserController::class, 'showLogin'])
    ->name('client.login');

Route::post('/client-login', [UserController::class, 'login'])
    ->name('client.login.submit');

// Normal User Dashboard
Route::get('/user-dashboard', [UserController::class, 'dashboard'])
    ->name('user.dashboard');

// User Logout
Route::post('/client-logout', [UserController::class, 'logout'])
    ->name('client.logout');

// User Profile
Route::get('/client-profile', function (Request $request) {
    $userId = $request->session()->get('user_id');

    if (!$userId) {
        return redirect()->route('client.login');
    }

    $user = User::find($userId);

    if (!$user || $user->role === 'super_admin') {
        $request->session()->forget('user_id');
        return redirect()->route('client.login');
    }

    return view('client-profile', ['client' => $user]);
})->name('client.profile');

// Create Website
Route::get('/create-site', function (Request $request) {
    $userId = $request->session()->get('user_id');

    if (!$userId) {
        return redirect()->route('client.login');
    }

    $user = User::find($userId);

    if (!$user || $user->role === 'super_admin') {
        $request->session()->forget('user_id');
        return redirect()->route('client.login');
    }

    return view('client-create-site', ['client' => $user]);
})->name('client.create-site');

// Super Admin Dashboard
Route::get('/admin-dashboard', function (Request $request) {
    $adminId = $request->session()->get('admin_id');

    if (!$adminId) {
        return redirect()->route('client.login');
    }

    $admin = User::where('id', $adminId)
        ->where('role', 'super_admin')
        ->first();

    if (!$admin) {
        $request->session()->forget('admin_id');
        return redirect()->route('client.login');
    }

    $samples = WebsiteSample::latest()->get();

    return view('admin-dashboard', compact('admin', 'samples'));
})->name('admin.dashboard');

// Admin Website Samples
Route::get('/admin/samples', [
    WebsiteSampleController::class,
    'index'
])->name('admin.samples.index');

Route::get('/admin/samples/create', [
    WebsiteSampleController::class,
    'create'
])->name('admin.samples.create');

Route::post('/admin/samples', [
    WebsiteSampleController::class,
    'store'
])->name('admin.samples.store');

// Edit Website Sample
Route::get('/admin/samples/{sample}/edit', [
    WebsiteSampleController::class,
    'edit'
])->name('admin.samples.edit');

Route::put('/admin/samples/{sample}', [
    WebsiteSampleController::class,
    'update'
])->name('admin.samples.update');

// Admin View of Individual Website
Route::get('/admin/site-admin-view/{id}', function ($id) {
    return view('sample_site_admin.site-admin-view', [
        'sampleId' => $id
    ]);
})->name('admin.site-admin.view');

// View Published Business Website
Route::get('/sites/{slug}', function ($slug) {
    $website = WebsiteSample::where('slug', $slug)
        ->where('status', 'published')
        ->firstOrFail();

    $products = $website->products()
        ->where('is_available', true)
        ->get();

    return view('business-website', compact('website', 'products'));
})->name('sites.show');

// Published Sample Websites
Route::get('/sample-websites', function () {
    $samples = WebsiteSample::where('status', 'published')
        ->latest()
        ->get();

    return view('sample-websites', compact('samples'));
})->name('samples.websites');
