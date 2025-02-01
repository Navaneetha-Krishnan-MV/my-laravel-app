<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto px-6 py-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Product List</h1>

        <!-- Success Message -->
        <div>
            @if(session()->has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <!-- Product Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="px-6 py-3 text-left text-sm font-medium">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Name</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Qty</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Price</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Description</th>
                        <th class="px-6 py-3 text-center text-sm font-medium">Edit</th>
                        <th class="px-6 py-3 text-center text-sm font-medium">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr class="hover:bg-gray-100 border-b border-gray-200">
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $product->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $product->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $product->qty }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $product->price }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $product->description }}</td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('product.edit', $product->id) }}" class="text-blue-500 hover:text-blue-700 font-medium">Edit</a>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <form action="{{ route('product.destroy' , ['product' => $product]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
