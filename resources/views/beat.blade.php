@extends('layouts.app')
@section('content')

    <body class="bg-white">
        <div class="flex flex-col md:flex-row items-center justify-center min-h-screen px-4">
            <!-- Gambar dan warna -->
            <div class="flex flex-col items-center md:w-1/2">
                <img src="{{ asset('assets/beat.png') }}" alt="Honda BeAT" class="w-80 mb-4">
                <div class="text-blue-900 font-bold text-lg mb-1">DELUXE MATTE BLUE</div>
                <div class="text-xs bg-yellow-400 px-2 py-1 rounded mb-4 font-semibold">TIPE DELUXE SMART KEY</div>
                <div class="flex space-x-4 mt-2">
                    <div class="w-8 h-8 rounded-full bg-blue-300 border-2 border-gray-300"></div>
                    <div class="w-8 h-8 rounded-full bg-green-900 border-2 border-gray-300"></div>
                    <div class="w-8 h-8 rounded-full bg-black border-2 border-gray-300"></div>
                    <div class="w-8 h-8 rounded-full bg-red-600 border-2 border-gray-300"></div>
                </div>
            </div>
            <!-- Spesifikasi -->
            <div class="md:w-1/2 mt-8 md:mt-0 md:ml-16">
                <h1 class="text-3xl font-bold mb-6 text-center md:text-left">Spesifikasi Motor Honda BeAT</h1>
                <div>
                    <ul class="flex space-x-6 mb-4 text-gray-700 font-medium">
                        <li><a href="#" class="border-b-2 border-red-600 pb-1">Mesin</a></li>
                        <li><a href="#" class="hover:text-red-600">Rangka & Kaki-Kaki</a></li>
                        <li><a href="#" class="hover:text-red-600">Dimensi</a></li>
                        <li><a href="#" class="hover:text-red-600">Kapasitas</a></li>
                        <li><a href="#" class="hover:text-red-600">Kelistrikan</a></li>
                    </ul>
                    <div class="flex">
                        <ul class="w-48 space-y-2 text-sm font-semibold text-gray-700">
                            <li>Tipe Mesin</li>
                            <li>Diameter x Langkah</li>
                            <li>Volume Langkah</li>
                            <li>Perbandingan Kompresi</li>
                            <li>Daya Maksimum</li>
                            <li>Torsi Maksimum</li>
                            <li>Kopling</li>
                            <li>Starter</li>
                            <li>Busi</li>
                            <li>Sistem Bahan Bakar</li>
                            <li>Transmisi</li>
                            <li>Sistem Pengapian</li>
                        </ul>
                        <div class="ml-6 text-sm text-gray-600">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                            but also the leap into electronic typesetting, remaining essentially unchanged. It was
                            popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                            and more recently with desktop publishing software like Aldus PageMaker including versions of
                            Lorem Ipsum.
                        </div>
                    </div>
                </div>
                <button
                    class="mt-8 w-full bg-red-600 text-white font-bold py-3 rounded-full text-lg hover:bg-red-700 transition">Purchase</button>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    </body>
    @include('components.footer')
@endsection
