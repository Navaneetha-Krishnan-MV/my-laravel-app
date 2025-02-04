<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Image Generator</title>
    <style>
        :root {
            --primary-color: rgb(14, 18, 216);
            --bg-color: #f4f4f9;
            --container-bg: white;
            --container-padding: 30px;
            --container-radius: 8px;
            --box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            --max-width: 400px;
            --text-color: #333;
            --secondary-text-color: #666;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--bg-color);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background-color: var(--container-bg);
            padding: var(--container-padding);
            border-radius: var(--container-radius);
            box-shadow: var(--box-shadow);
            width: 100%;
            max-width: var(--max-width);
        }

        h1 {
            margin-bottom: 20px;
            color: var(--text-color);
        }

        p {
            margin-bottom: 20px;
            color: var(--secondary-text-color);
        }

        .auth-links {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .auth-links a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: bold;
        }

        .auth-links a:hover {
            text-decoration: underline;
        }

        .btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: rgb(10, 14, 180);
        }

        .form-group {
            text-align: left;
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
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
