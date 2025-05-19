@extends('layouts.app')

@section('content')

<div class="px-4 py-6 align-content-center text-center">
  <h1 class="text-3xl font-bold text-black pb-2">
    Aksesoris
  </h1>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 py-2 px-8">
  @foreach ($allAksesoris as $data)
  <div class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col">
    <img class="w-full h-48 object-cover" src="https://via.placeholder.com/300x200" alt="{{ $data->image }}" />
    <div class="p-4 flex flex-col flex-grow">
      <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $data->name }}</h2>
      <p class="text-lg text-red-500 font-bold mb-4">Rp {{ number_format($data->price, 0, ',', '.') }}</p>
      <div class="mt-auto space-y-2">
        <button class="w-full bg-red-600 hover:bg-red-500 text-white py-2 rounded-lg">Masukkan ke keranjang</button>
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection