@extends('layouts.app')

@section('content')

<div class="px-8 py-6 flex items-center justify-between">
        <h1 class="text-3xl font-bold text-black pb-2">
            Aksesoris
        </h1>
        <form action="{{ route('aksesoris-search') }}" method="GET" class="flex items-center">
            <input
                type="text"
                name="q"
                placeholder="Cari aksesoris..."
                class="border border-red-300 rounded-l-lg px-4 py-2 outline-none"
                value="{{ request('q') }}"
            >
            <button
                type="submit"
                class="bg-red-600 hover:bg-red-500 text-white px-4 py-2 rounded-r-lg"
            >
                Cari
            </button>
        </form>
    </div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 py-2 px-8">
  @foreach ($allAksesoris as $data)
  <form action="{{ route('store-cart', $data->id) }}" method="POST" class="h-full">
    @csrf
  <div class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col h-full">
    <img class="w-full h-48 object-cover" src="/assets/products_img/{{ $data->image }}"
                    alt="{{ $data->image }}" />
    <div class="p-4 flex flex-col flex-grow">
      <h2 class="text-xl font-semibold text-gray-800 mb-2 line-clamp-3 min-h-[5rem]">{{ $data->name }}</h2>
      <p class="text-lg text-red-500 font-bold mb-4">Rp {{ number_format($data->price, 0, ',', '.') }}</p>
      <div class="mt-auto space-y-2">
        <button type="submit"
          class="w-full bg-red-600 hover:bg-red-500 text-white py-2 rounded-lg">Masukkan ke keranjang</button>
      </div>
    </div>
  </div>
  </form>
  @endforeach
</div>

@endsection