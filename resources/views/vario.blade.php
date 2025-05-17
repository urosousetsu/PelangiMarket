@extends('layouts.app')
@section('content')

    <body class="bg-white">
        <div class="flex flex-col md:flex-row items-start justify-center min-h-screen px-4 pt-12" x-data="{ tab: 'mesin', color: 'blue' }">
            <!-- Gambar dan warna -->
            <div class="flex flex-col items-center md:w-1/2">
                <img :src="`{{ asset('assets/vario') }}/vario_${color}.png`" alt="Honda Vario" class="w-80 mb-4">
                <div class="text-blue-900 font-bold text-lg mb-1">DELUXE MATTE
                    <span x-text="color.charAt(0).toUpperCase() + color.slice(1)"></span>
                </div>
                <div class="text-xs bg-yellow-400 px-2 py-1 rounded mb-4 font-semibold">TIPE DELUXE SMART KEY</div>
                <div class="flex space-x-4 mt-2">
                    <div class="w-8 h-8 rounded-full bg-blue-300 border-2 border-gray-300 cursor-pointer"
                        @click="color = 'blue'"></div>
                    <div class="w-8 h-8 rounded-full bg-black border-2 border-gray-300 cursor-pointer"
                        @click="color = 'black'"></div>
                    <div class="w-8 h-8 rounded-full bg-red-600 border-2 border-gray-300 cursor-pointer"
                        @click="color = 'red'"></div>
                </div>
            </div>
            <!-- Spesifikasi -->
            <div class="md:w-1/2 md:mt-0 md:ml-16 mb-6">
                <h1 class="text-3xl font-bold mb-6 text-center md:text-left">Spesifikasi Motor Honda Vario</h1>
                <div>
                    <ul class="flex space-x-6 mb-4 text-gray-700 font-medium">
                        <li>
                            <a href="#" @click.prevent="tab = 'mesin'"
                                :class="tab === 'mesin' ? 'border-b-2 border-red-600 pb-1 text-red-600' :
                                    'hover:text-red-600'">Mesin</a>
                        </li>
                        <li>
                            <a href="#" @click.prevent="tab = 'rangka'"
                                :class="tab === 'rangka' ? 'border-b-2 border-red-600 pb-1 text-red-600' :
                                    'hover:text-red-600'">Rangka
                                & Kaki-Kaki</a>
                        </li>
                        <li>
                            <a href="#" @click.prevent="tab = 'dimensi'"
                                :class="tab === 'dimensi' ? 'border-b-2 border-red-600 pb-1 text-red-600' :
                                    'hover:text-red-600'">Dimensi</a>
                        </li>
                        <li>
                            <a href="#" @click.prevent="tab = 'kapasitas'"
                                :class="tab === 'kapasitas' ? 'border-b-2 border-red-600 pb-1 text-red-600' :
                                    'hover:text-red-600'">Kapasitas</a>
                        </li>
                        <li>
                            <a href="#" @click.prevent="tab = 'kelistrikan'"
                                :class="tab === 'kelistrikan' ? 'border-b-2 border-red-600 pb-1 text-red-600' :
                                    'hover:text-red-600'">Kelistrikan</a>
                        </li>
                    </ul>
                    <div class="relative min-h-[260px] w-full">
                        <!-- Mesin -->
                        <div x-show="tab === 'mesin'" x-transition class="absolute w-full top-0 left-0 flex">
                            <ul class="w-56 space-y-2 text-sm font-semibold text-gray-700">
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
                                <ul class="w-56 space-y-2 text-sm text-gray-700">
                                    <li>4 langkah, SOHC, pendingin cairan</li>
                                    <li>52,4 mm x 57,9 mm</li>
                                    <li>124,8 cc</li>
                                    <li>11:1</li>
                                    <li>8,3 kW (11,3 PS) / 8.500 rpm</li>
                                    <li>10,8 Nm / 5.000 rpm</li>
                                    <li>Otomatis, sentrifugal, tipe kering</li>
                                    <li>Elektrik & kick starter</li>
                                    <li>NGK CPR9EA-9</li>
                                    <li>Injeksi (PGM-FI)</li>
                                    <li>Otomatis, V-Matic</li>
                                    <li>Full Transistorized</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Rangka & Kaki-Kaki -->
                        <div x-show="tab === 'rangka'" x-transition class="absolute w-full top-0 left-0 flex">
                            <ul class="w-56 space-y-2 text-sm font-semibold text-gray-700">
                                <li>Tipe Rangka</li>
                                <li>Suspensi Depan</li>
                                <li>Suspensi Belakang</li>
                                <li>Ukuran Ban Depan</li>
                                <li>Ukuran Ban Belakang</li>
                                <li>Rem Depan</li>
                                <li>Rem Belakang</li>
                            </ul>
                            <div class="ml-6 text-sm text-gray-600">
                                <ul class="w-56 space-y-2 text-sm text-gray-700">
                                    <li>Tulang punggung (underbone)</li>
                                    <li>Teleskopik</li>
                                    <li>Lengan ayun dengan peredam kejut tunggal</li>
                                    <li>80/90 – 14 M/C 40P</li>
                                    <li>90/90 – 14 M/C 46P</li>
                                    <li>Cakram hidrolik dengan piston tunggal</li>
                                    <li>Tromol</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Dimensi -->
                        <div x-show="tab === 'dimensi'" x-transition class="absolute w-full top-0 left-0 flex">
                            <ul class="w-56 space-y-2 text-sm font-semibold text-gray-700">
                                <li>Panjang x Lebar x Tinggi</li>
                                <li>Jarak Sumbu Roda</li>
                                <li>Jarak Terendah ke Tanah</li>
                                <li>Tinggi Tempat Duduk</li>
                                <li>Berat Kosong</li>
                            </ul>
                            <div class="ml-6 text-sm text-gray-600">
                                <ul class="w-56 space-y-2 text-sm text-gray-700">
                                    <li>1.921 mm x 683 mm x 1.096 mm</li>
                                    <li>1.280 mm</li>
                                    <li>140 mm</li>
                                    <li>769 mm</li>
                                    <li>111 kg</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Kapasitas -->
                        <div x-show="tab === 'kapasitas'" x-transition class="absolute w-full top-0 left-0 flex">
                            <ul class="w-56 space-y-2 text-sm font-semibold text-gray-700">
                                <li>Kapasitas Tangki Bahan Bakar</li>
                                <li>Kapasitas Minyak Pelumas</li>
                            </ul>
                            <div class="ml-6 text-sm text-gray-600">
                                <ul class="w-56 space-y-2 text-sm text-gray-700">
                                    <li>5,5 liter</li>
                                    <li>0,8 liter</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Kelistrikan -->
                        <div x-show="tab === 'kelistrikan'" x-transition class="absolute w-full top-0 left-0 flex">
                            <ul class="w-56 space-y-2 text-sm font-semibold text-gray-700">
                                <li>Tipe Aki</li>
                                <li>Sistem Pengapian</li>
                                <li>Tipe Busi</li>
                            </ul>
                            <div class="ml-6 text-sm text-gray-600">
                                <ul class="w-56 space-y-2 text-sm text-gray-700">
                                    <li>MF 12V–5Ah</li>
                                    <li>Full Transistorized</li>
                                    <li>NGK CPR9EA-9</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.10/cdn.min.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    </body>
    @include('components.footer')
@endsection
