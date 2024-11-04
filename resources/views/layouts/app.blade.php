<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Drug Management System')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM6om9z5QO4PJ0nIEUIQvXRNVmRa7UpjTVIpupP" crossorigin="anonymous">
    <style>
        html, body { height: 100%; margin: 0; }
        body { display: flex; justify-content: center; align-items: center; }
    </style>
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-5 bg-white shadow-md rounded-lg">
    <!-- Content section -->
    @yield('content')
</div>
</body>
</html>
