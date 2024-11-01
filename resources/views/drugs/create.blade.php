<!-- resources/views/drugs/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Drug</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Ensure this links to your compiled Tailwind CSS -->
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
<div class="container mx-auto p-8 bg-white shadow-lg rounded-lg">
    <h2 class="text-5xl font-bold text-blue-700 mb-6 text-center">Add a New Drug</h2> <!-- Increased font size to 5xl -->

    @if (session('success'))
        <div class="alert alert-success mb-4 bg-green-100 text-green-700 font-semibold p-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Drug Form -->
    <form action="{{ route('drugs.store') }}" method="POST">
        @csrf
        <div class="mb-6">
            <label for="name" class="block text-gray-700 font-medium mb-2">Drug Name</label>
            <input type="text" class="input input-bordered w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-6">
            <label for="manufacturer" class="block text-gray-700 font-medium mb-2">Manufacturer</label>
            <input type="text" class="input input-bordered w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="manufacturer" name="manufacturer" value="{{ old('manufacturer') }}" required>
        </div>

        <div class="mb-6">
            <label for="batch_number" class="block text-gray-700 font-medium mb-2">Batch Number</label>
            <input type="text" class="input input-bordered w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="batch_number" name="batch_number" value="{{ old('batch_number') }}" required>
        </div>

        <div class="mb-6">
            <label for="expiry_date" class="block text-gray-700 font-medium mb-2">Expiry Date</label>
            <input type="date" class="input input-bordered w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="expiry_date" name="expiry_date" value="{{ old('expiry_date') }}" required>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 transition duration-200">Add Drug</button>
    </form>

    <div class="mt-4 text-center">
        <a href="{{ route('drugs.index') }}" class="text-blue-600 hover:underline">Back to Drug List</a>
    </div>
</div>
</body>
</html>
