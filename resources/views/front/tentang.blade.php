<x-front-layout>
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-green-700 via-green-800 to-emerald-900 text-white py-16 sm:py-20 relative overflow-hidden">
        <!-- Dekorasi latar belakang tipis -->
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:16px_16px]"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <span class="bg-green-600/50 text-green-100 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-widest border border-green-500/30">
                Profil & Program Kerja
            </span>
            <h1 class="mt-4 text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight">Tentang Desa Tedunan & KKN-T</h1>
            <p class="mt-3 text-base sm:text-xl text-green-100 max-w-3xl mx-auto px-2 leading-relaxed">
                Digitalisasi UMKM Desa Tedunan: Inovasi, Kolaborasi, dan Pemberdayaan Ekonomi Lokal Menuju Lumbung Mandiri.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        
        <!-- Statistik Section (Grid Card Mengambang) -->
        <div class="bg-white rounded-2xl shadow-xl -mt-20 sm:-mt-24 p-6 sm:p-10 mb-12 sm:mb-16 relative z-10 border border-gray-100">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 sm:gap-8 text-center divide-y sm:divide-y-0 sm:divide-x divide-gray-100">
                <div class="p-4">
                    <div class="text-3xl sm:text-4xl font-extrabold text-green-700">{{ $totalUMKM }}</div>
                    <div class="mt-1 text-xs sm:text-sm font-bold text-gray-500 uppercase tracking-wider">UMKM Bergabung</div>
                </div>
                <div class="p-4 pt-6 sm:pt-4">
                    <div class="text-3xl sm:text-4xl font-extrabold text-green-700">{{ $totalProduk }}</div>
                    <div class="mt-1 text-xs sm:text-sm font-bold text-gray-500 uppercase tracking-wider">Produk Lokal</div>
                </div>
                <div class="p-4 pt-6 sm:pt-4">
                    <div class="text-3xl sm:text-4xl font-extrabold text-green-700">{{ $totalKategori }}</div>
                    <div class="mt-1 text-xs sm:text-sm font-bold text-gray-500 uppercase tracking-wider">Kategori Usaha</div>
                </div>
            </div>
        </div>

        <!-- Profil KKN & Potensi Desa -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center mb-16">
            <div class="lg:col-span-7 space-y-4">
                <div class="inline-flex items-center space-x-2 text-green-700 font-semibold text-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    <span>Mengenal Lebih Dekat Desa Tedunan</span>
                </div>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-gray-900 leading-tight">
                    Potensi Mikro dan Semangat Kemandirian Warga Desa
                </h2>
                <div class="text-gray-600 space-y-4 leading-relaxed text-sm sm:text-base">
                    <p>
                        Desa Tedunan memiliki potensi ekonomi mikro yang sangat luar biasa. Mulai dari kerajinan tangan, produk olahan hasil bumi, hingga kuliner khas yang dibuat langsung oleh tangan-tangan terampil warga desa.
                    </p>
                    <p>
                        Melalui program Kuliah Kerja Nyata Tematik (KKN-T) UNDIP 2026, kami berinisiatif untuk membangun sebuah platform katalog digital. Tujuannya adalah untuk menjembatani pelaku UMKM desa dengan pasar yang lebih luas, mempermudah promosi online, dan mendigitalisasi pendataan usaha warga.
                    </p>
                    <p>
                        Dengan adanya sistem ini, kami berharap platform katalog dapat terus dikelola secara berkelanjutan oleh Pemerintah Desa Tedunan, menjadi katalisator pertumbuhan ekonomi, dan mewujudkan visi "Lumbung Mandiri".
                    </p>
                </div>
            </div>

            <!-- Ilustrasi / Foto Sawah/Kegiatan -->
            <div class="lg:col-span-5">
                <div class="bg-white p-3 rounded-2xl shadow-xl border border-gray-100 overflow-hidden group">
                    <div class="h-72 sm:h-80 rounded-xl overflow-hidden relative">
                        <img src="{{ asset('images/UMKM-hero.jpeg') }}" alt="Desa Tedunan" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent flex items-end p-6">
                            <p class="text-white text-sm font-medium">Suasana dan Potensi Alam Desa Tedunan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Galeri Dokumentasi -->
        <div class="bg-white rounded-2xl p-6 sm:p-10 shadow-sm border border-gray-200">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Galeri Dokumentasi KKN</h2>
                <p class="mt-2 text-sm sm:text-base text-gray-500">Momen berharga saat kegiatan survei, sosialisasi, dan pendampingan UMKM langsung bersama warga Desa Tedunan.</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @for ($i = 1; $i <= 6; $i++)
                    <div class="bg-gray-50 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition border border-gray-100 group">
                        <div class="h-52 overflow-hidden relative bg-gray-200">
                            <img src="{{ asset('images/UMKM-hero.jpeg') }}" alt="Dokumentasi KKN {{ $i }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <span class="absolute top-3 left-3 bg-black/60 backdrop-blur-md text-white text-xs px-2.5 py-1 rounded-md font-medium">
                                Dokumentasi #{{ $i }}
                            </span>
                        </div>
                        <div class="p-5">
                            <p class="text-xs font-bold text-green-700 uppercase tracking-wide">KKN-T UNDIP 2026</p>
                            <h3 class="text-base font-bold text-gray-900 mt-1">Pendampingan & Digitalisasi UMKM Desa</h3>
                            <p class="text-xs text-gray-500 mt-1">Aktivitas kolaborasi bersama pelaku usaha lokal.</p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

    </div>
</x-front-layout>