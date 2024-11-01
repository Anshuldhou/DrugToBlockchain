<!-- resources/views/drugs/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Drug</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
<div class="container mx-auto mt-5 p-5 bg-white shadow-lg rounded-lg">
    <h2 class="text-3xl font-bold mb-6 text-center">Edit Drug</h2>

    @if (session('success'))
        <div class="alert alert-success mb-4 bg-green-100 text-green-700 font-semibold p-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('drugs.update', $drug->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="name" class="block text-gray-700 font-medium mb-2">Drug Name</label>
            <input type="text" class="input input-bordered w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="name" name="name" value="{{ $drug->name }}" required>
        </div>

        <div class="mb-6">
            <label for="manufacturer" class="block text-gray-700 font-medium mb-2">Manufacturer</label>
            <input type="text" class="input input-bordered w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="manufacturer" name="manufacturer" value="{{ $drug->manufacturer }}" required>
        </div>

        <div class="mb-6">
            <label for="batch_number" class="block text-gray-700 font-medium mb-2">Batch Number</label>
            <input type="text" class="input input-bordered w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="batch_number" name="batch_number" value="{{ $drug->batch_number }}" required>
        </div>

        <div class="mb-6">
            <label for="expiry_date" class="block text-gray-700 font-medium mb-2">Expiry Date</label>
            <input type="date" class="input input-bordered w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="expiry_date" name="expiry_date" value="{{ $drug->expiry_date }}" required>
        </div>

        <div class="flex justify-between">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200">Update Drug</button>
            <a href="{{ route('drugs.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition duration-200">Back</a>
        </div>
    </form>
</div>
</body>
</html>
