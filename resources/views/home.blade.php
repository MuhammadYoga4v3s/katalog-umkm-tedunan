<x-front-layout>
    <!-- Hero Section -->
    <div class="bg-blue-50 py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                <span class="block text-gray-900">Katalog Digital UMKM</span>
                <span class="block text-blue-600 mt-2">Desa Tedunan</span>
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-base text-gray-500 sm:text-lg md:text-xl">
                Temukan berbagai produk unggulan, kerajinan tangan, dan kuliner khas langsung dari para pelaku usaha lokal. Dukung pertumbuhan ekonomi desa dengan berbelanja produk lokal!
            </p>
            <div class="mt-8 max-w-md mx-auto sm:flex sm:justify-center">
                <div class="rounded-md shadow">
                    <a href="{{ route('produk.index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10">
                        Lihat Produk
                    </a>
                </div>
                <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                    <a href="{{ route('umkm.index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                        Daftar UMKM
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Produk Terbaru -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Produk Terbaru</h2>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">Koleksi produk terbaru yang langsung diunggah oleh warga desa.</p>
        </div>

        <!-- Grid Produk -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($latestProducts as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col">
                    <!-- Gambar Produk -->
                    <a href="{{ route('produk.show', $product->id) }}" class="block relative h-48 overflow-hidden bg-gray-200">
                        @if($product->images->isNotEmpty())
                            <img src="{{ asset('storage/' . $product->images->first()->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="flex items-center justify-center h-full text-gray-400">No Image</div>
                        @endif
                    </a>
                    
                    <!-- Info Produk -->
                    <div class="p-4 flex-1 flex flex-col">
                        <div class="text-xs text-blue-500 font-semibold mb-1">{{ $product->productCategory->name ?? 'Kategori Umum' }}</div>
                        <a href="{{ route('produk.show', $product->id) }}" class="block mt-1 text-lg leading-tight font-bold text-gray-900 hover:text-blue-600">
                            {{ $product->name }}
                        </a>
                        <p class="mt-2 text-gray-600 text-sm flex-1">{{ Str::limit($product->description, 60) }}</p>
                        
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-lg font-bold text-green-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            <span class="text-xs text-gray-500">Toko: {{ $product->seller->business_name }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-10 text-gray-500">
                    Belum ada produk yang dipublikasikan.
                </div>
            @endforelse
        </div>
        
        @if($latestProducts->isNotEmpty())
        <div class="mt-10 text-center">
            <a href="{{ route('produk.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                Lihat Semua Produk
            </a>
        </div>
        @endif
    </div>
</x-front-layout>