<x-front-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900">Katalog Produk Lokal</h1>
            <p class="mt-2 text-gray-600">Jelajahi dan temukan berbagai produk unggulan langsung dari pengrajin dan pembuatnya.</p>
        </div>

        <!-- Form Pencarian & Filter Produk -->
        <div class="bg-white p-4 rounded-lg shadow mb-8 border-t-4 border-green-500">
            <form action="{{ route('produk.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Cari Nama Produk -->
                <div class="md:col-span-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama produk atau barang..." class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                </div>
                <!-- Filter Kategori -->
                <div>
                    <select name="kategori" class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('kategori') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Tombol Cari -->
                <div>
                    <button type="submit" class="w-full bg-green-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-700 transition duration-150">Cari Produk</button>
                </div>
            </form>
        </div>

        <!-- Grid Produk -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($products as $product)
                <div class="bg-white rounded-lg shadow-sm hover:shadow-xl transition-shadow duration-300 flex flex-col border border-gray-100 overflow-hidden">
                    
                    <!-- Gambar Produk -->
                    <a href="{{ route('produk.show', $product->id) }}" class="block relative h-56 overflow-hidden bg-gray-100 group">
                        @if($product->images->isNotEmpty())
                            <img src="{{ asset('storage/' . $product->images->first()->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="flex items-center justify-center h-full text-gray-400">No Image</div>
                        @endif
                    </a>
                    
                    <!-- Info Produk -->
                    <div class="p-5 flex-1 flex flex-col">
                        <div class="flex justify-between items-start mb-2">
                            <span class="text-xs font-semibold text-green-700 bg-green-50 px-2 py-1 rounded">{{ $product->productCategory->name ?? 'Umum' }}</span>
                        </div>
                        
                        <a href="{{ route('produk.show', $product->id) }}" class="block mt-1 text-lg font-bold text-gray-900 hover:text-green-600 line-clamp-2">
                            {{ $product->name }}
                        </a>
                        
                        <!-- Nama Toko -->
                        <p class="mt-1 text-sm text-gray-500 flex items-center">
                            <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            <a href="{{ route('umkm.show', $product->seller_id) }}" class="hover:text-blue-600 hover:underline">{{ $product->seller->business_name }}</a>
                        </p>
                        
                        <!-- Harga -->
                        <div class="mt-auto pt-4 flex items-center justify-between">
                            <span class="text-xl font-extrabold text-green-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-16 text-center bg-white rounded-lg border border-dashed">
                    <svg class="mx-auto h-12 w-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <p class="text-gray-500 text-lg font-medium">Pencarian tidak ditemukan.</p>
                    <p class="text-gray-400 text-sm mt-1">Coba gunakan kata kunci lain atau ubah kategori.</p>
                </div>
            @endforelse
        </div>

        <!-- Navigasi Halaman (Pagination) -->
        <div class="mt-10">
            {{ $products->links() }}
        </div>

    </div>
</x-front-layout>