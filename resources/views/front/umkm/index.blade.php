<x-front-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900">Daftar UMKM Desa Tedunan</h1>
            <p class="mt-2 text-gray-600">Temukan berbagai pelaku usaha lokal yang siap melayani Anda.</p>
        </div>

        <!-- Form Pencarian & Filter -->
        <div class="bg-white p-4 rounded-lg shadow mb-8 border-t-4 border-blue-500">
            <form action="{{ route('umkm.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4">
                <!-- Cari Nama -->
                <div class="md:col-span-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama toko/UMKM..." class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <!-- Filter Kategori -->
                <div>
                    <select name="kategori" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('kategori') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Filter RT & RW -->
                <div class="flex space-x-2">
                    <input type="text" name="rt" value="{{ request('rt') }}" placeholder="RT (Mis: 01)" class="w-1/2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <input type="text" name="rw" value="{{ request('rw') }}" placeholder="RW (Mis: 02)" class="w-1/2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <!-- Tombol Cari -->
                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-150">Cari</button>
                </div>
            </form>
        </div>

        <!-- Grid UMKM -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($sellers as $seller)
                <div class="bg-white border rounded-lg shadow-sm hover:shadow-md transition-shadow p-5 flex flex-col">
                    <div class="flex items-center space-x-4 mb-4">
                        <!-- Foto Profil UMKM -->
                        @if($seller->profile_image)
                            <img src="{{ asset('storage/' . $seller->profile_image) }}" alt="{{ $seller->business_name }}" class="w-16 h-16 rounded-full object-cover border">
                        @else
                            <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center text-blue-500 text-xs font-bold border border-blue-200">TOKO</div>
                        @endif
                        
                        <!-- Nama & Kategori -->
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 leading-tight">{{ $seller->business_name }}</h3>
                            <span class="inline-block mt-1 text-xs font-semibold text-blue-700 bg-blue-50 px-2 py-1 rounded">{{ $seller->businessCategory->name ?? 'Umum' }}</span>
                        </div>
                    </div>
                    
                    <!-- Info Pemilik & Lokasi -->
                    <div class="text-sm text-gray-600 flex-1 mb-4 space-y-1">
                        <p><span class="font-semibold text-gray-800">Pemilik:</span> {{ $seller->owner_name }}</p>
                        <p><span class="font-semibold text-gray-800">Lokasi:</span> RT {{ $seller->rt }} / RW {{ $seller->rw }}</p>
                    </div>
                    
                    <!-- Tombol Detail -->
                    <a href="{{ route('umkm.show', $seller->id) }}" class="w-full text-center block bg-gray-50 hover:bg-gray-100 text-blue-600 font-semibold py-2 rounded border border-gray-200 transition duration-150">
                        Lihat Profil & Produk
                    </a>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-gray-500 bg-white rounded-lg border border-dashed">
                    Maaf, tidak ada UMKM yang sesuai dengan pencarian Anda.
                </div>
            @endforelse
        </div>

        <!-- Navigasi Halaman (Pagination) -->
        <div class="mt-8">
            {{ $sellers->links() }}
        </div>

    </div>
</x-front-layout>