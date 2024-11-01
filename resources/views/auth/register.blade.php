<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container mx-auto mt-5 p-5 bg-white shadow-md rounded-lg">
    <h2 class="text-3xl font-bold mb-6 text-center">Register</h2>

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="block font-semibold">Name</label>
            <input type="text" id="name" name="name" required class="input input-bordered w-full">
        </div>

        <div class="mb-4">
            <label for="email" class="block font-semibold">Email</label>
            <input type="email" id="email" name="email" required class="input input-bordered w-full">
        </div>

        <div class="mb-4">
            <label for="password" class="block font-semibold">Password</label>
            <input type="password" id="password" name="password" required class="input input-bordered w-full">
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block font-semibold">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required class="input input-bordered w-full">
        </div>

        <button type="submit" class="btn btn-primary bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Register</button>
    </form>
</div>
</body>
</html>
