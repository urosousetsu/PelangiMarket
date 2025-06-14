{{-- filepath: resources/views/components/navbar.blade.php --}}
<nav class="bg-red-600 sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center py-3 px-4">
        {{-- Logo --}}
        <div class="flex items-center">
            <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="h-10">
            <span class="text-white text-lg font-bold ml-3">PelangiMarket</span>
        </div>

        {{-- Navigation Links --}}
        <div class="hidden md:flex space-x-6 items-center text-white">
            <a href="{{ url('/') }}" class="hover:text-gray-200">Home</a>
            {{-- Dropdown Jenis Motor --}}
            <div class="relative">
                <button id="dropdownJenisMotorButton" data-dropdown-toggle="dropdownJenisMotorMenu"
                    class="hover:text-gray-200 focus:outline-none inline-flex items-center">
                    Jenis Motor
                    <svg class="w-4 h-4 ml-1" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownJenisMotorMenu"
                    class="z-10 hidden absolute bg-white divide-y divide-gray-100 rounded-lg shadow w-36 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownJenisMotorButton">
                        <li>
                            <a href="{{ url('/jenis-motor/vario') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">vario</a>
                        </li>
                        <li>
                            <a href="{{ url('/jenis-motor/beat') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">beat</a>
                        </li>
                    </ul>
                </div>
            </div>


            {{-- Dropdown --}}
            <div class="relative">
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdownMenu"
                    class="hover:text-gray-200 focus:outline-none inline-flex items-center">
                    Semua Produk
                    <svg class="w-4 h-4 ml-1" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownMenu"
                    class="z-10 hidden absolute bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="{{ route('suku-cadang') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Suku
                                Cadang</a>
                        </li>
                        <li>
                            <a href="{{ route('aksesoris') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Aksesoris</a>
                        </li>
                    </ul>
                </div>
            </div>

            <a href="{{ route('keranjang') }}" class="hover:text-gray-200">Keranjang</a>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="hover:text-gray-200 bg-transparent border-none p-0 m-0 cursor-pointer">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>
