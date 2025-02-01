<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Image</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
    <div class="d-flex justify-content-end">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
    <h1 class="text-center">Generate Image from Prompt</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('image.generate') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="prompt" class="form-label">Enter a Prompt</label>
                <input type="text" name="prompt" id="prompt" class="form-control" placeholder="Describe your image..." value="{{ $prompt ?? '' }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Generate Image</button>
        </form>

        @if (isset($imageSrc))
            <div class="mt-4 text-center">
                <h2>Generated Image:</h2>
                <img src="{{ $imageSrc }}"  alt="Generated Image"  style="height: 450px; width: 450px;" class="img-fluid mt-3">
            </div>
        @endif
    </div>
</body>
</html>
