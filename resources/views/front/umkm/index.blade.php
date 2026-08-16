<x-front-layout>

    <!-- HERO SECTION HALAMAN UMKM -->
    <div class="relative overflow-hidden bg-gray-900 py-16 text-white shadow-lg lg:py-24">

        <div class="absolute inset-0 z-0 opacity-40">
            <img
                src="{{ asset('images/UMKM-hero.jpeg') }}"
                alt="Desa Tedunan"
                class="h-full w-full object-cover"
            >
        </div>

        <div class="absolute inset-0 z-0 bg-gradient-to-r from-black/80 via-black/50 to-transparent"></div>

        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mb-3 flex items-center space-x-2 text-sm font-medium text-green-400">
                <a href="{{ route('home') }}" class="transition hover:text-green-300 hover:underline">
                    Beranda
                </a>

                <span class="text-white/50">&rsaquo;</span>

                <span class="text-white">
                    UMKM
                </span>
            </div>

            <h1 class="text-3xl font-extrabold tracking-tight sm:text-4xl lg:text-5xl">
                Direktori UMKM Desa Tedunan
            </h1>

            <p class="mt-3 max-w-2xl text-base leading-relaxed text-gray-200 sm:text-lg">
                Temukan berbagai UMKM lokal Desa Tedunan yang berkualitas dan dukung perekonomian desa dengan berbelanja produk lokal.
            </p>

        </div>
    </div>


    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">

        <!-- STATISTIK RINGKAS -->
        <div class="relative z-10 -mt-24 mb-12 rounded-3xl border border-gray-100 bg-white p-6 shadow-xl sm:-mt-28 sm:p-8">

            <div class="grid grid-cols-2 gap-4 text-center md:grid-cols-4 md:gap-0 md:divide-x md:divide-gray-100">

                <div class="border-b border-gray-100 p-4 md:border-b-0">
                    <div class="text-3xl font-extrabold text-green-700 sm:text-4xl">
                        {{ \App\Models\Seller::where('verification_status', 'approved')->count() }}
                    </div>

                    <div class="mt-2 text-xs font-bold uppercase tracking-wider text-gray-500 sm:text-sm">
                        Total UMKM Aktif
                    </div>
                </div>

                <div class="border-b border-gray-100 p-4 md:border-b-0">
                    <div class="text-3xl font-extrabold text-green-700 sm:text-4xl">
                        {{ \App\Models\Product::where('status', 'available')->count() }}
                    </div>

                    <div class="mt-2 text-xs font-bold uppercase tracking-wider text-gray-500 sm:text-sm">
                        Total Produk
                    </div>
                </div>

                <div class="border-b border-gray-100 p-4 md:border-b-0">
                    <div class="text-3xl font-extrabold text-green-700 sm:text-4xl">
                        24/7
                    </div>

                    <div class="mt-2 text-xs font-bold uppercase tracking-wider text-gray-500 sm:text-sm">
                        Akses Katalog
                    </div>
                </div>

                <div class="p-4">
                    <div class="text-3xl font-extrabold text-green-700 sm:text-4xl">
                        Resmi
                    </div>

                    <div class="mt-2 text-xs font-bold uppercase tracking-wider text-gray-500 sm:text-sm">
                        Desa Tedunan
                    </div>
                </div>

            </div>
        </div>


        <!-- FILTER & PENCARIAN -->
        <div class="mb-10 rounded-3xl border border-gray-200 bg-white p-5 shadow-md sm:p-7">

            <form
                action="{{ route('umkm.index') }}"
                method="GET"
                class="grid grid-cols-1 items-end gap-5 sm:grid-cols-2 lg:grid-cols-12"
            >

                <!-- Cari Nama -->
                <div class="lg:col-span-3">

                    <label class="mb-2 block text-xs font-extrabold uppercase tracking-wider text-gray-700">
                        Cari UMKM
                    </label>

                    <div class="relative">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Ketik nama usaha..."
                            class="w-full rounded-2xl border border-gray-300 bg-white py-3.5 pl-11 pr-4 text-sm font-medium text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-green-500 focus:ring-2 focus:ring-green-500/20"
                        >

                        <svg
                            class="absolute left-3.5 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                            ></path>
                        </svg>

                    </div>

                </div>


                <!-- Kategori Usaha -->
                <div class="lg:col-span-3">

                    <label class="mb-2 block text-xs font-extrabold uppercase tracking-wider text-gray-700">
                        Kategori Usaha
                    </label>

                    <select
                        name="category"
                        class="w-full cursor-pointer rounded-2xl border border-gray-300 bg-white px-4 py-3.5 text-base font-semibold text-gray-800 outline-none transition focus:border-green-500 focus:ring-2 focus:ring-green-500/20"
                    >
                        <option value="" class="text-base">
                            Semua Kategori
                        </option>

                        @foreach(\App\Models\BusinessCategory::all() as $cat)

                            <option
                                value="{{ $cat->id }}"
                                {{ request('category') == $cat->id ? 'selected' : '' }}
                                class="text-base"
                            >
                                {{ $cat->name }}
                            </option>

                        @endforeach
                    </select>

                </div>


                <!-- RT -->
                <div class="lg:col-span-2">

                    <label class="mb-2 block text-xs font-extrabold uppercase tracking-wider text-gray-700">
                        RT
                    </label>

                    <select
                        name="rt"
                        class="w-full cursor-pointer rounded-2xl border border-gray-300 bg-white px-4 py-3.5 text-base font-semibold text-gray-800 outline-none transition focus:border-green-500 focus:ring-2 focus:ring-green-500/20"
                    >
                        <option value="" class="text-base">
                            Semua RT
                        </option>

                        @for($i = 1; $i <= 5; $i++)

                            <option
                                value="0{{ $i }}"
                                {{ request('rt') == '0'.$i || request('rt') == $i ? 'selected' : '' }}
                                class="text-base"
                            >
                                RT 0{{ $i }}
                            </option>

                        @endfor

                    </select>

                </div>


                <!-- RW -->
                <div class="lg:col-span-2">

                    <label class="mb-2 block text-xs font-extrabold uppercase tracking-wider text-gray-700">
                        RW
                    </label>

                    <select
                        name="rw"
                        class="w-full cursor-pointer rounded-2xl border border-gray-300 bg-white px-4 py-3.5 text-base font-semibold text-gray-800 outline-none transition focus:border-green-500 focus:ring-2 focus:ring-green-500/20"
                    >
                        <option value="" class="text-base">
                            Semua RW
                        </option>

                        @for($i = 1; $i <= 3; $i++)

                            <option
                                value="0{{ $i }}"
                                {{ request('rw') == '0'.$i || request('rw') == $i ? 'selected' : '' }}
                                class="text-base"
                            >
                                RW 0{{ $i }}
                            </option>

                        @endfor

                    </select>

                </div>


                <!-- Tombol Terapkan Filter -->
                <div class="lg:col-span-2">

                    <button
                        type="submit"
                        class="flex w-full items-center justify-center space-x-2 rounded-2xl bg-green-700 px-4 py-3.5 text-base font-bold text-white shadow-lg shadow-green-700/20 transition duration-200 hover:-translate-y-0.5 hover:bg-green-800 hover:shadow-xl"
                    >
                        <span>Filter</span>
                    </button>

                </div>

            </form>

        </div>


        <!-- JUMLAH UMKM -->
        <div class="mb-6 flex items-center justify-between">

            <h2 class="text-xl font-extrabold text-gray-900 sm:text-2xl">
                {{ $sellers->total() ?? count($sellers) }} UMKM Ditemukan
            </h2>

        </div>


        <!-- GRID KARTU UMKM -->
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">

            @forelse($sellers as $sellerItem)

                <div class="group flex flex-col justify-between overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl">

                    <!-- Banner -->
                    <div class="relative h-48 overflow-hidden bg-gray-200">

                        @if($sellerItem->profile_image)

                            <img
                                src="{{ asset('storage/' . $sellerItem->profile_image) }}"
                                alt="{{ $sellerItem->business_name }}"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                            >

                        @else

                            <img
                                src="{{ asset('images/UMKM-hero.jpeg') }}"
                                alt="Default Banner"
                                class="h-full w-full object-cover opacity-80 transition duration-500 group-hover:scale-105"
                            >

                        @endif

                        <div class="absolute left-4 top-4">

                            <span class="rounded-lg bg-black/70 px-3 py-1.5 text-xs font-bold text-white shadow backdrop-blur-md">
                                {{ $sellerItem->businessCategory->name ?? 'UMKM' }}
                            </span>

                        </div>

                    </div>


                    <!-- Informasi UMKM -->
                    <div class="relative flex flex-1 flex-col justify-between p-6 pt-5">

                        <!-- Logo -->
                        <div class="absolute -top-12 left-6 flex h-20 w-20 items-center justify-center overflow-hidden rounded-2xl border-4 border-white bg-white text-xl font-extrabold text-green-700 shadow-xl">

                            @if($sellerItem->profile_image)

                                <img
                                    src="{{ asset('storage/' . $sellerItem->profile_image) }}"
                                    alt="Logo"
                                    class="h-full w-full object-cover"
                                >

                            @else

                                {{ strtoupper(substr($sellerItem->business_name, 0, 2)) }}

                            @endif

                        </div>


                        <div class="mt-6">

                            <a
                                href="{{ route('umkm.show', $sellerItem->id) }}"
                                class="block truncate text-lg font-extrabold text-gray-900 transition hover:text-green-600"
                            >
                                {{ $sellerItem->business_name }}
                            </a>

                            <p class="mt-1 text-xs font-semibold text-gray-500">
                                Pemilik: {{ $sellerItem->owner_name }}
                            </p>


                            <div class="mt-2.5 flex items-center space-x-1.5 text-xs text-gray-500">

                                <svg
                                    class="h-4 w-4 flex-shrink-0 text-green-600"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                    ></path>

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                    ></path>
                                </svg>

                                <span class="font-medium">
                                    RT {{ $sellerItem->rt }} / RW {{ $sellerItem->rw }}, Desa Tedunan
                                </span>

                            </div>

                        </div>


                        <!-- Produk -->
                        <div class="mt-6 flex items-center justify-between border-t border-gray-100 pt-4">

                            <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-bold text-green-800">
                                {{ $sellerItem->products()->where('status', 'available')->count() }} Produk Tersedia
                            </span>

                        </div>


                        <!-- Tombol -->
                        <div class="mt-5">

                            <a
                                href="{{ route('umkm.show', $sellerItem->id) }}"
                                class="block w-full rounded-2xl bg-gray-900 px-5 py-3 text-center text-sm font-bold text-white shadow transition duration-200 hover:bg-green-700"
                            >
                                Lihat Profil Toko &rarr;
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-span-full rounded-3xl border border-gray-200 bg-white py-16 text-center shadow-sm">

                    <p class="text-lg font-bold text-gray-600">
                        Tidak ada UMKM yang ditemukan.
                    </p>

                </div>

            @endforelse

        </div>


        @if(method_exists($sellers, 'links'))

            <div class="mt-12">
                {{ $sellers->withQueryString()->links() }}
            </div>

        @endif

    </div>

</x-front-layout>