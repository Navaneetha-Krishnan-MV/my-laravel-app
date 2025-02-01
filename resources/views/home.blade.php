<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Image Generator</title>
    @vite(['resources/css/home.scss', 'resources/js/app.js'])
</head>
<body>

    <div class="container">
        <h1>Welcome to Image Generator</h1>
        <p>Your AI-powered image creation tool. Create amazing images from text prompts!</p>
        
        @if (Auth::check())
            <a href="{{ route('image.index') }}" class="btn">Generate Image</a>
            <a href="{{ route('logout') }}" >Logout</a>
        @else
            <div class="auth-links">
                <a href="{{ route('login') }}" >Login</a>
                <a href="{{ route('register') }}" >Sign Up</a>
            </div>
        @endif
    </div>

</body>
</html>
