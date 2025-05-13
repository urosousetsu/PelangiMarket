{{-- filepath: c:\laragon\www\PelangiMarket\resources\views\components\footer.blade.php --}}
<footer class="bg-gray-100 py-6">
    <div class="container mx-auto text-center">
        {{-- Buttons --}}
        <div class="flex justify-center space-x-4 mb-4">
            <a href="{{ url('/live-chat') }}" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700">
                Live Chat
            </a>
            <a href="{{ url('/keranjang') }}" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700">
                Keranjang
            </a>
        </div>

        {{-- Contact Info --}}
        <div class="text-gray-700">
            <p>
                <span>[</span> pelangimarket@gmail.com <span>]</span>
                <span>[</span> 0895710891000 <span>]</span>
            </p>
        </div>
    </div>
</footer>