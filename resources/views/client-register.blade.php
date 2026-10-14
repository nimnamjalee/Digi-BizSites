
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Client Registration | Digi BizSites</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <nav class="navbar">
        <a href="/" class="logo">Digi BizSites.</a>

        <div class="nav-links">
            <a href="/">Home</a>
            <a href="/login" class="nav-button">Login</a>
        </div>
    </nav>

    <section class="register-section">

        <div class="register-container">

            <div class="register-heading">
                <div class="tag">YOUR BUSINESS JOURNEY STARTS HERE</div>

                <h1>Create Your <span>Account</span></h1>

                <p>
                    Join Digi BizSites and bring your business
                    to the digital world.
                </p>
            </div>

            @if (session('success'))
                <p style="color: green; text-align: center;">
                    {{ session('success') }}
                </p>
            @endif

            @if ($errors->any())
                <div style="color: red; margin-bottom: 20px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('client.register.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter your full name"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="business_name">Business Name</label>
                    <input
                        type="text"
                        id="business_name"
                        name="business_name"
                        value="{{ old('business_name') }}"
                        placeholder="Enter your business name"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Enter your email address"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input
                        type="tel"
                        id="phone"
                        name="phone"
                        value="{{ old('phone') }}"
                        placeholder="Enter your phone number"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Create a password (minimum 8 characters)"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password_confirmation">
                        Confirm Password
                    </label>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Confirm your password"
                        required
                    >
                </div>

                <button type="submit" class="register-button">
                    Create Account
                </button>

                <p class="login-link">
                    Already have an account?
                    <a href="/login">Login here</a>
                </p>

            </form>

        </div>

    </section>

    <footer>
        &copy; 2026 Digi BizSites. Built for small business dreams.
    </footer>

</body>
</html>
