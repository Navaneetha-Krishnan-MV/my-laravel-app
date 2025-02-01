<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit a Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit a Product</h1>
        <form action="{{ route('product.update', ['product' => $product]) }}" method="POST" class="space-y-6">
            @csrf
            @method('put')
            <div class="flex flex-col">
                <label for="name" class="mb-2 text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter product name" value="{{$product->name}}">
            </div>
            <div class="flex flex-col">
                <label for="qty" class="mb-2 text-sm font-medium text-gray-700">Quantity</label>
                <input type="text" name="qty" id="qty" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter quantity" value="{{$product->qty}}">
            </div>
            <div class="flex flex-col">
                <label for="price" class="mb-2 text-sm font-medium text-gray-700">Price</label>
                <input type="text" name="price" id="price" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter price" value="{{$product->price}}">
            </div>
            <div class="flex flex-col">
                <label for="description" class="mb-2 text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter description">{{$product->description}}</textarea>

            </div>
            <div class="text-center">
                <button type="submit" class="w-full bg-blue-500 text-white font-medium py-3 px-6 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Update Product</button>
            </div>
        </form>
    </div>
</body>
</html>
