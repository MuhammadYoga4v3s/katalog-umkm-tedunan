<x-front-layout>

    @php
        /*
        |--------------------------------------------------------------------------
        | Statistik
        |--------------------------------------------------------------------------
        */

        $totalProducts = \App\Models\Product::where('status', 'available')->count();

        $totalUmkm = \App\Models\Seller::where(
            'verification_status',
            'approved'
        )->count();

        /*
        |--------------------------------------------------------------------------
        | Rata-rata Rating Seluruh Produk
        |--------------------------------------------------------------------------
        |
        | Rating diambil langsung dari tabel reviews.
        | Jadi bukan angka hardcode dan bukan mengambil dari $product.
        |
        */

        $averageRating = \App\Models\Review::whereHas('product', function ($query) {
            $query->where('status', 'available');
        })->avg('rating');

        $averageRating = $averageRating ?? 0;


        /*
        |--------------------------------------------------------------------------
        | Produk Terbaru
        |--------------------------------------------------------------------------
        */

        $latestProducts = \App\Models\Product::where(
            'status',
            'available'
        )
        ->with([
            'images',
            'seller',
            'productCategory',
        ])
        ->latest()
        ->take(5)
        ->get();
    @endphp


    <!-- ============================================================= -->
    <!-- HERO SECTION -->
    <!-- ============================================================= -->

    <div class="relative bg-gray-900 text-white py-16 lg:py-24 overflow-hidden shadow-lg">

        <!-- Background -->

        <div class="absolute inset-0 z-0 opacity-40">

            <img
                src="{{ asset('images/UMKM-Hero.jpeg') }}"
                alt="Sawah Desa Tedunan"
                class="w-full h-full object-cover"
            >

        </div>


        <!-- Overlay -->

        <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/50 to-transparent z-0"></div>


        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">


            <!-- ===================================================== -->
            <!-- KIRI -->
            <!-- ===================================================== -->

            <div class="lg:col-span-7 space-y-6">

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-tight">

                    Temukan Produk Lokal
                    <br>

                    Terbaik dari
                    <span class="text-green-400">
                        Desa Tedunan
                    </span>

                </h1>


                <p class="text-base sm:text-lg text-gray-200">

                    Dukung UMKM lokal tingkatkan perekonomian desa
                    dan bangun masa depan yang mandiri bersama.

                </p>


                <!-- Search -->

                <form
                    action="{{ route('produk.index') }}"
                    method="GET"
                    class="relative max-w-xl"
                >

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari Produk, Toko, atau Kategori ..."
                        class="w-full py-4 pl-5 pr-14 rounded-full text-gray-900 shadow-xl focus:outline-none focus:ring-4 focus:ring-green-500 text-sm sm:text-base"
                    >


                    <button
                        type="submit"
                        class="absolute right-2 top-2 bottom-2 bg-green-700 hover:bg-green-800 text-white px-5 rounded-full flex items-center justify-center transition shadow"
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
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                            />

                        </svg>

                    </button>

                </form>


                <!-- Kata Kunci -->

                <div class="flex flex-wrap items-center gap-2 text-sm text-gray-300 pt-2">

                    <span class="font-semibold text-white">
                        Populer :
                    </span>


                    <a
                        href="{{ route('produk.index', ['search' => 'Beras']) }}"
                        class="bg-white/20 hover:bg-white/30 px-3 py-1 rounded-full transition"
                    >
                        Beras
                    </a>


                    <a
                        href="{{ route('produk.index', ['search' => 'Kerajinan']) }}"
                        class="bg-white/20 hover:bg-white/30 px-3 py-1 rounded-full transition"
                    >
                        Kerajinan
                    </a>


                    <a
                        href="{{ route('produk.index', ['search' => 'Kuliner']) }}"
                        class="bg-white/20 hover:bg-white/30 px-3 py-1 rounded-full transition"
                    >
                        Kuliner
                    </a>


                    <a
                        href="{{ route('umkm.index') }}"
                        class="bg-white/20 hover:bg-white/30 px-3 py-1 rounded-full transition"
                    >
                        Semua Toko
                    </a>

                </div>

            </div>



            <!-- ===================================================== -->
            <!-- KANAN -->
            <!-- ===================================================== -->

            <div class="lg:col-span-5">

                <div class="bg-white text-gray-900 rounded-2xl shadow-2xl p-6 sm:p-8 border-t-8 border-green-600 flex items-start space-x-4">


                    <!-- Icon -->

                    <div class="flex-shrink-0 bg-green-100 p-3 rounded-full text-green-700">

                        <svg
                            class="w-8 h-8"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                            />

                        </svg>

                    </div>


                    <div>

                        <h3 class="font-bold text-base sm:text-lg text-green-900 leading-snug mb-2">

                            Mewujudkan "Lumbung Mandiri" Tedunan :
                            Optimalisasi Potensi Lokal Melalui Penguatan Ketahanan Pangan

                        </h3>


                        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">

                            Katalog digital untuk menghimpun dan mempromosikan
                            produk unggulan UMKM Desa Tedunan oleh Tim KKN-T UNDIP
                            2026 periode Juli-Agustus.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <!-- ============================================================= -->
    <!-- STATISTIK -->
    <!-- ============================================================= -->

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-20 mb-12">

        <div class="bg-white rounded-xl shadow-md grid grid-cols-2 md:grid-cols-4 divide-y md:divide-y-0 md:divide-x divide-gray-200 p-6 text-center">


            <!-- Produk -->

            <div class="p-4">

                <div class="text-3xl font-extrabold text-green-600">

                    {{ $totalProducts }}

                </div>

                <div class="text-xs sm:text-sm text-gray-500 mt-1 font-medium">

                    Total Produk Tersedia

                </div>

            </div>


            <!-- UMKM -->

            <div class="p-4">

                <div class="text-3xl font-extrabold text-green-600">

                    {{ $totalUmkm }}

                </div>

                <div class="text-xs sm:text-sm text-gray-500 mt-1 font-medium">

                    Total UMKM Aktif

                </div>

            </div>


            <!-- Akses -->

            <div class="p-4">

                <div class="text-3xl font-extrabold text-green-600">

                    24/7

                </div>

                <div class="text-xs sm:text-sm text-gray-500 mt-1 font-medium">

                    Akses Katalog Digital

                </div>

            </div>


            <!-- Rating -->

            <div class="p-4">

                <div class="text-3xl font-extrabold text-green-600">

                    {{ number_format($averageRating, 1) }}

                </div>

                <div class="text-xs sm:text-sm text-gray-500 mt-1 font-medium">

                    Rata-rata Rating Produk

                </div>

            </div>

        </div>

    </div>



    <!-- ============================================================= -->
    <!-- PRODUK TERBARU -->
    <!-- ============================================================= -->

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">


        <!-- Header -->

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-2xl font-bold text-gray-900">

                Produk Unggulan Terbaru

            </h2>


            <a
                href="{{ route('produk.index') }}"
                class="text-green-600 hover:text-green-700 font-semibold text-sm flex items-center"
            >

                Lihat Semuanya &rarr;

            </a>

        </div>



        <!-- Grid -->

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">


            @forelse($latestProducts as $product)

                <div class="bg-white rounded-lg shadow hover:shadow-xl transition flex flex-col overflow-hidden border border-gray-100">


                    <!-- Gambar -->

                    <a
                        href="{{ route('produk.show', $product->id) }}"
                        class="h-48 bg-gray-100 relative overflow-hidden group"
                    >

                        @if($product->images->isNotEmpty())

                            <img
                                src="{{ asset('storage/' . $product->images->first()->image) }}"
                                alt="{{ $product->name }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition duration-300"
                            >

                        @else

                            <div class="flex items-center justify-center h-full text-xs text-gray-400">

                                No Image

                            </div>

                        @endif

                    </a>



                    <!-- Informasi -->

                    <div class="p-4 flex-1 flex flex-col justify-between">

                        <div>


                            <!-- Kategori -->

                            <span class="text-xs text-green-600 font-semibold">

                                {{ $product->productCategory->name ?? 'Umum' }}

                            </span>


                            <!-- Nama -->

                            <a
                                href="{{ route('produk.show', $product->id) }}"
                                class="block font-bold text-gray-900 hover:text-green-600 text-sm line-clamp-2 mt-1"
                            >

                                {{ $product->name }}

                            </a>


                            <!-- Seller -->

                            <p class="text-xs text-gray-500 mt-1">

                                {{ $product->seller->business_name ?? '-' }}

                            </p>

                        </div>


                        <!-- Harga -->

                        <div class="mt-4 pt-2 border-t border-gray-100 flex items-center justify-between">

                            <span class="font-extrabold text-green-600 text-sm">

                                Rp {{ number_format($product->price, 0, ',', '.') }}

                            </span>

                        </div>

                    </div>

                </div>


            @empty

                <div class="col-span-full py-12 text-center text-gray-500 bg-white rounded-lg">

                    Belum ada produk yang tersedia.

                </div>

            @endforelse

        </div>

    </div>


</x-front-layout>