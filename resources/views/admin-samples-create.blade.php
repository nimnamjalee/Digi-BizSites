<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Business Website | Digi BizSites</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px 15px;
            font-family: Arial, sans-serif;
            background: #f5f6fb;
            color: #20243a;
        }

        .container {
            max-width: 950px;
            margin: auto;
            background: #fff;
            padding: 32px;
            border-radius: 18px;
            box-shadow: 0 8px 30px #20243a12;
        }

        .header {
            margin-bottom: 30px;
        }

        h1 {
            margin: 0 0 10px;
            font-size: 27px;
        }

        .subtitle, .hint {
            color: #85899e;
            font-size: 13px;
            line-height: 1.6;
        }

        .section {
            border-top: 1px solid #ededf5;
            padding-top: 23px;
            margin-top: 25px;
        }

        .section h2 {
            font-size: 17px;
            margin: 0 0 7px;
        }

        .section-description {
            color: #85899e;
            font-size: 12px;
            margin-bottom: 20px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #dedfeb;
            border-radius: 9px;
            font: inherit;
            font-size: 13px;
            background: #fff;
            color: #20243a;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #7161e8;
            box-shadow: 0 0 0 3px #7161e81a;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        input[type="file"] {
            padding: 10px;
            background: #fafaff;
        }

        input[type="color"] {
            height: 45px;
            padding: 5px;
            cursor: pointer;
        }

        .hint {
            margin: 6px 0 0;
            font-size: 11px;
        }

        .days {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 10px;
        }

        .days label {
            display: flex;
            align-items: center;
            gap: 5px;
            font-weight: 400;
            margin: 0;
        }

        .days input {
            width: auto;
        }

        .errors {
            background: #fff0f0;
            color: #b42318;
            border-radius: 9px;
            padding: 15px 20px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 30px;
        }

        button, .back {
            display: inline-block;
            border: 0;
            border-radius: 9px;
            padding: 13px 20px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }

        button {
            background: #7161e8;
            color: white;
        }

        button:hover {
            background: #5947d0;
        }

        .back {
            background: #f0edff;
            color: #514c7b;
        }

        @media (max-width: 600px) {
            .container {
                padding: 22px 17px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .field.full {
                grid-column: auto;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <div class="header">
        <h1>Create Business Website</h1>
        <p class="subtitle">
            Add business information, upload images and customise the website.
        </p>
    </div>

    @if ($errors->any())
        <div class="errors">
            <strong>Please correct the following:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.samples.store') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <!-- BUSINESS DETAILS -->
        <div class="section">
            <h2>1. Business Details</h2>
            <p class="section-description">
                Enter the main information about the business.
            </p>

            <div class="form-grid">
                <div class="field">
                    <label for="title">Business / Website Name *</label>
                    <input id="title" name="title" type="text"
                           value="{{ old('title') }}"
                           placeholder="Example: Little Bakery" required>
                </div>

                <div class="field">
                    <label for="category">Business Category *</label>
                    <input id="category" name="category" type="text"
                           value="{{ old('category') }}"
                           placeholder="Bakery, Salon, Clothing..." required>
                </div>

                <div class="field">
                    <label for="location">City / Location</label>
                    <input id="location" name="location" type="text"
                           value="{{ old('location') }}"
                           placeholder="Example: Homagama">
                </div>

                <div class="field">
                    <label for="business_phone">Business Phone</label>
                    <input id="business_phone" name="business_phone"
                           type="tel" value="{{ old('business_phone') }}"
                           placeholder="07X XXX XXXX">
                </div>

                <div class="field">
                    <label for="business_email">Business Email</label>
                    <input id="business_email" name="business_email"
                           type="email" value="{{ old('business_email') }}"
                           placeholder="business@example.com">
                </div>

                <div class="field">
                    <label for="template_key">Starting Design *</label>
                    <select id="template_key" name="template_key" required>
                        <option value="bakery" @selected(old('template_key', 'bakery') === 'bakery')>Bakery & Cafe</option>
                        <option value="salon" @selected(old('template_key') === 'salon')>Beauty Salon</option>
                        <option value="tech" @selected(old('template_key') === 'tech')>IT & Technology</option>
                    </select>
                </div>

                <div class="field full">
                    <label for="business_address">Full Business Address</label>
                    <textarea id="business_address" name="business_address"
                              placeholder="Enter the complete business address">{{ old('business_address') }}</textarea>
                </div>
            </div>
        </div>

        <!-- BRANDING -->
        <div class="section">
            <h2>2. Branding & Images</h2>
            <p class="section-description">
                Upload the business logo and the homepage banner from your computer.
            </p>

            <div class="form-grid">
                <div class="field">
                    <label for="logo">Business Logo</label>
                    <input id="logo" name="logo" type="file"
                           accept="image/jpeg,image/png,image/webp">
                    <p class="hint">JPG, PNG or WebP. Maximum 2 MB.</p>
                </div>

                <div class="field">
                    <label for="homepage_banner">Homepage Banner</label>
                    <input id="homepage_banner" name="homepage_banner"
                           type="file"
                           accept="image/jpeg,image/png,image/webp">
                    <p class="hint">Choose a wide image for the homepage.</p>
                </div>

                <div class="field">
                    <label for="primary_color">Website Primary Colour</label>
                    <input id="primary_color" name="primary_color"
                           type="color" value="{{ old('primary_color', '#7161e8') }}">
                </div>

                <div class="field">
                    <label for="thumbnail">Preview Image URL (Optional)</label>
                    <input id="thumbnail" name="thumbnail" type="url"
                           value="{{ old('thumbnail') }}"
                           placeholder="https://example.com/image.jpg">
                </div>
            </div>
        </div>

        <!-- HOMEPAGE -->
        <div class="section">
            <h2>3. Homepage Content</h2>
            <p class="section-description">
                Choose the heading and introduction visitors see first.
            </p>

            <div class="form-grid">
                <div class="field full">
                    <label for="homepage_heading">Homepage Heading</label>
                    <input id="homepage_heading" name="homepage_heading"
                           type="text" value="{{ old('homepage_heading') }}"
                           placeholder="Welcome to our business">
                </div>

                <div class="field full">
                    <label for="homepage_description">Homepage Description</label>
                    <textarea id="homepage_description"
                              name="homepage_description"
                              placeholder="Introduce your business to customers">{{ old('homepage_description') }}</textarea>
                </div>

                <div class="field full">
                    <label for="description">Business Description</label>
                    <textarea id="description" name="description"
                              placeholder="More details about the business">{{ old('description') }}</textarea>
                </div>
            </div>
        </div>

        <!-- OPENING HOURS -->
        <div class="section">
            <h2>4. Opening Hours</h2>
            <p class="section-description">
                Select the days and hours the business is open.
            </p>

            <div class="field full">
                <label>Opening Days</label>
                <div class="days">
                    @foreach (['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
                        <label>
                            <input type="checkbox" name="opening_days[]"
                                   value="{{ $day }}"
                                   @checked(in_array($day, old('opening_days', [])))>
                            {{ $day }}
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="form-grid" style="margin-top: 20px;">
                <div class="field">
                    <label for="opening_time">Opening Time</label>
                    <input id="opening_time" name="opening_time" type="time"
                           value="{{ old('opening_time') }}">
                </div>

                <div class="field">
                    <label for="closing_time">Closing Time</label>
                    <input id="closing_time" name="closing_time" type="time"
                           value="{{ old('closing_time') }}">
                </div>
            </div>
        </div>

    
<!-- PRODUCTS -->
<div class="section">
    <h2>5. Products</h2>
    <p class="section-description">
        Add products with photos, prices, categories and stock details.
    </p>

    <div id="products-container">
        <div class="product-item">
            <div class="form-grid">

                <div class="field">
                    <label>Product Name *</label>
                    <input type="text"
                           name="products[0][name]"
                           value="{{ old('products.0.name') }}"
                           placeholder="Example: Fish Bun"
                           required>
                </div>

                <div class="field">
                    <label>Product Price (Rs.) *</label>
                    <input type="number"
                           name="products[0][price]"
                           value="{{ old('products.0.price') }}"
                           min="0"
                           max="99999999.99"
                           step="0.01"
                           placeholder="120.00"
                           required>
                </div>

                <div class="field">
                    <label>Product Category</label>
                    <input type="text"
                           name="products[0][category]"
                           value="{{ old('products.0.category') }}"
                           placeholder="Bread, Bun, Cake...">
                </div>

                <div class="field">
                    <label>Stock Quantity</label>
                    <input type="number"
                           name="products[0][stock_quantity]"
                           value="{{ old('products.0.stock_quantity', 0) }}"
                           min="0"
                           placeholder="10">
                </div>

                <div class="field full">
                    <label>Product Photo</label>
                    <input type="file"
                           name="products[0][image]"
                           accept="image/jpeg,image/png,image/webp">
                    <p class="hint">
                        JPG, PNG or WebP. Maximum 2 MB.
                    </p>
                </div>

                <div class="field full">
                    <label>Product Description</label>
                    <textarea name="products[0][description]"
                              placeholder="Describe this product...">{{ old('products.0.description') }}</textarea>
                </div>

            </div>

            <hr style="border:0;border-top:1px solid #ededf5;margin-top:22px;">
        </div>
    </div>

    <button type="button"
            id="add-product"
            style="margin-top:15px;">
        + Add Another Product
    </button>
</div>

<script>
    let productIndex = 1;

    document.getElementById('add-product').addEventListener('click', function () {
        const container = document.getElementById('products-container');
        const product = document.createElement('div');

        product.className = 'product-item';

        product.innerHTML = `
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:18px;">
                <h3 style="font-size:15px;">Product ${productIndex + 1}</h3>

                <button type="button"
                        class="remove-product"
                        style="background:#ffe8e8;color:#b42318;">
                    Remove
                </button>
            </div>

            <div class="form-grid">
                <div class="field">
                    <label>Product Name *</label>
                    <input type="text"
                           name="products[${productIndex}][name]"
                           placeholder="Example: Bread"
                           required>
                </div>

                <div class="field">
                    <label>Product Price (Rs.) *</label>
                    <input type="number"
                           name="products[${productIndex}][price]"
                           min="0"
                           max="99999999.99"
                           step="0.01"
                           placeholder="180.00"
                           required>
                </div>

                <div class="field">
                    <label>Product Category</label>
                    <input type="text"
                           name="products[${productIndex}][category]"
                           placeholder="Bread, Bun, Cake...">
                </div>

                <div class="field">
                    <label>Stock Quantity</label>
                    <input type="number"
                           name="products[${productIndex}][stock_quantity]"
                           min="0"
                           value="0"
                           placeholder="10">
                </div>

                <div class="field full">
                    <label>Product Photo</label>
                    <input type="file"
                           name="products[${productIndex}][image]"
                           accept="image/jpeg,image/png,image/webp">
                    <p class="hint">JPG, PNG or WebP. Maximum 2 MB.</p>
                </div>

                <div class="field full">
                    <label>Product Description</label>
                    <textarea name="products[${productIndex}][description]"
                              placeholder="Describe this product..."></textarea>
                </div>
            </div>

            <hr style="border:0;border-top:1px solid #ededf5;margin-top:22px;">
        `;

        container.appendChild(product);
        productIndex++;
    });

    document.getElementById('products-container').addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-product')) {
            event.target.closest('.product-item').remove();
        }
    });
</script>

        <!-- SOCIAL MEDIA -->
        <div class="section">
            <h2>6. Social Media</h2>
            <p class="section-description">
                Add links to the business's social media pages.
            </p>

            <div class="form-grid">
                <div class="field">
                    <label for="facebook_url">Facebook URL</label>
                    <input id="facebook_url" name="facebook_url" type="url"
                           value="{{ old('facebook_url') }}"
                           placeholder="https://facebook.com/yourpage">
                </div>

                <div class="field">
                    <label for="instagram_url">Instagram URL</label>
                    <input id="instagram_url" name="instagram_url" type="url"
                           value="{{ old('instagram_url') }}"
                           placeholder="https://instagram.com/yourpage">
                </div>
            </div>
        </div>

        <!-- PUBLISHING -->
        <div class="section">
            <h2>7. Website Status</h2>

            <div class="form-grid">
                <div class="field">
                    <label for="status">Status *</label>
                    <select id="status" name="status" required>
                        <option value="draft" @selected(old('status', 'draft') === 'draft')>
                            Draft — Keep hidden
                        </option>
                        <option value="published" @selected(old('status') === 'published')>
                            Published — Make website public
                        </option>
                    </select>
                    <p class="hint">
                        Publish only when the website is ready to be viewed.
                    </p>
                </div>
            </div>
        </div>

        <div class="buttons">
            <button type="submit">Save Business Website</button>

            <a href="{{ route('admin.samples.index') }}" class="back">
                Cancel
            </a>
        </div>
    </form>
</div>
</body>
</html>