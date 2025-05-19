{{-- filepath: c:\laragon\www\PelangiMarket\resources\views\homepage.blade.php --}}
@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <div class="relative">
        <img src="{{ asset('assets/hero-image.jpg') }}" alt="Hero Image" class="w-full h-[500px] object-cover">
        <div class="absolute inset-0 flex flex-col justify-center items-center bg-black bg-opacity-50 text-white">
            <h1 class="text-4xl font-bold">Pelangi Market</h1>
            <p class="mt-4 text-lg">Honda Genuine Parts</p>
            <p class="mt-4 text-lg">semua kebutuhan motor Anda ada di sini</p>
        </div>

    </div>

    {{-- Produk Section --}}
    <div class="container mx-auto my-10">
        <h2 class="text-center text-2xl font-semibold mb-6">Produk Kami</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow-md p-4 text-center">
                <img src="{{ asset('assets/suku.png') }}" alt="sukucadang" class="w-full h-60 object-cover rounded-md">
                <h5 class="mt-4 text-lg font-bold">Suku Cadang</h5>
                <a href="{{ route('suku-cadang') }}"
                    class="mt-4 inline-block bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Selengkapnya</a>
            </div>
            <div class="bg-white rounded-lg shadow-md p-4 text-center">
                <img src="{{ asset('assets/acc.png') }}" alt="accesories" class="w-full h-60 object-cover rounded-md">
                <h5 class="mt-4 text-lg font-bold">Accesories</h5>
                <a href="{{ route('aksesoris') }}"
                    class="mt-4 inline-block bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Selengkapnya</a>
            </div>
        </div>
    </div>

    <!-- Contact Us -->
    @include('components.footer')
@endsection
