
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Digi BizSites | Shop, Sell & Grow Online</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

    {{-- NAVIGATION --}}
    <nav class="navbar">
        <a href="/" class="logo">Digi BizSites.</a>

        <div class="nav-links">
            <a href="#marketplace">Shop</a>
            <a href="#sell">Sell With Us</a>
            <a href="#website-builder">Build a Website for you</a>
            <a href="{{ route('samples.websites') }}">Sample Websites</a>
            <a href="{{ route('client.login') }}">Login</a>
            <a href="{{ route('user.register') }}" class="nav-button">
                Register
            </a>
        </div>
    </nav>


    {{-- HERO SECTION --}}
    <section class="hero">

        <div class="hero-content">

            <div class="tag">
                SHOP. SELL. BUILD YOUR BUSINESS.
            </div>

            <h1>
                One platform.
                <span>Endless possibilities.</span>
            </h1>

            <p class="hero-description">
                Discover products, shop from small businesses, sell your own
                products, or create a beautiful online store.
                Digi BizSites brings customers, sellers and suppliers together
                in one place.
            </p>

            <div class="hero-actions">
                <a href="#marketplace" class="primary-button">
                    Start Shopping &rarr;
                </a>

                <a href="#sell" class="secondary-button">
                    Start Selling
                </a>
            </div>

            <div class="hero-benefits">
                <span>
                    <i class="fa-solid fa-bag-shopping"></i>
                    Shop Online
                </span>

                <span>
                    <i class="fa-solid fa-store"></i>
                    Sell Products
                </span>

                <span>
                    <i class="fa-solid fa-globe"></i>
                    Build Your Store
                </span>
            </div>

        </div>


        {{-- EXISTING IMAGE SLIDER --}}
        <div class="hero-slider">

            <img
                class="slide slide-1"
                src="{{ asset('images/candals.jfif') }}"
                alt="Beautiful homemade cakes"
            >

            <img
                class="slide slide-2"
                src="{{ asset('images/clothing.jfif') }}"
                alt="Fashion and clothing"
            >

            <img
                class="slide slide-3"
                src="{{ asset('images/cake 2.jfif') }}"
                alt="Creative products and artwork"
            >

            <img
                class="slide slide-4"
                src="{{ asset('images/handmade.jfif') }}"
                alt="Handmade products"
            >

            <div class="slider-overlay">
                <span>MADE FOR YOUR DREAMS</span>
                <h2>Every small business has a story.</h2>
                <p>Give your products a beautiful place online.</p>
            </div>

            <div class="slider-label">
                Discover. Create. Grow.
            </div>

        </div>

    </section>


    {{-- MARKETPLACE SECTION --}}
    <section class="marketplace-section" id="marketplace">

        <div class="section-label">DISCOVER SOMETHING YOU LOVE</div>

        <h2>Welcome to Our Marketplace</h2>

        <p class="section-description">
            Explore products from Digi BizSites and independent small businesses.
            Find something special and support local sellers.
        </p>

        <div class="marketplace-grid">

            <div class="marketplace-card">
                <div class="marketplace-image">
                    <img
                        src="{{ asset('images/clothing.jfif') }}"
                        alt="Clothing and fashion"
                        loading="lazy"
                    >
                </div>

                <div class="marketplace-card-content">
                    <span class="category-label">FASHION</span>
                    <h3>Clothing & Accessories</h3>
                    <p>
                        Discover fashion items and accessories from small businesses.
                    </p>
                    <a href="{{ route('client.login') }}" class="text-link">
                        Explore Products <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>


            <div class="marketplace-card">
                <div class="marketplace-image">
                    <img
                        src="{{ asset('images/candals.jfif') }}"
                        alt="Cakes and food products"
                        loading="lazy"
                    >
                </div>

                <div class="marketplace-card-content">
                    <span class="category-label">FOOD & TREATS</span>
                    <h3>Cakes & Homemade Products</h3>
                    <p>
                        Find creative homemade treats and products from local sellers.
                    </p>
                    <a href="{{ route('client.login') }}" class="text-link">
                        Explore Products <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>


            <div class="marketplace-card">
                <div class="marketplace-image">
                    <img
                        src="{{ asset('images/handmade.jfif') }}"
                        alt="Handmade products"
                        loading="lazy"
                    >
                </div>

                <div class="marketplace-card-content">
                    <span class="category-label">HANDMADE</span>
                    <h3>Handmade & Creative Items</h3>
                    <p>
                        Discover unique handmade items and creative products.
                    </p>
                    <a href="{{ route('client.login') }}" class="text-link">
                        Explore Products <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

        </div>

        <div class="marketplace-note">
            <i class="fa-solid fa-circle-info"></i>
            These are category previews. Actual products, prices and shopping
            cart functionality can be connected to the product database.
        </div>

    </section>


    {{-- CUSTOMER BENEFITS --}}
    <section class="features" id="features">

        <div class="section-label">A BETTER WAY TO SHOP ONLINE</div>

        <h2>Everything you need in one place</h2>

        <p class="section-description">
            Shop easily, discover small businesses and manage your shopping
            experience from one platform.
        </p>

        <div class="feature-grid">

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fa-solid fa-bag-shopping"></i>
                </div>

                <h3>Explore Products</h3>

                <p>
                    Discover products from our own store and independent sellers
                    in one convenient marketplace.
                </p>
            </div>


            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>

                <h3>Your Shopping Cart</h3>

                <p>
                    Add products to your cart, review your selections and get
                    ready to place your order.
                </p>
            </div>


            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fa-solid fa-user-check"></i>
                </div>

                <h3>Your Customer Account</h3>

                <p>
                    Register for an account and build a more convenient shopping
                    experience.
                </p>
            </div>

        </div>

    </section>


    {{-- SELLER SECTION --}}
    <section class="seller-section" id="sell">

        <div class="seller-content">

            <div class="section-label">YOUR BUSINESS, YOUR OPPORTUNITY</div>

            <h2>Have products to sell?</h2>

            <p>
                Join Digi BizSites and introduce your products to more customers.
                Whether you make your own products or source products from
                suppliers, you can grow your business through our platform.
            </p>

            <div class="seller-benefits">

                <div>
                    <i class="fa-solid fa-check-circle"></i>
                    Sell your own products
                </div>

                <div>
                    <i class="fa-solid fa-check-circle"></i>
                    Source products from suppliers
                </div>

                <div>
                    <i class="fa-solid fa-check-circle"></i>
                    Manage your product collection
                </div>

                <div>
                    <i class="fa-solid fa-check-circle"></i>
                    Create your own online store
                </div>

            </div>

            <a href="{{ route('user.register') }}" class="primary-button">
                Become a Seller &rarr;
            </a>

        </div>

        <div class="seller-visual">
            <div class="seller-visual-icon">
                <i class="fa-solid fa-store"></i>
            </div>

            <h3>Turn Your Products Into a Business</h3>

            <p>
                Start with your products. Grow at your own pace.
            </p>

            <div class="seller-mini-stats">
                <div>
                    <i class="fa-solid fa-box-open"></i>
                    <span>Your Products</span>
                </div>

                <div>
                    <i class="fa-solid fa-users"></i>
                    <span>Your Customers</span>
                </div>

                <div>
                    <i class="fa-solid fa-chart-line"></i>
                    <span>Your Growth</span>
                </div>
            </div>
        </div>

    </section>


    {{-- SUPPLIER SECTION --}}
    <section class="supplier-section" id="suppliers">

        <div class="supplier-icon">
            <i class="fa-solid fa-truck-fast"></i>
        </div>

        <div class="supplier-content">
            <div class="section-label">FOR PRODUCT SUPPLIERS</div>

            <h2>Supply products. Reach more sellers.</h2>

            <p>
                Do you manufacture, produce or supply products?
                Digi BizSites aims to connect suppliers with businesses that
                need products to sell. Suppliers can offer their product
                collections to the platform and participating sellers.
            </p>

            <a href="{{ route('user.register') }}" class="secondary-button">
                Join Our Platform &rarr;
            </a>
        </div>

    </section>


    {{-- WEBSITE BUILDER SECTION --}}
    <section class="website-builder-section" id="website-builder">

        <div class="section-label">MORE THAN A MARKETPLACE</div>

        <h2>Create a Store of Your Own</h2>

        <p class="section-description">
            Want your own business website as well?
            Choose a design, customise your website and showcase your products
            through your own online store.
        </p>

        <div class="builder-steps">

            <div class="builder-step">
                <div class="builder-step-number">01</div>
                <i class="fa-solid fa-palette"></i>
                <h3>Choose a Design</h3>
                <p>
                    Explore website samples and choose a style for your business.
                </p>
            </div>

            <div class="builder-step">
                <div class="builder-step-number">02</div>
                <i class="fa-solid fa-pen-to-square"></i>
                <h3>Customise Your Store</h3>
                <p>
                    Add your logo, images, business information and products.
                </p>
            </div>

            <div class="builder-step">
                <div class="builder-step-number">03</div>
                <i class="fa-solid fa-globe"></i>
                <h3>Showcase Your Products</h3>
                <p>
                    Present your business online and share your website with customers.
                </p>
            </div>

        </div>

        <a href="{{ route('samples.websites') }}" class="primary-button">
            Explore Sample Websites &rarr;
        </a>

    </section>


    {{-- HOW IT WORKS --}}
    <section class="how-it-works" id="how-it-works">

        <div class="section-label">YOUR JOURNEY STARTS HERE</div>

        <h2>Shop, sell and grow with Digi BizSites.</h2>

        <p class="section-description">
            Whether you are a customer, seller or supplier, there is a place
            for you here. Create an account and discover the possibilities.
        </p>

        <div class="final-actions">
            <a href="{{ route('client.login') }}" class="primary-button">
                Login to Your Account &rarr;
            </a>

            <a href="{{ route('user.register') }}" class="secondary-button">
                Join Digi BizSites
            </a>
        </div>

    </section>


    {{-- FOOTER --}}
    <footer class="site-footer">

        <a href="/" class="footer-logo">Digi BizSites.</a>

        <p>
            Shop online. Support small businesses. Build your own store.
        </p>

        <div class="footer-links">
            <a href="#marketplace">Shop</a>
            <a href="#sell">Sell With Us</a>
            <a href="#suppliers">Suppliers</a>
            <a href="#website-builder">Website Builder</a>
            <a href="{{ route('samples.websites') }}">Sample Websites</a>
        </div>

        <p class="copyright">
            &copy; {{ date('Y') }} Digi BizSites. Built for small business dreams.
        </p>

    </footer>

</body>
</html>
