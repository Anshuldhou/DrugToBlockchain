<!-- resources/views/drugs/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drug Management</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM6om9z5QO4PJ0nIEUIQvXRNVmRa7UpjTVIpupP" crossorigin="anonymous">
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
    </style>
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-5 bg-white shadow-md rounded-lg">
    <h2 class="text-3xl font-bold mb-6 text-center">Drug Management System</h2>

    @if (session('success'))
        <div class="alert alert-success mb-4 bg-green-100 text-green-700 font-semibold p-3 rounded">
            {{ session('success') }}
        </div>
    @endif
    @auth
        <!-- Display Logout Link Only If User Is Authenticated -->
        <div class="flex justify-end mb-4">
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

    @endauth

    <!-- Center the button -->
    <div class="mb-4 flex justify-center">
        <a href="{{ route('drugs.create') }}" class="btn btn-primary bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add New Drug</a>
    </div>

    @auth
        <div class="text-center">
            <!-- Logout Form -->
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</button>
            </form>

            <p class="text-lg mt-4">To view the list of existing drugs, click the button below:</p>
            <a href="{{ route('drugs.index') }}" class="mt-2 inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                <i class="fas fa-list"></i> See Drug List
            </a>
        </div>

        <!-- Drug List -->
        <div class="container mx-auto mt-5 p-5 bg-white shadow-lg rounded-lg">
            <h2 class="text-3xl font-bold mb-6 text-center">Drug List</h2>

            <table class="min-w-full bg-white">
                <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Manufacturer</th>
                    <th class="py-2 px-4 border-b">Batch Number</th>
                    <th class="py-2 px-4 border-b">Expiry Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($drugs as $drug)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $drug->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $drug->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $drug->manufacturer }}</td>
                        <td class="py-2 px-4 border-b">{{ $drug->batch_number }}</td>
                        <td class="py-2 px-4 border-b">{{ $drug->expiry_date }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="mt-4 text-center">
            <p class="text-lg">Please log in to view the list of existing drugs.</p>
        </div>
    @endauth
</div>
</body>
</html>
