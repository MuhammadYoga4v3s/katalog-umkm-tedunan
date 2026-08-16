<x-front-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- Tombol Kembali -->
        <div class="mb-6">
            <a href="{{ route('umkm.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center font-medium">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar UMKM
            </a>
        </div>

        <!-- Profil Toko (Header) -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-10 border-t-4 border-blue-500">
            <div class="p-6 sm:p-8 flex flex-col md:flex-row items-start md:items-center gap-6">
                
                <!-- Foto Profil -->
                <div class="shrink-0">
                    @if($seller->profile_image)
                        <img src="{{ asset('storage/' . $seller->profile_image) }}" alt="{{ $seller->business_name }}" class="w-24 h-24 md:w-32 md:h-32 rounded-full object-cover border-4 border-gray-100 shadow">
                    @else
                        <div class="w-24 h-24 md:w-32 md:h-32 rounded-full bg-blue-100 flex items-center justify-center text-blue-500 text-2xl font-bold border-4 border-white shadow">TOKO</div>
                    @endif
                </div>

                <!-- Info Toko & Tombol WA -->
                <div class="flex-1 w-full">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div>
                            <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900">{{ $seller->business_name }}</h1>
                            <span class="inline-block mt-2 text-sm font-semibold text-blue-700 bg-blue-50 px-3 py-1 rounded-full">{{ $seller->businessCategory->name ?? 'Kategori Umum' }}</span>
                        </div>
                        
                        <!-- Tombol Chat WhatsApp -->
                        <div class="mt-4 md:mt-0">
                            @php
                                // Mengubah format nomor HP (0812...) menjadi format internasional (62812...) agar link WA berfungsi
                                $waNumber = preg_replace('/^0/', '62', $seller->phone);
                                $waText = urlencode("Halo Bapak/Ibu " . $seller->owner_name . ", saya melihat profil UMKM Anda di Katalog Desa Tedunan. Saya ingin bertanya...");
                            @endphp
                            <a href="https://wa.me/{{ $waNumber }}?text={{ $waText }}" target="_blank" class="inline-flex items-center justify-center px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg shadow-sm transition duration-150 w-full md:w-auto">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                                Hubungi Penjual
                            </a>
                        </div>
                    </div>

                    <div class="mt-5 grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600 bg-gray-50 p-4 rounded-lg">
                        <div>
                            <p class="mb-1"><strong class="text-gray-800">Nama Pemilik:</strong> {{ $seller->owner_name }}</p>
                            <p class="mb-1"><strong class="text-gray-800">Alamat Lengkap:</strong> {{ $seller->address }}</p>
                            <p><strong class="text-gray-800">Wilayah:</strong> RT {{ $seller->rt }} / RW {{ $seller->rw }}</p>
                        </div>
                        <div>
                            <p><strong class="text-gray-800">Deskripsi Usaha:</strong></p>
                            <p class="mt-1 text-gray-500 leading-relaxed">{{ $seller->business_description ?? 'Tidak ada deskripsi profil untuk usaha ini.' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Etalase Produk Toko Ini -->
        <div>
            <div class="flex items-center justify-between mb-6 border-b pb-2">
                <h2 class="text-2xl font-bold text-gray-900">Etalase Produk</h2>
                <span class="text-gray-500 text-sm">{{ $products->count() }} produk tersedia</span>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($products as $product)
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow flex flex-col">
                        <a href="{{ route('produk.show', $product->id) }}" class="block relative h-48 bg-gray-100 overflow-hidden group">
                            @if($product->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $product->images->first()->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="flex items-center justify-center h-full text-gray-400">No Image</div>
                            @endif
                        </a>
                        <div class="p-4 flex-1 flex flex-col">
                            <a href="{{ route('produk.show', $product->id) }}" class="text-lg font-bold text-gray-900 hover:text-blue-600 line-clamp-2">
                                {{ $product->name }}
                            </a>
                            <div class="mt-2 text-xl font-extrabold text-green-600">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                            <div class="mt-auto pt-4 flex justify-between items-center text-xs text-gray-500 border-t mt-4">
                                <span>Stok: {{ $product->stock }}</span>
                                <a href="{{ route('produk.show', $product->id) }}" class="text-blue-600 font-semibold hover:underline">Lihat Detail &rarr;</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center bg-white rounded-lg border border-dashed">
                        <svg class="mx-auto h-12 w-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        <p class="text-gray-500 text-lg font-medium">Etalase masih kosong.</p>
                        <p class="text-gray-400 text-sm mt-1">UMKM ini belum mempublikasikan produk apa pun.</p>
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</x-front-layout>