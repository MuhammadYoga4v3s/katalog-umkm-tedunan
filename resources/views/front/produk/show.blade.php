<x-front-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- Tombol Kembali -->
        <div class="mb-6">
            <a href="{{ route('produk.index') }}" class="text-green-600 hover:text-green-800 flex items-center font-medium">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Katalog Produk
            </a>
        </div>

        <!-- Alerts -->
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        @if($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm">
                <ul class="list-disc ml-5">
                    @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
        @endif

        <!-- Detail Produk Utama -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-10 border-t-4 border-green-500">
            <div class="p-6 sm:p-8 grid grid-cols-1 md:grid-cols-2 gap-10">
                
                <!-- Galeri Foto Produk (Alpine.js) -->
                @php
                    $firstImage = $product->images->isNotEmpty() ? asset('storage/' . $product->images->first()->image) : null;
                @endphp
                <div x-data="{ mainImage: '{{ $firstImage }}' }">
                    <!-- Foto Utama -->
                    <div class="bg-gray-100 rounded-lg overflow-hidden border aspect-w-1 aspect-h-1 mb-4">
                        @if($firstImage)
                            <img :src="mainImage" alt="{{ $product->name }}" class="w-full h-96 object-cover">
                        @else
                            <div class="w-full h-96 flex items-center justify-center text-gray-400">Belum ada foto</div>
                        @endif
                    </div>
                    
                    <!-- Thumbnail (Foto Kecil) -->
                    @if($product->images->count() > 1)
                    <div class="flex space-x-2 overflow-x-auto pb-2">
                        @foreach($product->images as $img)
                            <button @click="mainImage = '{{ asset('storage/' . $img->image) }}'" class="shrink-0 border-2 border-transparent hover:border-green-500 focus:border-green-500 rounded-md overflow-hidden">
                                <img src="{{ asset('storage/' . $img->image) }}" class="w-20 h-20 object-cover">
                            </button>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Info Teks Produk -->
                <div class="flex flex-col">
                    <span class="text-sm font-semibold text-green-700 bg-green-50 px-3 py-1 rounded-full w-max mb-3">{{ $product->productCategory->name ?? 'Umum' }}</span>
                    <h1 class="text-3xl font-extrabold text-gray-900 mb-2">{{ $product->name }}</h1>
                    
                    <div class="text-3xl font-extrabold text-green-600 mb-6">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </div>

                    <div class="bg-gray-50 rounded-lg p-4 mb-6 border">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-gray-600 font-medium">Sisa Stok:</span>
                            <span class="font-bold text-gray-900">{{ $product->stock }} Pcs</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600 font-medium">Dijual Oleh:</span>
                            <a href="{{ route('umkm.show', $product->seller_id) }}" class="font-bold text-blue-600 hover:underline">{{ $product->seller->business_name }}</a>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Deskripsi Produk</h3>
                        <div class="text-gray-600 leading-relaxed whitespace-pre-line">{{ $product->description ?: 'Tidak ada deskripsi untuk produk ini.' }}</div>
                    </div>

                    <!-- Tombol Pesan via WA -->
                    <div class="mt-auto">
                        @php
                            $waNumber = preg_replace('/^0/', '62', $product->seller->phone);
                            $waText = urlencode("Halo, saya tertarik dengan produk *" . $product->name . "* seharga Rp" . number_format($product->price, 0, ',', '.') . " yang ada di Katalog Desa Tedunan. Apakah masih tersedia?");
                        @endphp
                        <a href="https://wa.me/{{ $waNumber }}?text={{ $waText }}" target="_blank" class="w-full flex items-center justify-center px-8 py-4 bg-green-600 hover:bg-green-700 text-white text-lg font-bold rounded-lg shadow transition duration-150">
                            <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                            Pesan via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Ulasan & Rating -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Daftar Ulasan -->
            <div class="md:col-span-2">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Ulasan Pelanggan ({{ $product->reviews->count() }})</h2>
                
                <div class="space-y-6">
                    @forelse($product->reviews as $review)
                        <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-100">
                            <div class="flex items-center justify-between mb-2">
                                <span class="font-bold text-gray-900">{{ $review->visitor_name }}</span>
                                <span class="text-xs text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                            </div>
                            <!-- Bintang -->
                            <div class="flex text-yellow-400 mb-3 text-sm">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->rating)
                                        ★
                                    @else
                                        <span class="text-gray-300">★</span>
                                    @endif
                                @endfor
                            </div>
                            <p class="text-gray-600">{{ $review->comment }}</p>
                        </div>
                    @empty
                        <div class="bg-gray-50 p-8 rounded-lg text-center text-gray-500 border border-dashed">
                            Belum ada ulasan. Jadilah yang pertama memberikan ulasan!
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Form Tambah Ulasan -->
            <div class="md:col-span-1">
                <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-yellow-400 sticky top-5">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Tulis Ulasan</h3>
                    <form action="{{ route('produk.review', $product->id) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nama Anda</label>
                            <input type="text" name="visitor_name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Email (Tidak dipublikasikan)</label>
                            <input type="email" name="visitor_email" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Rating Bintang</label>
                            <select name="rating" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                                <option value="5">⭐⭐⭐⭐⭐ (5 - Sangat Bagus)</option>
                                <option value="4">⭐⭐⭐⭐ (4 - Bagus)</option>
                                <option value="3">⭐⭐⭐ (3 - Cukup)</option>
                                <option value="2">⭐⭐ (2 - Kurang)</option>
                                <option value="1">⭐ (1 - Sangat Kurang)</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Komentar & Pengalaman</label>
                            <textarea name="comment" rows="4" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-2 px-4 rounded-md shadow-sm transition duration-150">
                            Kirim Ulasan
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-front-layout>