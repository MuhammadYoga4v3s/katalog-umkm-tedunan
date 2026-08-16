<x-seller-layout>

    @php
        $user = Auth::user();
        $seller = $user->seller ?? null;
    @endphp

    <div class="space-y-6">

        <!-- ========================================================= -->
        <!-- HEADER / WELCOME -->
        <!-- ========================================================= -->

        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-green-700 via-green-600 to-emerald-500 text-white shadow-lg">

            <!-- Decorative -->
            <div class="absolute -right-16 -top-16 w-56 h-56 rounded-full bg-white/10"></div>
            <div class="absolute -right-8 -bottom-20 w-48 h-48 rounded-full bg-white/10"></div>

            <div class="relative px-6 py-7 sm:px-8 sm:py-9">

                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                    <div>

                        <div class="flex items-center gap-3 mb-3">

                            <div class="w-11 h-11 rounded-xl bg-white/15 backdrop-blur-sm flex items-center justify-center">

                                <svg
                                    class="w-6 h-6"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 7h18M5 7v12a1 1 0 001 1h12a1 1 0 001-1V7M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2"
                                    />
                                </svg>

                            </div>

                            <span class="text-sm font-medium text-green-100">
                                Dashboard Penjual
                            </span>

                        </div>


                        <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">

                            Selamat Datang,
                            {{ $user->name ?? 'Penjual' }}!

                        </h1>


                        <p class="mt-2 text-sm sm:text-base text-green-50 max-w-2xl">

                            Kelola toko, produk, dan informasi UMKM Anda
                            dengan mudah melalui dashboard ini.

                        </p>

                    </div>


                    <!-- Tombol Lihat Toko -->

                    @if($seller)

                        <a
                            href="{{ route('umkm.show', $seller->id) }}"
                            class="inline-flex items-center justify-center gap-2 bg-white text-green-700 hover:bg-green-50 px-5 py-3 rounded-xl font-bold text-sm shadow-md transition shrink-0"
                        >

                            <svg
                                class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                />
                            </svg>

                            Lihat Toko

                        </a>

                    @endif

                </div>

            </div>

        </div>



        <!-- ========================================================= -->
        <!-- STATISTIK -->
        <!-- ========================================================= -->

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">


            <!-- Produk -->

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 hover:shadow-md transition">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm font-medium text-gray-500">
                            Total Produk
                        </p>

                        <p class="mt-2 text-3xl font-extrabold text-gray-900">
                            {{ $seller?->products?->count() ?? 0 }}
                        </p>

                    </div>


                    <div class="w-12 h-12 rounded-xl bg-green-50 text-green-600 flex items-center justify-center">

                        <svg
                            class="w-6 h-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"
                            />
                        </svg>

                    </div>

                </div>

                <div class="mt-4 text-xs text-gray-500">
                    Produk yang terdaftar di katalog
                </div>

            </div>



            <!-- Status Toko -->

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 hover:shadow-md transition">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm font-medium text-gray-500">
                            Status Toko
                        </p>

                        <p class="mt-2 text-xl font-extrabold text-gray-900">
                            {{ ucfirst($seller->verification_status ?? 'Menunggu') }}
                        </p>

                    </div>


                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">

                        <svg
                            class="w-6 h-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 3c-2.955 0-5.697 1.073-7.618 2.984A11.955 11.955 0 003 12c0 2.955 1.073 5.697 2.984 7.618A11.955 11.955 0 0012 21c2.955 0 5.697-1.073 7.618-2.984A11.955 11.955 0 0021 12c0-2.955-1.073-5.697-2.984-4.016z"
                            />
                        </svg>

                    </div>

                </div>

                <div class="mt-4">

                    @if(($seller->verification_status ?? '') === 'approved')

                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-green-700 bg-green-50 px-3 py-1.5 rounded-full">

                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>

                            Toko telah diverifikasi

                        </span>

                    @else

                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-yellow-700 bg-yellow-50 px-3 py-1.5 rounded-full">

                            <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>

                            Menunggu verifikasi

                        </span>

                    @endif

                </div>

            </div>



            <!-- Katalog -->

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 hover:shadow-md transition">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm font-medium text-gray-500">
                            Katalog
                        </p>

                        <p class="mt-2 text-xl font-extrabold text-gray-900">
                            Publik
                        </p>

                    </div>


                    <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">

                        <svg
                            class="w-6 h-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 10h16M4 14h16M4 18h16"
                            />
                        </svg>

                    </div>

                </div>

                <div class="mt-4 text-xs text-gray-500">
                    Produk dapat dilihat masyarakat melalui katalog
                </div>

            </div>

        </div>



        <!-- ========================================================= -->
        <!-- AKSI CEPAT -->
        <!-- ========================================================= -->

        <div>

            <div class="flex items-center justify-between mb-4">

                <div>

                    <h2 class="text-lg font-bold text-gray-900">
                        Aksi Cepat
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Kelola toko Anda dengan cepat.
                    </p>

                </div>

            </div>


            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">


                <!-- Kelola Produk -->

                <a
                    href="{{ route('seller.produk.index') }}"
                    class="group bg-white rounded-2xl border border-gray-100 shadow-sm p-5 hover:shadow-md hover:border-green-200 transition"
                >

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-xl bg-green-50 text-green-600 flex items-center justify-center group-hover:bg-green-600 group-hover:text-white transition">

                            <svg
                                class="w-6 h-6"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 4v16m8-8H4"
                                />
                            </svg>

                        </div>


                        <div class="flex-1">

                            <h3 class="font-bold text-gray-900">
                                Kelola Produk
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                Tambah, ubah, dan kelola produk UMKM.
                            </p>

                        </div>


                        <svg
                            class="w-5 h-5 text-gray-300 group-hover:text-green-600 group-hover:translate-x-1 transition"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5l7 7-7 7"
                            />
                        </svg>

                    </div>

                </a>



                <!-- Profil Toko -->

                <a
                    href="{{ route('seller.profil.edit') }}"
                    class="group bg-white rounded-2xl border border-gray-100 shadow-sm p-5 hover:shadow-md hover:border-green-200 transition"
                >

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition">

                            <svg
                                class="w-6 h-6"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                />
                            </svg>

                        </div>


                        <div class="flex-1">

                            <h3 class="font-bold text-gray-900">
                                Profil Toko
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                Perbarui informasi dan profil usaha Anda.
                            </p>

                        </div>


                        <svg
                            class="w-5 h-5 text-gray-300 group-hover:text-blue-600 group-hover:translate-x-1 transition"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5l7 7-7 7"
                            />
                        </svg>

                    </div>

                </a>

            </div>

        </div>



        <!-- ========================================================= -->
        <!-- INFORMASI TOKO -->
        <!-- ========================================================= -->

        @if($seller)

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-gray-100">

                    <h2 class="text-lg font-bold text-gray-900">
                        Informasi Toko
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Informasi usaha yang terdaftar pada katalog.
                    </p>

                </div>


                <div class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">


                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                            Nama Usaha
                        </p>

                        <p class="mt-1 font-semibold text-gray-900">
                            {{ $seller->business_name ?? '-' }}
                        </p>

                    </div>


                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                            Pemilik
                        </p>

                        <p class="mt-1 font-semibold text-gray-900">
                            {{ $seller->name ?? $user->name ?? '-' }}
                        </p>

                    </div>


                    <div>

                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                            Email
                        </p>

                        <p class="mt-1 font-semibold text-gray-900 break-all">
                            {{ $seller->email ?? $user->email ?? '-' }}
                        </p>

                    </div>

                </div>

            </div>

        @endif


    </div>

</x-seller-layout>