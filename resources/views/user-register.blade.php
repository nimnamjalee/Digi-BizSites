 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Registration | Digi BizSites</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f7f6ff;
            color: #25213b;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 7%;
            background: white;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #7161e8;
            text-decoration: none;
        }

        .nav-links a {
            margin-left: 20px;
            text-decoration: none;
            color: #39334e;
        }

        .nav-button {
            padding: 10px 18px;
            border-radius: 8px;
            background: #7161e8;
            color: white !important;
        }

        .register-section {
            padding: 55px 20px;
        }

        .register-container {
            max-width: 650px;
            margin: auto;
            padding: 38px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 12px 40px rgba(55, 40, 110, 0.09);
        }

        .register-heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .tag {
            color: #7161e8;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1.3px;
        }

        .register-heading h1 {
            margin: 15px 0 10px;
            font-size: 32px;
        }

        .register-heading h1 span {
            color: #7161e8;
        }

        .register-heading p {
            color: #777286;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 9px;
            font-weight: 600;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #dedbea;
            border-radius: 9px;
            font-size: 15px;
            font-family: Arial, sans-serif;
            outline: none;
            background: white;
            color: #25213b;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 90px;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #7161e8;
            box-shadow: 0 0 0 3px rgba(113, 97, 232, 0.1);
        }

        .register-button {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            background: #7161e8;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .register-button:hover {
            background: #5c4bd1;
        }

        .login-link {
            text-align: center;
            margin-top: 22px;
            color: #777286;
        }

        .login-link a {
            color: #7161e8;
            font-weight: bold;
            text-decoration: none;
        }

        .error-message {
            padding: 12px 16px;
            margin-bottom: 20px;
            background: #fff0f0;
            color: #c62828;
            border-radius: 8px;
        }

        .success-message {
            padding: 12px 16px;
            margin-bottom: 20px;
            background: #effaf0;
            color: #237a35;
            border-radius: 8px;
            text-align: center;
        }

        footer {
            padding: 25px;
            text-align: center;
            color: #777286;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            .register-container {
                padding: 25px 20px;
            }

            .register-heading h1 {
                font-size: 27px;
            }

            .navbar {
                padding: 18px 5%;
            }

            .logo {
                font-size: 21px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <a href="/" class="logo">Digi BizSites.</a>

        <div class="nav-links">
            <a href="/">Home</a>
            <a href="{{ route('client.login') }}" class="nav-button">
                Login
            </a>
        </div>
    </nav>

    <section class="register-section">
        <div class="register-container">

            <div class="register-heading">
                <div class="tag">WELCOME TO DIGI BIZSITES</div>

                <h1>Create Your <span>Account</span></h1>

                <p>
                    Create your account and start your journey
                    with Digi BizSites today.
                </p>
            </div>

            @if (session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="error-message">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('user.register.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter your full name"
                        autocomplete="name"
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
                        autocomplete="email"
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
                        autocomplete="tel"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea
                        id="address"
                        name="address"
                        placeholder="Enter your address"
                        autocomplete="street-address"
                        rows="3"
                    >{{ old('address') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Minimum 8 characters"
                        autocomplete="new-password"
                        minlength="8"
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
                        placeholder="Enter your password again"
                        autocomplete="new-password"
                        minlength="8"
                        required
                    >
                </div>

                <button type="submit" class="register-button">
                    Create Account
                </button>

                <p class="login-link">
                    Already have an account?
                    <a href="{{ route('client.login') }}">Login here</a>
                </p>

            </form>
        </div>
    </section>

    <footer>
        &copy; 2026 Digi BizSites. Built for small business dreams.
    </footer>

</body>
</html>
