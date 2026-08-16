<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin - Katalog UMKM Desa Tedunan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-slate-50 font-sans antialiased"
    x-data="{ sidebarOpen: false }"
>

    <div class="min-h-screen flex">

        <!-- ==========================================
             MOBILE OVERLAY
        =========================================== -->
        <div
            x-show="sidebarOpen"
            x-transition.opacity
            @click="sidebarOpen = false"
            class="fixed inset-0 z-40 bg-black/40 lg:hidden"
            style="display: none;"
        ></div>


        <!-- ==========================================
             SIDEBAR
        =========================================== -->
        <aside
            class="fixed inset-y-0 left-0 z-50 w-72 bg-white border-r border-slate-200 shadow-xl
                   transform transition-transform duration-300 lg:translate-x-0 lg:static lg:inset-auto lg:shadow-none
                   flex flex-col"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        >

            <!-- Logo -->
            <div class="h-20 px-6 flex items-center border-b border-slate-100">

                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-xl bg-green-50 border border-green-100 flex items-center justify-center shrink-0">
                        <img
                            src="{{ asset('images/logoDesa.png') }}"
                            alt="Logo Desa Tedunan"
                            class="w-9 h-9 object-contain"
                        >
                    </div>

                    <div class="leading-tight">
                        <p class="text-[11px] font-bold uppercase tracking-wider text-green-600">
                            Admin Panel
                        </p>

                        <p class="text-base font-extrabold text-slate-800">
                            UMKM Tedunan
                        </p>
                    </div>

                </a>

                <!-- Close Mobile -->
                <button
                    @click="sidebarOpen = false"
                    class="ml-auto lg:hidden text-slate-400 hover:text-slate-700"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>

            </div>


            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 overflow-y-auto">

                <!-- MAIN MENU -->
                <p class="px-3 mb-3 text-[10px] font-bold uppercase tracking-widest text-slate-400">
                    Menu Utama
                </p>

                <!-- Dashboard -->
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="group flex items-center gap-3 px-3 py-2.5 mb-1 rounded-xl transition
                    {{ request()->routeIs('admin.dashboard')
                        ? 'bg-green-50 text-green-700 font-semibold'
                        : 'text-slate-600 hover:bg-slate-50 hover:text-green-700' }}"
                >

                    <div
                        class="w-9 h-9 rounded-lg flex items-center justify-center
                        {{ request()->routeIs('admin.dashboard')
                            ? 'bg-green-100 text-green-700'
                            : 'bg-slate-100 text-slate-500 group-hover:bg-green-50 group-hover:text-green-600' }}"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6"
                            />
                        </svg>
                    </div>

                    <span class="text-sm">
                        Dashboard
                    </span>

                </a>


                <!-- AKUN UMKM -->
                <a
                    href="{{ route('admin.akun-penjual.index') }}"
                    class="group flex items-center gap-3 px-3 py-2.5 mb-1 rounded-xl transition
                    {{ request()->routeIs('admin.akun-penjual.*')
                        ? 'bg-green-50 text-green-700 font-semibold'
                        : 'text-slate-600 hover:bg-slate-50 hover:text-green-700' }}"
                >

                    <div
                        class="w-9 h-9 rounded-lg flex items-center justify-center
                        {{ request()->routeIs('admin.akun-penjual.*')
                            ? 'bg-green-100 text-green-700'
                            : 'bg-slate-100 text-slate-500 group-hover:bg-green-50 group-hover:text-green-600' }}"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-4a4 4 0 100-8 4 4 0 000 8zm6 0a3 3 0 100-6 3 3 0 000 6z"
                            />
                        </svg>
                    </div>

                    <span class="text-sm">
                        Akun UMKM
                    </span>

                </a>


                <!-- VERIFIKASI -->
                <a
                    href="{{ route('admin.verifikasi.index') }}"
                    class="group flex items-center gap-3 px-3 py-2.5 mb-1 rounded-xl transition
                    {{ request()->routeIs('admin.verifikasi.*')
                        ? 'bg-green-50 text-green-700 font-semibold'
                        : 'text-slate-600 hover:bg-slate-50 hover:text-green-700' }}"
                >

                    <div
                        class="w-9 h-9 rounded-lg flex items-center justify-center
                        {{ request()->routeIs('admin.verifikasi.*')
                            ? 'bg-green-100 text-green-700'
                            : 'bg-slate-100 text-slate-500 group-hover:bg-green-50 group-hover:text-green-600' }}"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>
                    </div>

                    <span class="text-sm">
                        Verifikasi UMKM
                    </span>

                </a>


                <!-- KATEGORI USAHA -->
                <a
                    href="{{ route('admin.kategori-usaha.index') }}"
                    class="group flex items-center gap-3 px-3 py-2.5 mb-1 rounded-xl transition
                    {{ request()->routeIs('admin.kategori-usaha.*')
                        ? 'bg-green-50 text-green-700 font-semibold'
                        : 'text-slate-600 hover:bg-slate-50 hover:text-green-700' }}"
                >

                    <div
                        class="w-9 h-9 rounded-lg flex items-center justify-center
                        {{ request()->routeIs('admin.kategori-usaha.*')
                            ? 'bg-green-100 text-green-700'
                            : 'bg-slate-100 text-slate-500 group-hover:bg-green-50 group-hover:text-green-600' }}"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 10h16M4 14h16M4 18h16"
                            />
                        </svg>
                    </div>

                    <span class="text-sm">
                        Kategori Usaha
                    </span>

                </a>


                <!-- PRODUK -->
                <a
                    href="#"
                    class="group flex items-center gap-3 px-3 py-2.5 mb-1 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-green-700 transition"
                >

                    <div class="w-9 h-9 rounded-lg bg-slate-100 text-slate-500 group-hover:bg-green-50 group-hover:text-green-600 flex items-center justify-center">

                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"
                            />
                        </svg>

                    </div>

                    <span class="text-sm">
                        Produk
                    </span>

                    <span class="ml-auto text-[9px] font-semibold px-2 py-1 rounded-full bg-slate-100 text-slate-400">
                        Segera
                    </span>

                </a>


                <!-- Divider -->
                <div class="my-6 border-t border-slate-100"></div>


                <!-- LAPORAN -->
                <p class="px-3 mb-3 text-[10px] font-bold uppercase tracking-widest text-slate-400">
                    Laporan
                </p>

                <a
                    href="{{ route('admin.laporan.download') }}"
                    target="_blank"
                    class="group flex items-center gap-3 px-3 py-2.5 mb-1 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-green-700 transition"
                >

                    <div class="w-9 h-9 rounded-lg bg-slate-100 text-slate-500 group-hover:bg-green-50 group-hover:text-green-600 flex items-center justify-center">

                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h7l5 5v10a2 2 0 01-2 2z"
                            />
                        </svg>

                    </div>

                    <span class="text-sm">
                        Laporan
                    </span>

                </a>


                <!-- PENGATURAN -->
                <a
                    href="#"
                    class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-green-700 transition"
                >

                    <div class="w-9 h-9 rounded-lg bg-slate-100 text-slate-500 group-hover:bg-green-50 group-hover:text-green-600 flex items-center justify-center">

                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M10.325 4.317a1 1 0 011.35 0l.43.39a1 1 0 001.11.17l.52-.26a1 1 0 011.34.54l.25.53a1 1 0 00.82.59l.58.05a1 1 0 01.92 1.09l-.05.58a1 1 0 00.59.82l.53.25a1 1 0 01.54 1.34l-.26.52a1 1 0 00.17 1.11l.39.43a1 1 0 010 1.35l-.39.43a1 1 0 00-.17 1.11l.26.52a1 1 0 01-.54 1.34l-.53.25a1 1 0 00-.59.82l.05.58a1 1 0 01-.92 1.09l-.58.05a1 1 0 00-.82.59l-.25.53a1 1 0 01-1.34.54l-.52-.26a1 1 0 00-1.11.17l-.43.39a1 1 0 01-1.35 0l-.43-.39a1 1 0 00-1.11-.17l-.52.26a1 1 0 01-1.34-.54l-.25-.53a1 1 0 00-.82-.59l-.58-.05a1 1 0 01-.92-1.09l.05-.58a1 1 0 00-.59-.82l-.53-.25a1 1 0 01-.54-1.34l.26-.52a1 1 0 00-.17-1.11l-.39-.43a1 1 0 010-1.35l.39-.43a1 1 0 00.17-1.11l-.26-.52a1 1 0 01.54-1.34l.53-.25a1 1 0 00.59-.82l-.05-.58a1 1 0 01.92-1.09l.58-.05a1 1 0 00.82-.59l.25-.53a1 1 0 011.34-.54l.52.26a1 1 0 001.11-.17l.43-.39z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                            />
                        </svg>

                    </div>

                    <span class="text-sm">
                        Pengaturan
                    </span>

                    <span class="ml-auto text-[9px] font-semibold px-2 py-1 rounded-full bg-slate-100 text-slate-400">
                        Segera
                    </span>

                </a>

            </nav>


            <!-- ==========================================
                 SIDEBAR FOOTER
            =========================================== -->
            <div class="p-4 border-t border-slate-100">

                <div class="bg-green-50 border border-green-100 rounded-xl p-3">

                    <div class="flex items-center gap-3">

                        <div class="w-9 h-9 rounded-lg bg-white border border-green-100 flex items-center justify-center shrink-0">
                            <img
                                src="{{ asset('images/logoDesa.png') }}"
                                alt="Logo Desa"
                                class="w-7 h-7 object-contain"
                            >
                        </div>

                        <div class="min-w-0">
                            <p class="text-xs font-bold text-green-800 truncate">
                                Desa Tedunan
                            </p>

                            <p class="text-[10px] text-green-600">
                                Katalog UMKM
                            </p>
                        </div>

                    </div>

                </div>

                <p class="text-[9px] text-slate-400 text-center mt-3">
                    © {{ date('Y') }} Pemerintah Desa Tedunan
                </p>

                <p class="text-[8px] text-slate-400 text-center mt-1">
                    Developed by KKN-T UNDIP 88 2026
                </p>

            </div>

        </aside>


        <!-- ==========================================
             MAIN AREA
        =========================================== -->
        <div class="flex-1 min-w-0 flex flex-col">


            <!-- ==========================================
                 TOPBAR
            =========================================== -->
            <header class="h-20 bg-white border-b border-slate-200 sticky top-0 z-30">

                <div class="h-full px-4 sm:px-6 lg:px-8 flex items-center justify-between">

                    <!-- Mobile Menu -->
                    <div class="flex items-center gap-3">

                        <button
                            @click="sidebarOpen = true"
                            class="lg:hidden w-10 h-10 rounded-xl bg-slate-100 hover:bg-green-50 hover:text-green-600 text-slate-600 flex items-center justify-center transition"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                            </svg>
                        </button>


                        <!-- Page Title -->
                        <div>
                            <p class="text-[10px] uppercase tracking-widest font-bold text-green-600">
                                Admin Panel
                            </p>

                            <h1 class="text-lg font-bold text-slate-800">
                                Katalog UMKM Desa Tedunan
                            </h1>
                        </div>

                    </div>


                    <!-- User -->
                    <div class="flex items-center gap-3">

                        <div class="hidden sm:block text-right">
                            <p class="text-sm font-semibold text-slate-700">
                                {{ Auth::user()->name }}
                            </p>

                            <p class="text-[11px] text-slate-400">
                                Administrator
                            </p>
                        </div>


                        <div class="w-10 h-10 rounded-xl bg-green-100 text-green-700 flex items-center justify-center font-bold">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>


                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button
                                type="submit"
                                title="Logout"
                                class="w-10 h-10 rounded-xl bg-slate-100 hover:bg-red-50 hover:text-red-600 text-slate-500 flex items-center justify-center transition"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1"
                                    />
                                </svg>
                            </button>

                        </form>

                    </div>

                </div>

            </header>


            <!-- ==========================================
                 CONTENT
            =========================================== -->
            <main class="flex-1 overflow-y-auto">

                <div class="px-4 sm:px-6 lg:px-8 py-6 lg:py-8">

                    {{ $slot }}

                </div>

            </main>


            <!-- ==========================================
                 MAIN FOOTER / WATERMARK
            =========================================== -->
            <footer class="bg-white border-t border-slate-200 px-4 sm:px-6 lg:px-8 py-3">

                <div class="flex flex-col sm:flex-row items-center justify-between gap-2">

                    <p class="text-[10px] text-slate-400">
                        © {{ date('Y') }} Pemerintah Desa Tedunan
                    </p>

                    <p class="text-[10px] text-slate-400">
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