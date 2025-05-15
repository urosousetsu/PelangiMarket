{{-- filepath: c:\laragon\www\PelangiMarket\resources\views\layouts\app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelangi Market</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('pelangi-market.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html {
            scroll-behavior: smooth;
            font-family: Poppins, Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    {{-- Include Navbar --}}
    @include('components.navbar')
    @include('components.wa-btn')

    {{-- Main Content --}}
    <main class="container mx-auto py-6">
        @yield('content')
    </main>

    {{-- Flowbite JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>