@extends('layouts.app')

@section('content')
    <div class="flex flex-col lg:flex-row gap-6 p-6 bg-gray-100 min-h-screen">
        <div class="w-full lg:w-2/3 bg-white p-4 rounded-xl shadow mx-auto h-full">
            <h2 id="cart-title" class="text-xl font-semibold mb-4">Keranjang (0)</h2>
            <div class="space-y-4">
                <!-- Produk -->
                @if ($cart)
                    @foreach ($cart as $key => $item)
                        <div class="cart-item flex items-center justify-between p-4 border rounded-lg">
                            <div class="flex items-center gap-4">
                                <img src="" alt="Produk A" class="w-16 h-16 object-cover rounded-lg ml-4">
                                <div>
                                    <p class="font-medium">{{ $item['name'] }}</p>
                                    <p class="text-sm text-gray-500">Rp <span class="item-price"
                                            data-id="{{ $key }}">{{ number_format($item['price'], 0, ',', '.') }}</span>
                                    </p>
                                </div>
                            </div>
                            <form action="{{ route('update-cart', $key) }}" method="POST">
                                @csrf
                                <div class="flex items-center gap-2">
                                    <button type="submit" class="decrease px-2 py-1 bg-gray-200 rounded"
                                        data-id="{{ $key }}">-</button>
                                    <span class="item-qty w-5 text-center"
                                        data-id="{{ $key }}">{{ $item['quantity'] }}</span>
                                    <input type="hidden" name="quantity" class="input-qty" data-id="{{ $key }}"
                                        value="{{ $item['quantity'] }}">
                                    <button type="submit" class="increase px-2 py-1 bg-gray-200 rounded"
                                        data-id="{{ $key }}">+</button>
                                </div>
                            </form>
                        </div>
                    @endforeach
                @endif
                {{-- End Produk --}}
            </div>
        </div>

        <!-- Kanan: Bill -->
        <div class="w-full lg:w-1/3 bg-white p-6 rounded-xl shadow self-start ">
            <h2 class="text-xl font-semibold mb-4">Ringkasan Pembelian</h2>
            <div id="summary-items" class="space-y-2 text-sm">
            </div>
            <hr class="my-2">
            <div class="flex justify-between font-semibold">
                <span>Total</span>
                <span id="summary-total">Rp 0</span>
            </div>
            <button class="mt-6 w-full inline-block bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                Checkout
            </button>
        </div>

    </div>

    <script>
        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(number);
        }

        function updateSummary() {
            const cartItems = document.querySelectorAll('.cart-item');
            const summaryContainer = document.getElementById('summary-items');
            const summaryTotal = document.getElementById('summary-total');

            summaryContainer.innerHTML = '';
            let total = 0;

            cartItems.forEach(item => {
                const id = item.querySelector('.item-qty').getAttribute('data-id');
                const name = item.querySelector('p.font-medium').textContent;
                const qty = item.querySelector(`.item-qty[data-id="${id}"]`).textContent;
                const price = parseInt(item.querySelector(`.item-price[data-id="${id}"]`).textContent.toString()
                    .replace(
                        /\./g, ''));
                const subtotal = qty * price;
                total += subtotal;

                const row = document.createElement('div');
                row.className = 'flex justify-between';
                row.innerHTML = `<span>${name} x ${qty}</span><span>${formatRupiah(subtotal)}</span>`;
                summaryContainer.appendChild(row);
            });

            summaryTotal.textContent = formatRupiah(total);
        }

        function updateTotalItems() {
            const qtyElements = document.querySelectorAll(".item-qty");
            let total = 0;
            qtyElements.forEach(el => {
                total += parseInt(el.textContent);
            });
            document.getElementById("cart-title").textContent = `Keranjang (${total})`;
        }

        function setupQtyButtons() {
            document.querySelectorAll(".increase").forEach(button => {
                button.addEventListener("click", () => {
                    const id = button.getAttribute("data-id");
                    const qtySpan = document.querySelector(`.item-qty[data-id="${id}"]`);
                    const inputQty = document.querySelector(`.input-qty[data-id="${id}"]`);
                    let qty = parseInt(qtySpan.textContent);
                    qty++;
                    qtySpan.textContent = qty;
                    if (inputQty) inputQty.value = qty;
                    updateTotalItems();
                    updateSummary();
                });
            });

            document.querySelectorAll(".decrease").forEach(button => {
                button.addEventListener("click", () => {
                    const id = button.getAttribute("data-id");
                    const qtySpan = document.querySelector(`.item-qty[data-id="${id}"]`);
                    const inputQty = document.querySelector(`.input-qty[data-id="${id}"]`);
                    let qty = parseInt(qtySpan.textContent);
                    if (qty > 0) {
                        qty--;
                        qtySpan.textContent = qty;
                        if (inputQty) inputQty.value = qty;
                        updateTotalItems();
                        updateSummary();
                    }
                });
            });
        }

        window.addEventListener("DOMContentLoaded", () => {
            setupQtyButtons();
            updateTotalItems();
            updateSummary();
        });
    </script>
@endsection
