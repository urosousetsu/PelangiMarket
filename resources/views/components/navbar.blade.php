{{-- filepath: resources/views/components/navbar.blade.php --}}
<nav class="bg-red-600 relative z-50">
    <div class="container mx-auto flex justify-between items-center py-3 px-4">
        {{-- Logo --}}
        <div class="flex items-center">
            <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="h-10">
            <span class="text-white text-lg font-bold ml-3">PelangiMarket</span>
        </div>

        {{-- Search Bar --}}
        <div class="hidden md:flex items-center space-x-4">
            <form action="{{ url('/search') }}" method="GET" class="flex">
                <input type="text" name="query" placeholder="Cari produk..."
                    class="px-4 py-2 rounded-l-md focus:outline-none focus:ring-2 focus:ring-red-400">
                <button type="submit" class="bg-white text-red-600 px-4 py-2 rounded-r-md hover:bg-gray-200">
                    Cari
                </button>
            </form>
        </div>

        {{-- Navigation Links --}}
        <div class="hidden md:flex space-x-6 items-center text-white">
            <a href="{{ url('/') }}" class="hover:text-gray-200">Home</a>
            <a href="{{ url('/types') }}" class="hover:text-gray-200">Jenis Motor</a>

            {{-- Dropdown --}}
            <div class="relative">
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdownMenu"
                    class="hover:text-gray-200 focus:outline-none inline-flex items-center">
                    Semua Produk
                    <svg class="w-4 h-4 ml-1" aria-hidden="true" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownMenu"
                    class="z-10 hidden absolute bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="{{ url('/suku-cadang') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Suku
                                Cadang</a>
                        </li>
                        <li>
                            <a href="{{ url('/aksesoris') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Aksesoris</a>
                        </li>
                    </ul>
                </div>
            </div>

            <a href="{{ url('/keranjang') }}" class="hover:text-gray-200">Keranjang</a>
            <a href="{{ url('/dealer') }}" class="hover:text-gray-200">Chat</a>
        </div>
    </div>
</nav>
