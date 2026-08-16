<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Panel Penjual') - Katalog UMKM Desa Tedunan
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body
    class="bg-gray-50 font-sans antialiased text-gray-800"
    x-data="{ sidebarOpen: false }"
>

    <div class="min-h-screen flex">


        <!-- ========================================================= -->
        <!-- MOBILE OVERLAY -->
        <!-- ========================================================= -->

        <div
            x-show="sidebarOpen"
            x-transition.opacity
            @click="sidebarOpen = false"
            class="fixed inset-0 bg-black/40 z-40 lg:hidden"
            style="display: none;"
        ></div>



        <!-- ========================================================= -->
        <!-- SIDEBAR -->
        <!-- ========================================================= -->

        <aside
            class="fixed lg:sticky top-0 left-0 z-50 h-screen w-72 bg-white border-r border-gray-200 flex flex-col transition-transform duration-300"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
        >

            <!-- ----------------------------------------------------- -->
            <!-- LOGO -->
            <!-- ----------------------------------------------------- -->

            <div class="h-20 px-5 border-b border-gray-100 flex items-center">

                <a
                    href="{{ route('seller.dashboard') }}"
                    class="flex items-center gap-3 group"
                >

                    <div class="w-11 h-11 rounded-xl bg-green-50 flex items-center justify-center p-1.5 group-hover:bg-green-100 transition">

                        <img
                            src="{{ asset('images/logoDesa.png') }}"
                            alt="Logo Desa Tedunan"
                            class="w-full h-full object-contain"
                        >

                    </div>


                    <div class="leading-tight">

                        <p class="text-[10px] font-bold uppercase tracking-widest text-green-600">
                            Panel Penjual
                        </p>

                        <p class="text-base font-extrabold text-gray-900">
                            UMKM Tedunan
                        </p>

                    </div>

                </a>

            </div>



            <!-- ----------------------------------------------------- -->
            <!-- USER MINI PROFILE -->
            <!-- ----------------------------------------------------- -->

            <div class="px-4 pt-5">

                <div class="rounded-2xl bg-gradient-to-br from-green-50 to-emerald-50 border border-green-100 p-4">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-green-600 text-white flex items-center justify-center font-bold shadow-sm">

                            {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}

                        </div>


                        <div class="min-w-0">

                            <p class="text-xs text-green-700 font-medium">
                                Penjual
                            </p>

                            <p class="text-sm font-bold text-gray-900 truncate">
                                {{ Auth::user()->name }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>



            <!-- ----------------------------------------------------- -->
            <!-- NAVIGATION -->
            <!-- ----------------------------------------------------- -->

            <nav class="flex-1 px-4 py-6 overflow-y-auto">

                <p class="px-3 mb-3 text-[10px] font-bold uppercase tracking-widest text-gray-400">
                    Menu Utama
                </p>


                <!-- Dashboard -->

                <a
                    href="{{ route('seller.dashboard') }}"
                    class="group flex items-center gap-3 px-3 py-3 mb-1.5 rounded-xl text-sm font-semibold transition
                    {{ request()->routeIs('seller.dashboard')
                        ? 'bg-green-600 text-white shadow-md shadow-green-600/20'
                        : 'text-gray-600 hover:bg-green-50 hover:text-green-700' }}"
                >

                    <span
                        class="w-9 h-9 rounded-lg flex items-center justify-center
                        {{ request()->routeIs('seller.dashboard')
                            ? 'bg-white/15'
                            : 'bg-gray-100 group-hover:bg-green-100' }}"
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
                                d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h4v-6h4v6h4a1 1 0 001-1V10"
                            />

                        </svg>

                    </span>


                    <span class="flex-1">
                        Dashboard
                    </span>

                </a>



                <!-- Profil Toko -->

                <a
                    href="{{ route('seller.profil.edit') }}"
                    class="group flex items-center gap-3 px-3 py-3 mb-1.5 rounded-xl text-sm font-semibold transition
                    {{ request()->routeIs('seller.profil.*')
                        ? 'bg-green-600 text-white shadow-md shadow-green-600/20'
                        : 'text-gray-600 hover:bg-green-50 hover:text-green-700' }}"
                >

                    <span
                        class="w-9 h-9 rounded-lg flex items-center justify-center
                        {{ request()->routeIs('seller.profil.*')
                            ? 'bg-white/15'
                            : 'bg-gray-100 group-hover:bg-green-100' }}"
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
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                            />

                        </svg>

                    </span>


                    <span class="flex-1">
                        Profil Toko
                    </span>

                </a>



                <!-- Kelola Produk -->

                <a
                    href="{{ route('seller.produk.index') }}"
                    class="group flex items-center gap-3 px-3 py-3 mb-1.5 rounded-xl text-sm font-semibold transition
                    {{ request()->routeIs('seller.produk.*')
                        ? 'bg-green-600 text-white shadow-md shadow-green-600/20'
                        : 'text-gray-600 hover:bg-green-50 hover:text-green-700' }}"
                >

                    <span
                        class="w-9 h-9 rounded-lg flex items-center justify-center
                        {{ request()->routeIs('seller.produk.*')
                            ? 'bg-white/15'
                            : 'bg-gray-100 group-hover:bg-green-100' }}"
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
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"
                            />

                        </svg>

                    </span>


                    <span class="flex-1">
                        Kelola Produk
                    </span>

                </a>



                <!-- Laporan -->

                <a
                    href="{{ route('seller.laporan.download') }}"
                    target="_blank"
                    class="group flex items-center gap-3 px-3 py-3 mb-1.5 rounded-xl text-sm font-semibold text-gray-600 hover:bg-green-50 hover:text-green-700 transition"
                >

                    <span class="w-9 h-9 rounded-lg bg-gray-100 group-hover:bg-green-100 flex items-center justify-center">

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
                                d="M9 17v-2a4 4 0 014-4h2m-6 6h6m2-14H7a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V7l-4-4z"
                            />

                        </svg>

                    </span>


                    <span class="flex-1">
                        Unduh Laporan
                    </span>


                    <svg
                        class="w-4 h-4 text-gray-300"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M10 6l6 6-6 6"
                        />

                    </svg>

                </a>



                <!-- Divider -->

                <div class="border-t border-gray-100 my-6"></div>


                <p class="px-3 mb-3 text-[10px] font-bold uppercase tracking-widest text-gray-400">
                    Akses Cepat
                </p>



                <!-- Lihat Katalog -->

                <a
                    href="{{ route('produk.index') }}"
                    target="_blank"
                    class="group flex items-center gap-3 px-3 py-3 rounded-xl text-sm font-semibold text-gray-600 hover:bg-green-50 hover:text-green-700 transition"
                >

                    <span class="w-9 h-9 rounded-lg bg-gray-100 group-hover:bg-green-100 flex items-center justify-center">

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

                    </span>


                    <span>
                        Lihat Katalog
                    </span>

                </a>

            </nav>



            <!-- ----------------------------------------------------- -->
            <!-- SIDEBAR FOOTER -->
            <!-- ----------------------------------------------------- -->

            <div class="p-4 border-t border-gray-100">

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >

                    @csrf

                    <button
                        type="submit"
                        class="w-full flex items-center gap-3 px-3 py-3 rounded-xl text-sm font-semibold text-gray-600 hover:bg-red-50 hover:text-red-600 transition"
                    >

                        <span class="w-9 h-9 rounded-lg bg-gray-100 flex items-center justify-center">

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
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                />

                            </svg>

                        </span>


                        <span>
                            Keluar
                        </span>

                    </button>

                </form>


                <!-- WM -->

                <div class="text-center mt-4 px-2">

                    <p class="text-[10px] font-medium text-gray-400 leading-relaxed">

                        &copy; {{ date('Y') }}
                        Pemerintah Desa Tedunan

                    </p>

                    <p class="text-[9px] text-gray-300 mt-0.5">

                        Developed by KKN-T UNDIP 88 2026

                    </p>

                </div>

            </div>

        </aside>



        <!-- ========================================================= -->
        <!-- MAIN AREA -->
        <!-- ========================================================= -->

        <div class="flex-1 min-w-0 flex flex-col min-h-screen">


            <!-- ===================================================== -->
            <!-- TOPBAR -->
            <!-- ===================================================== -->

            <header class="h-20 bg-white border-b border-gray-200 sticky top-0 z-30">

                <div class="h-full px-4 sm:px-6 lg:px-8 flex items-center justify-between">


                    <!-- Mobile Menu -->

                    <div class="flex items-center gap-3">

                        <button
                            @click="sidebarOpen = true"
                            class="lg:hidden w-10 h-10 rounded-xl bg-gray-100 hover:bg-green-50 hover:text-green-600 flex items-center justify-center transition"
                        >

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
                                    d="M4 6h16M4 12h16M4 18h16"
                                />

                            </svg>

                        </button>


                        <div class="hidden sm:block">

                            <p class="text-xs text-gray-400">
                                Panel Penjual
                            </p>

                            <p class="text-sm font-bold text-gray-800">
                                Katalog UMKM Desa Tedunan
                            </p>

                        </div>

                    </div>



                    <!-- User -->

                    <div class="flex items-center gap-3">

                        <div class="hidden sm:block text-right">

                            <p class="text-sm font-bold text-gray-800">
                                {{ Auth::user()->name }}
                            </p>

                            <p class="text-xs text-gray-400">
                                Penjual UMKM
                            </p>

                        </div>


                        <div class="w-10 h-10 rounded-xl bg-green-600 text-white flex items-center justify-center font-bold shadow-sm">

                            {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}

                        </div>

                    </div>

                </div>

            </header>



            <!-- ===================================================== -->
            <!-- CONTENT -->
            <!-- ===================================================== -->

            <main class="flex-1 p-4 sm:p-6 lg:p-8">

                {{ $slot }}

            </main>



            <!-- ===================================================== -->
            <!-- MAIN FOOTER / WATERMARK -->
            <!-- ===================================================== -->

            <footer class="border-t border-gray-200 bg-white px-6 py-4">

                <div class="flex flex-col sm:flex-row items-center justify-between gap-2">

                    <p class="text-xs text-gray-400">

                        &copy; {{ date('Y') }}
                        Pemerintah Desa Tedunan

                    </p>

                    <p class="text-xs text-gray-400">

                        Sistem Katalog Digital UMKM & Potensi Desa

                    </p>

                    <p class="text-xs text-gray-400">

                        Developed by
                        <span class="font-semibold text-green-600">
                            KKN-T UNDIP 88 2026
                        </span>

                    </p>

                </div>

            </footer>


        </div>

    </div>

</body>

</html>