<x-front-layout>
    <!-- Hero Section -->
    <div class="bg-blue-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold sm:text-5xl">Tentang Program Ini</h1>
            <p class="mt-4 text-xl text-blue-100 max-w-3xl mx-auto">Digitalisasi UMKM Desa Tedunan: Inovasi, Kolaborasi, dan Pemberdayaan Ekonomi Lokal oleh Mahasiswa KKN.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Statistik Section -->
        <div class="bg-white rounded-lg shadow-lg -mt-24 p-6 sm:p-10 mb-16 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div>
                    <div class="text-4xl font-extrabold text-blue-600">{{ $totalUMKM }}</div>
                    <div class="mt-2 text-sm font-medium text-gray-500 uppercase tracking-wide">UMKM Bergabung</div>
                </div>
                <div>
                    <div class="text-4xl font-extrabold text-blue-600">{{ $totalProduk }}</div>
                    <div class="mt-2 text-sm font-medium text-gray-500 uppercase tracking-wide">Produk Lokal</div>
                </div>
                <div>
                    <div class="text-4xl font-extrabold text-blue-600">{{ $totalKategori }}</div>
                    <div class="mt-2 text-sm font-medium text-gray-500 uppercase tracking-wide">Kategori Usaha</div>
                </div>
            </div>
        </div>

        <!-- Profil KKN & Desa -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Profil UMKM Desa Tedunan</h2>
                <div class="text-gray-600 space-y-4 leading-relaxed">
                    <p>Desa Tedunan memiliki potensi ekonomi mikro yang sangat luar biasa. Mulai dari kerajinan tangan, produk olahan hasil bumi, hingga kuliner khas yang dibuat langsung oleh tangan-tangan terampil warga desa.</p>
                    <p>Melalui program Kuliah Kerja Nyata (KKN) ini, kami berinisiatif untuk membangun sebuah platform katalog digital. Tujuannya adalah untuk menjembatani pelaku UMKM desa dengan pasar yang lebih luas, mempermudah promosi, dan mendigitalisasi pendataan usaha warga.</p>
                    <p>Kami berharap platform ini dapat terus digunakan dan dikelola oleh desa, sehingga menjadi katalisator pertumbuhan ekonomi warga Desa Tedunan ke depannya.</p>
                </div>
            </div>
            <!-- Placeholder Foto Tim/Desa -->
            <div class="bg-gray-200 rounded-lg h-80 flex items-center justify-center border-4 border-white shadow-xl overflow-hidden">
                <!-- Nanti ganti path src ini dengan foto asli kalian -->
                <img src="https://via.placeholder.com/600x400?text=Foto+Bersama+KKN+dan+Warga" alt="Foto Kegiatan KKN" class="w-full h-full object-cover">
            </div>
        </div>

        <!-- Galeri Dokumentasi -->
        <div>
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900">Galeri Dokumentasi</h2>
                <p class="mt-2 text-gray-500">Momen kegiatan pendampingan dan survei UMKM di Desa Tedunan.</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <!-- Foto 1 -->
                <div class="bg-gray-200 rounded-lg aspect-w-4 aspect-h-3 overflow-hidden shadow">
                    <img src="https://via.placeholder.com/400x300?text=Dokumentasi+1" alt="Dokumentasi 1" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <!-- Foto 2 -->
                <div class="bg-gray-200 rounded-lg aspect-w-4 aspect-h-3 overflow-hidden shadow">
                    <img src="https://via.placeholder.com/400x300?text=Dokumentasi+2" alt="Dokumentasi 2" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <!-- Foto 3 -->
                <div class="bg-gray-200 rounded-lg aspect-w-4 aspect-h-3 overflow-hidden shadow">
                    <img src="https://via.placeholder.com/400x300?text=Dokumentasi+3" alt="Dokumentasi 3" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <!-- Foto 4 -->
                <div class="bg-gray-200 rounded-lg aspect-w-4 aspect-h-3 overflow-hidden shadow md:hidden lg:block">
                    <img src="https://via.placeholder.com/400x300?text=Dokumentasi+4" alt="Dokumentasi 4" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <!-- Foto 5 -->
                <div class="bg-gray-200 rounded-lg aspect-w-4 aspect-h-3 overflow-hidden shadow hidden md:block">
                    <img src="https://via.placeholder.com/400x300?text=Dokumentasi+5" alt="Dokumentasi 5" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <!-- Foto 6 -->
                <div class="bg-gray-200 rounded-lg aspect-w-4 aspect-h-3 overflow-hidden shadow hidden md:block">
                    <img src="https://via.placeholder.com/400x300?text=Dokumentasi+6" alt="Dokumentasi 6" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
            </div>
        </div>

    </div>
</x-front-layout>