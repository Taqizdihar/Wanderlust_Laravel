<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h1>Sign In</h1>
            <p class="subtitle">Welcome Back, Traveler</p>

            @if($errors->has('login_error'))
                <div class="error">{{ $errors->first('login_error') }}</div>
            @endif

            <form method="POST" action="{{ url('/login') }}">
                @csrf
                <label>Username</label>
                <input type="text" name="username" value="{{ old('username') }}" required>

                <label>Password</label>
                <input type="password" name="password" required>

                <a href="#" class="forgot">Forgot password</a>

                <button type="submit" class="btn">Login</button>
            </form>

            <p class="signup-text">
                Don’t have an account?
                <a href="/register">Sign up</a>
            </p>

            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Wanderlust">
            </div>
        </div>
    </div>
</body>
</html>
