<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $website->title }}</title>

    <style>
        :root {
            --primary: {{ $website->primary_color ?? '#7161e8' }};
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #25253a;
            background: #fff;
        }

        /* HEADER */

        header {
            padding: 16px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
            border-bottom: 1px solid #eee;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 22px;
            font-weight: bold;
        }

        .logo {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        nav a {
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }

        nav a:hover {
            color: var(--primary);
        }

        /* HERO SECTION */

        .hero {
            padding: 65px 7%;
            text-align: center;
            background: #f7f5ff;
        }

        .hero h1 {
            font-size: clamp(30px, 5vw, 52px);
            margin: 0 0 16px;
        }

        .hero p {
            max-width: 650px;
            margin: auto;
            line-height: 1.7;
            color: #68687b;
        }

        .primary-button {
            display: inline-block;
            margin-top: 24px;
            padding: 13px 24px;
            background: var(--primary);
            color: white;
            border-radius: 8px;
            text-decoration: none;
        }

        .primary-button:hover {
            opacity: 0.9;
        }

        /* BANNER IMAGE */

        .banner {
            width: 100%;
            max-height: 380px;
            object-fit: cover;
            display: block;
        }

        /* GENERAL SECTIONS */

        .section {
            padding: 45px 7%;
        }

        .section h2 {
            text-align: center;
            margin: 0 0 30px;
            font-size: 28px;
        }

        /* PRODUCTS GRID */

        .products {
            display: grid;
            grid-template-columns: repeat(
                auto-fill,
                minmax(180px, 220px)
            );
            justify-content: center;
            gap: 20px;
        }

        /* PRODUCT CARD */

        .product {
            border: 1px solid #eee;
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
            padding-bottom: 14px;
            transition: transform 0.2s ease,
                        box-shadow 0.2s ease;
        }

        .product:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 18px #00000010;
        }

        /* PRODUCT IMAGE */

        .product-image-container {
            width: 100%;
            height: 180px;
            padding: 10px;
            background: #f8f8f8;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }

        .product-image-placeholder {
            color: #999;
            font-size: 13px;
            text-align: center;
        }

        /* PRODUCT DETAILS */

        .product h3 {
            margin: 12px 12px 8px;
            font-size: 16px;
            line-height: 1.4;
            overflow-wrap: anywhere;
        }

        .product-description {
            margin: 0 12px 10px;
            color: #68687b;
            font-size: 13px;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .price {
            margin: 10px 12px;
            color: var(--primary);
            font-weight: bold;
            font-size: 16px;
        }

        /* STOCK STATUS */

        .stock {
            margin: 10px 12px 0;
            font-size: 13px;
            font-weight: 600;
        }

        .in-stock {
            color: #16803d;
        }

        .low-stock {
            color: #b7791f;
        }

        .out-of-stock {
            color: #dc2626;
        }

        /* CONTACT SECTION */

        .contact {
            background: #f8f8fc;
            line-height: 1.9;
        }

        .contact h2 {
            margin-bottom: 20px;
        }

        .contact p {
            max-width: 700px;
            margin: 8px auto;
            overflow-wrap: anywhere;
        }

        .contact a {
            color: var(--primary);
        }

        /* FOOTER */

        footer {
            padding: 24px;
            text-align: center;
            background: #25253a;
            color: white;
            font-size: 14px;
        }

        /* TABLET */

        @media (max-width: 768px) {
            header {
                padding: 15px 5%;
            }

            .section {
                padding: 35px 5%;
            }

            .hero {
                padding: 50px 5%;
            }

            .products {
                grid-template-columns: repeat(
                    auto-fill,
                    minmax(160px, 1fr)
                );
                gap: 14px;
            }

            .product-image-container {
                height: 165px;
            }
        }

        /* MOBILE */

        @media (max-width: 420px) {
            .brand {
                font-size: 18px;
            }

            .logo {
                width: 40px;
                height: 40px;
            }

            nav {
                gap: 14px;
            }

            .products {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 10px;
            }

            .product-image-container {
                height: 140px;
                padding: 7px;
            }

            .product h3 {
                font-size: 14px;
                margin: 10px 9px 6px;
            }

            .product-description {
                font-size: 12px;
                margin: 0 9px 8px;
            }

            .price {
                font-size: 14px;
                margin: 8px 9px;
            }

            .stock {
                font-size: 12px;
                margin: 8px 9px 0;
            }

            .section h2 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->

    <header>
        <div class="brand">

            @if ($website->logo_path)
                <img
                    class="logo"
                    src="{{ asset('storage/' . $website->logo_path) }}"
                    alt="{{ $website->title }} logo"
                >
            @endif

            <span>{{ $website->title }}</span>
        </div>

        <nav>
            <a href="#home">Home</a>
            <a href="#products">Products</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>


    <!-- BANNER -->

    @if ($website->homepage_banner_path)
        <img
            class="banner"
            src="{{ asset('storage/' . $website->homepage_banner_path) }}"
            alt="Business banner"
        >
    @endif


    <!-- HOMEPAGE -->

    <section class="hero" id="home">

        <h1>
            {{ $website->homepage_heading ?: $website->title }}
        </h1>

        <p>
            {{ $website->homepage_description ?: $website->description }}
        </p>

        <a href="#products" class="primary-button">
            Explore Our Products
        </a>

    </section>


    <!-- PRODUCTS -->

    <section class="section" id="products">

        <h2>Our Products</h2>

        @if ($products->isEmpty())

            <p style="text-align: center;">
                Products will be available soon.
            </p>

        @else

            <div class="products">

                @foreach ($products as $product)

                    <article class="product">

                        <!-- Product image -->

                        <div class="product-image-container">

                            @if ($product->image_path)

                                <img
                                    class="product-image"
                                    src="{{ asset('storage/' . $product->image_path) }}"
                                    alt="{{ $product->name }}"
                                    loading="lazy"
                                >

                            @else

                                <span class="product-image-placeholder">
                                    No image available
                                </span>

                            @endif

                        </div>


                        <!-- Product name -->

                        <h3>{{ $product->name }}</h3>


                        <!-- Product description -->

                        @if ($product->description)

                            <p class="product-description">
                                {{ $product->description }}
                            </p>

                        @endif


                        <!-- Product price -->

                        <p class="price">
                            Rs. {{ number_format((float) $product->price, 2) }}
                        </p>


                        <!-- Stock quantity -->

                        @if (!$product->is_available || $product->stock_quantity <= 0)

                            <p class="stock out-of-stock">
                                Out of Stock
                            </p>

                        @elseif ($product->stock_quantity <= 5)

                            <p class="stock low-stock">
                                Only {{ $product->stock_quantity }} left
                            </p>

                        @else

                            <p class="stock in-stock">
                                In Stock: {{ $product->stock_quantity }}
                            </p>

                        @endif

                    </article>

                @endforeach

            </div>

        @endif

    </section>


    <!-- CONTACT -->

    <section class="section contact" id="contact">

        <h2>Contact Us</h2>

        @if ($website->business_phone)
            <p>
                <strong>Phone:</strong>
                {{ $website->business_phone }}
            </p>
        @endif

        @if ($website->business_email)
            <p>
                <strong>Email:</strong>
                {{ $website->business_email }}
            </p>
        @endif

        @if ($website->business_address)
            <p>
                <strong>Address:</strong>
                {{ $website->business_address }}
            </p>
        @endif

        @if ($website->location)
            <p>
                <strong>Location:</strong>
                {{ $website->location }}
            </p>
        @endif

        @if ($website->opening_days)
            <p>
                <strong>Opening Days:</strong>
                {{ $website->opening_days }}
            </p>
        @endif

        @if ($website->opening_time && $website->closing_time)

            <p>
                <strong>Opening Hours:</strong>

                {{ \Illuminate\Support\Carbon::parse($website->opening_time)->format('h:i A') }}

                -

                {{ \Illuminate\Support\Carbon::parse($website->closing_time)->format('h:i A') }}
            </p>

        @endif

        @if ($website->facebook_url)

            <p>
                <a
                    href="{{ $website->facebook_url }}"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    Facebook
                </a>
            </p>

        @endif

        @if ($website->instagram_url)

            <p>
                <a
                    href="{{ $website->instagram_url }}"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    Instagram
                </a>
            </p>

        @endif

    </section>


    <!-- FOOTER -->

    <footer>
        &copy; {{ date('Y') }}
        {{ $website->title }}.
        All rights reserved.
    </footer>

</body>
</html>
