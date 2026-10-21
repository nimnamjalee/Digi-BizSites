<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WebsiteSample;
use App\Models\WebsiteProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class WebsiteSampleController extends Controller
{
    /**
     * Check whether the logged-in user is a Super Admin.
     * User details are retrieved from the users table.
     */
    private function checkAdmin(Request $request)
    {
        $adminId = $request->session()->get('admin_id');

        if (!$adminId) {
            abort(403, 'Super Admin access required.');
        }

        $admin = User::find($adminId);

        if (!$admin || $admin->role !== 'super_admin') {
            abort(403, 'Super Admin access required.');
        }

        return $admin;
    }

    /**
     * Display website samples.
     */
    public function index(Request $request)
    {
        $admin = $this->checkAdmin($request);

        $samples = WebsiteSample::latest()->get();

        return view('admin-dashboard', compact('admin', 'samples'));
    }

    /**
     * Show the create website sample form.
     */
    public function create(Request $request)
    {
        $this->checkAdmin($request);

        return view('admin-samples-create');
    }

    /**
     * Store a new website sample and its products.
     */
    public function store(Request $request)
    {
        $this->checkAdmin($request);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|url|max:255',
            'template_key' => 'required|in:bakery,salon,tech',
            'status' => 'required|in:draft,published',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'homepage_banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'location' => 'nullable|string|max:255',
            'business_phone' => 'nullable|string|max:255',
            'business_email' => 'nullable|email|max:255',
            'business_address' => 'nullable|string',

            'homepage_heading' => 'nullable|string|max:255',
            'homepage_description' => 'nullable|string',
            'primary_color' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],

            'opening_days' => 'nullable|array',
            'opening_days.*' => 'in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'opening_time' => 'nullable|date_format:H:i',
            'closing_time' => 'nullable|date_format:H:i',

            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',

            'products' => 'nullable|array|max:100',
            'products.*.name' => 'required|string|max:255',
            'products.*.price' => 'required|numeric|min:0|max:99999999.99',
            'products.*.category' => 'nullable|string|max:255',
            'products.*.description' => 'nullable|string',
            'products.*.image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'products.*.stock_quantity' => 'nullable|integer|min:0',
        ]);

        $logoPath = $request->hasFile('logo')
            ? $request->file('logo')->store('business-logos', 'public')
            : null;

        $bannerPath = $request->hasFile('homepage_banner')
            ? $request->file('homepage_banner')->store('business-banners', 'public')
            : null;

        $slug = Str::slug($validated['title']);

        if (WebsiteSample::where('slug', $slug)->exists()) {
            $slug .= '-' . Str::lower(Str::random(5));
        }

        DB::transaction(function () use (
            $validated,
            $request,
            $logoPath,
            $bannerPath,
            $slug
        ) {
            $sample = WebsiteSample::create([
                'title' => $validated['title'],
                'slug' => $slug,
                'category' => $validated['category'],
                'description' => $validated['description'] ?? null,
                'thumbnail' => $validated['thumbnail'] ?? null,
                'template_key' => $validated['template_key'],
                'status' => $validated['status'],

                'logo_path' => $logoPath,
                'homepage_banner_path' => $bannerPath,

                'location' => $validated['location'] ?? null,
                'business_phone' => $validated['business_phone'] ?? null,
                'business_email' => $validated['business_email'] ?? null,
                'business_address' => $validated['business_address'] ?? null,

                'homepage_heading' => $validated['homepage_heading'] ?? null,
                'homepage_description' => $validated['homepage_description'] ?? null,
                'primary_color' => $validated['primary_color'],

                'opening_days' => !empty($validated['opening_days'])
                    ? implode(', ', $validated['opening_days'])
                    : null,

                'opening_time' => $validated['opening_time'] ?? null,
                'closing_time' => $validated['closing_time'] ?? null,
                'facebook_url' => $validated['facebook_url'] ?? null,
                'instagram_url' => $validated['instagram_url'] ?? null,
            ]);

            foreach ($validated['products'] ?? [] as $index => $data) {
                $imagePath = $request->hasFile("products.$index.image")
                    ? $request->file("products.$index.image")->store('products', 'public')
                    : null;

                $productSlug = Str::slug($data['name']);

                if (WebsiteProduct::where('slug', $productSlug)->exists()) {
                    $productSlug .= '-' . Str::lower(Str::random(5));
                }

                WebsiteProduct::create([
                    'website_sample_id' => $sample->id,
                    'name' => $data['name'],
                    'slug' => $productSlug,
                    'category' => $data['category'] ?? null,
                    'description' => $data['description'] ?? null,
                    'price' => $data['price'],
                    'image_path' => $imagePath,
                    'stock_quantity' => $data['stock_quantity'] ?? 0,
                    'is_available' => true,
                ]);
            }
        });

        return redirect()
            ->route('admin.samples.index')
            ->with('success', 'Business website created successfully!');
    }

    /**
     * Show the edit website sample form.
     */
    public function edit(Request $request, WebsiteSample $sample)
    {
        $this->checkAdmin($request);

        $products = WebsiteProduct::where(
            'website_sample_id',
            $sample->id
        )->get();

        return view('admin-samples-edit', compact('sample', 'products'));
    }

    /**
     * Update a website sample and its products.
     */
    public function update(Request $request, WebsiteSample $sample)
    {
        $this->checkAdmin($request);

        $validated = $request->validate([
            'title' => 'required|string|max:255',

            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('website_samples', 'slug')->ignore($sample->id),
            ],

            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|url|max:255',
            'template_key' => 'required|in:bakery,salon,tech',
            'status' => 'required|in:draft,published',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'homepage_banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'location' => 'nullable|string|max:255',
            'business_phone' => 'nullable|string|max:255',
            'business_email' => 'nullable|email|max:255',
            'business_address' => 'nullable|string',

            'homepage_heading' => 'nullable|string|max:255',
            'homepage_description' => 'nullable|string',
            'primary_color' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],

            'opening_days' => 'nullable|array',
            'opening_days.*' => 'in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'opening_time' => 'nullable|date_format:H:i',
            'closing_time' => 'nullable|date_format:H:i',

            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',

            'products' => 'sometimes|array|max:100',
            'products.*.id' => 'nullable|integer',
            'products.*.name' => 'required|string|max:255',
            'products.*.price' => 'required|numeric|min:0|max:99999999.99',
            'products.*.category' => 'nullable|string|max:255',
            'products.*.description' => 'nullable|string',
            'products.*.image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'products.*.stock_quantity' => 'nullable|integer|min:0',
        ]);

        $oldLogo = $sample->logo_path;
        $oldBanner = $sample->homepage_banner_path;

        $logoPath = $oldLogo;
        $bannerPath = $oldBanner;

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('business-logos', 'public');
        }

        if ($request->hasFile('homepage_banner')) {
            $bannerPath = $request->file('homepage_banner')->store('business-banners', 'public');
        }

        $openingDays = $validated['opening_days'] ?? [];

        DB::transaction(function () use (
            $validated,
            $request,
            $sample,
            $logoPath,
            $bannerPath,
            $openingDays
        ) {
            $sample->update([
                'title' => $validated['title'],
                'slug' => $validated['slug'] ?? $sample->slug,
                'category' => $validated['category'],
                'description' => $validated['description'] ?? null,
                'thumbnail' => $validated['thumbnail'] ?? null,
                'template_key' => $validated['template_key'],
                'status' => $validated['status'],

                'logo_path' => $logoPath,
                'homepage_banner_path' => $bannerPath,

                'location' => $validated['location'] ?? null,
                'business_phone' => $validated['business_phone'] ?? null,
                'business_email' => $validated['business_email'] ?? null,
                'business_address' => $validated['business_address'] ?? null,

                'homepage_heading' => $validated['homepage_heading'] ?? null,
                'homepage_description' => $validated['homepage_description'] ?? null,
                'primary_color' => $validated['primary_color'],

                'opening_days' => count($openingDays)
                    ? implode(', ', $openingDays)
                    : null,

                'opening_time' => $validated['opening_time'] ?? null,
                'closing_time' => $validated['closing_time'] ?? null,
                'facebook_url' => $validated['facebook_url'] ?? null,
                'instagram_url' => $validated['instagram_url'] ?? null,
            ]);

            if (array_key_exists('products', $validated)) {
                foreach ($validated['products'] as $index => $data) {
                    $product = null;

                    if (!empty($data['id'])) {
                        $product = WebsiteProduct::where(
                            'website_sample_id',
                            $sample->id
                        )->where('id', $data['id'])->first();

                        if (!$product) {
                            abort(422, 'Invalid product for this website.');
                        }
                    }

                    $productSlug = Str::slug($data['name']);

                    $slugExists = WebsiteProduct::where(
                        'slug',
                        $productSlug
                    )->when($product, function ($query) use ($product) {
                        $query->where('id', '!=', $product->id);
                    })->exists();

                    if ($slugExists) {
                        $productSlug .= '-' . Str::lower(Str::random(5));
                    }

                    $imagePath = $product?->image_path;

                    if ($request->hasFile("products.$index.image")) {
                        $newImagePath = $request
                            ->file("products.$index.image")
                            ->store('products', 'public');

                        if ($product && $product->image_path) {
                            Storage::disk('public')->delete($product->image_path);
                        }

                        $imagePath = $newImagePath;
                    }

                    $values = [
                        'website_sample_id' => $sample->id,
                        'name' => $data['name'],
                        'slug' => $productSlug,
                        'category' => $data['category'] ?? null,
                        'description' => $data['description'] ?? null,
                        'price' => $data['price'],
                        'image_path' => $imagePath,
                        'stock_quantity' => $data['stock_quantity'] ?? 0,
                    ];

                    if ($product) {
                        $product->update($values);
                    } else {
                        $values['is_available'] = true;
                        WebsiteProduct::create($values);
                    }
                }
            }
        });

        if ($request->hasFile('logo') && $oldLogo) {
            Storage::disk('public')->delete($oldLogo);
        }

        if ($request->hasFile('homepage_banner') && $oldBanner) {
            Storage::disk('public')->delete($oldBanner);
        }

        return redirect()
            ->route('admin.samples.index')
            ->with('success', 'Website sample updated successfully!');
    }
}
