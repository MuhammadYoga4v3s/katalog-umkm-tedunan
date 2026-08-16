<x-admin-layout>

    <div class="space-y-6">

        <!-- Header -->
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-green-700 via-green-600 to-emerald-500 px-6 py-7 sm:px-8 shadow-lg">
            <div class="relative z-10">
                <p class="text-sm font-medium text-green-100 mb-1">
                    Panel Administrasi
                </p>

                <h1 class="text-2xl sm:text-3xl font-extrabold text-white">
                    Selamat Datang, {{ Auth::user()->name }}
                </h1>

                <p class="mt-2 max-w-2xl text-sm sm:text-base text-green-50">
                    Kelola data UMKM, verifikasi pendaftaran, kategori usaha,
                    dan informasi produk Desa Tedunan melalui panel administrasi.
                </p>
            </div>

            <!-- Dekorasi -->
            <div class="absolute -right-10 -top-16 w-56 h-56 rounded-full bg-white/10"></div>
            <div class="absolute right-20 -bottom-20 w-40 h-40 rounded-full bg-white/10"></div>
        </div>


        <!-- Statistik -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            <!-- Total UMKM -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">
                            Total UMKM
                        </p>

                        <p class="mt-2 text-3xl font-extrabold text-gray-900">
                            {{ \App\Models\Seller::count() }}
                        </p>

                        <p class="mt-1 text-xs text-gray-500">
                            Terdaftar dalam sistem
                        </p>
                    </div>

                    <div class="w-12 h-12 rounded-xl bg-green-50 text-green-600 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-8h6v8"/>
                        </svg>
                    </div>
                </div>
            </div>


            <!-- Menunggu Verifikasi -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">
                            Menunggu Verifikasi
                        </p>

                        <p class="mt-2 text-3xl font-extrabold text-gray-900">
                            {{ \App\Models\Seller::where('verification_status', 'pending')->count() }}
                        </p>

                        <p class="mt-1 text-xs text-gray-500">
                            Perlu ditinjau admin
                        </p>
                    </div>

                    <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>


            <!-- UMKM Aktif -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">
                            UMKM Aktif
                        </p>

                        <p class="mt-2 text-3xl font-extrabold text-gray-900">
                            {{ \App\Models\Seller::where('verification_status', 'approved')->count() }}
                        </p>

                        <p class="mt-1 text-xs text-gray-500">
                            Sudah terverifikasi
                        </p>
                    </div>

                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 12c0 5.591 3.824 10.291 9 11.622C17.176 22.291 21 17.591 21 12c0-1.041-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                </div>
            </div>


            <!-- Total Produk -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">
                            Total Produk
                        </p>

                        <p class="mt-2 text-3xl font-extrabold text-gray-900">
                            {{ \App\Models\Product::count() }}
                        </p>

                        <p class="mt-1 text-xs text-gray-500">
                            Produk dalam katalog
                        </p>
                    </div>

                    <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                </div>
            </div>

        </div>


        <!-- Aksi Cepat & Informasi -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Aksi Cepat -->
            <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-gray-100">
                    <h2 class="text-lg font-bold text-gray-900">
                        Aksi Cepat
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Kelola sistem Katalog UMKM Desa Tedunan.
                    </p>
                </div>

                <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-4">

                    <a href="{{ route('admin.verifikasi.index') }}"
                       class="group flex items-center gap-4 p-4 rounded-xl border border-gray-200 hover:border-green-300 hover:bg-green-50 transition">

                        <div class="w-11 h-11 rounded-xl bg-green-100 text-green-700 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12l2 2 4-4m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>

                        <div>
                            <p class="font-bold text-gray-900 group-hover:text-green-700">
                                Verifikasi UMKM
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                Periksa pendaftaran UMKM
                            </p>
                        </div>
                    </a>


                    <a href="{{ route('admin.akun-penjual.index') }}"
                       class="group flex items-center gap-4 p-4 rounded-xl border border-gray-200 hover:border-green-300 hover:bg-green-50 transition">

                        <div class="w-11 h-11 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>

                        <div>
                            <p class="font-bold text-gray-900 group-hover:text-green-700">
                                Kelola Akun UMKM
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                Kelola akun para penjual
                            </p>
                        </div>
                    </a>


                    <a href="{{ route('admin.kategori-usaha.index') }}"
                       class="group flex items-center gap-4 p-4 rounded-xl border border-gray-200 hover:border-green-300 hover:bg-green-50 transition">

                        <div class="w-11 h-11 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M7 7h.01M3 3h6l12 12-6 6L3 9V3z"/>
                            </svg>
                        </div>

                        <div>
                            <p class="font-bold text-gray-900 group-hover:text-green-700">
                                Kategori Usaha
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                Atur kategori UMKM
                            </p>
                        </div>
                    </a>


                    <a href="{{ route('admin.laporan.download') }}"
                       target="_blank"
                       class="group flex items-center gap-4 p-4 rounded-xl border border-gray-200 hover:border-green-300 hover:bg-green-50 transition">

                        <div class="w-11 h-11 rounded-xl bg-red-100 text-red-700 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414A1 1 0 0118 8.414V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>

                        <div>
                            <p class="font-bold text-gray-900 group-hover:text-green-700">
                                Unduh Laporan
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                Download laporan PDF
                            </p>
                        </div>
                    </a>

                </div>
            </div>


            <!-- Informasi Sistem -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-gray-100">
                    <h2 class="text-lg font-bold text-gray-900">
                        Informasi Sistem
                    </h2>
                </div>

                <div class="p-6 space-y-5">

                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                            Platform
                        </p>

                        <p class="mt-1 font-bold text-gray-900">
                            Katalog UMKM Desa Tedunan
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                            Status Sistem
                        </p>

                        <div class="mt-2 inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-green-50 text-green-700 text-sm font-semibold">
                            <span class="w-2 h-2 rounded-full bg-green-500"></span>
                            Sistem Aktif
                        </div>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                            Pengelola
                        </p>

                        <p class="mt-1 text-sm text-gray-600">
                            Pemerintah Desa Tedunan
                        </p>
                    </div>

                    <div class="pt-4 border-t border-gray-100">
                        <p class="text-xs text-gray-400 leading-relaxed">
                            Sistem ini digunakan untuk membantu pengelolaan,
                            verifikasi, dan publikasi data UMKM Desa Tedunan
                            secara digital.
                        </p>
                    </div>

                </div>
            </div>

        </div>

    </div>

</x-admin-layout>