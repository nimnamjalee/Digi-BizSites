<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Login | Digi BizSites</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6fb;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .login-box {
            background: white;
            padding: 35px;
            border-radius: 12px;
            width: 350px;
            max-width: calc(100% - 50px);
            box-shadow: 0 4px 20px #00000012;
        }

        h2 {
            text-align: center;
            color: #292c55;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input {
            box-sizing: border-box;
            width: 100%;
            padding: 12px;
            margin-top: 7px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 22px;
            background: #5146e5;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .message {
            color: #16803c;
        }

        .error {
            color: #dc2626;
        }

        .links {
            text-align: center;
            margin-top: 18px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Digi BizSites</h2>
        <p style="text-align:center;">Login to your account</p>

        @if (session('success'))
            <p class="message">{{ session('success') }}</p>
        @endif

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('client.login.submit') }}" method="POST">
            @csrf

            <label for="email">Email Address</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
            >

            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                required
            >

            <button type="submit">Login</button>
        </form>

        <div class="links">
            <p>Don't have an account?</p>
            
<a href="{{ route('user.register') }}">Register here</a>

            <p><a href="{{ url('/') }}">Back to Home</a></p>
        </div>
    </div>
</body>
</html>
