
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Digi BizSites | Build Your Online Store</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    <nav class="navbar">
        <a href="/" class="logo">Digi BizSites.</a>

<div class="nav-links">
        <a href="#features">Features</a>
        <a href="#how-it-works">How It Works</a>
        <a href="/sample-websites">Sample Websites</a>
        <a href="{{ route('client.login') }}">Login</a>
        <a href="/client-register" class="nav-button">Register</a>
    </div>
    </nav>

    <section class="hero">
        <div class="hero-content">

            <div class="tag">
                YOUR BUSINESS. YOUR WEBSITE.
            </div>

            <h1>
                Your dream business deserves a
                <span>beautiful website.</span>
            </h1>

            <p class="hero-description">
                Turn your small business into an online store.
                Showcase your products, customise your design,
                and reach more customers — without writing a
                single line of code.
            </p>

            <a href="#how-it-works" class="primary-button">
                Create My Website &rarr;
            </a>

            <a href="#features" class="secondary-button">
                Explore Features
            </a>

        </div>

       
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
        alt="Creative paintings and artwork"
    >

    <img
        class="slide slide-4"
        src="{{ asset('images/handmade.jfif') }}"
        alt="Handmade products"
    >

    <div class="slider-overlay">
        <span>MADE FOR YOUR DREAMS</span>
        <h2>Every small business has a story.</h2>
        <p>Give your story a beautiful place online.</p>
    </div>

    <div class="slider-label">Discover. Create. Grow.</div>

</div>


    </section>

    <section class="features" id="features">

        <div class="section-label">MADE FOR SMALL BUSINESSES</div>

        <h2>Everything you need to grow online</h2>

        <p class="section-description">
            Simple tools to bring your business to the digital world.
        </p>

        <div class="feature-grid">

            <div class="feature-card">
                <div class="feature-icon">&#127912;</div>
                <h3>Design Your Way</h3>
                <p>
                    Choose a beautiful template and customise
                    your colours, logo, images and text.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">&#128722;</div>
                <h3>Your Online Store</h3>
                <p>
                    Add your products, set prices and let
                    customers explore your collection online.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">&#128241;</div>
                <h3>Reach More Customers</h3>
                <p>
                    Share your own store link and let customers
                    discover your business from their devices.
                </p>
            </div>

        </div>
    </section>

    <section class="how-it-works" id="how-it-works">

        <div class="section-label">YOUR JOURNEY STARTS HERE</div>

        <h2>Start small. Dream big.</h2>

        <p class="section-description">
            Your business deserves a place of its own online.
            Build your store one step at a time.
        </p>

        <a href="#features" class="primary-button">
            Let's Get Started &rarr;
        </a>

    </section>

    <footer>
        &copy; 2026 DIGI BizSites. Built for small business dreams.
    </footer>

</body>
</html>
