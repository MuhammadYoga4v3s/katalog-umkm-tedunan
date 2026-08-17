<x-front-layout>

    @php
        /*
        |--------------------------------------------------------------------------
        | DATA ULASAN
        |--------------------------------------------------------------------------
        | Review berasal dari seluruh produk milik UMKM ini.
        | Tidak ada angka/rating hardcode.
        */

        $products->load('reviews');

        $reviews = $products
            ->flatMap(function ($product) {
                return $product->reviews;
            })
            ->sortByDesc('created_at')
            ->values();

        $reviewCount = $reviews->count();
    @endphp


    <!-- ========================================================= -->
    <!-- 1. HERO HEADER SECTION -->
    <!-- ========================================================= -->

    <div class="relative bg-gray-900 text-white py-12 lg:py-20 overflow-hidden shadow-lg">

        <!-- Background Banner -->
        <div class="absolute inset-0 z-0 opacity-40">

            @if($seller->profile_image)

                <img
                    src="{{ asset('storage/' . $seller->profile_image) }}"
                    alt="Banner"
                    class="w-full h-full object-cover"
                >

            @else

                <img
                    src="{{ asset('images/UMKM-Hero.jpeg') }}"
                    alt="Desa Tedunan"
                    class="w-full h-full object-cover"
                >

            @endif

        </div>

        <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/50 to-transparent z-0"></div>


        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <!-- Breadcrumb -->
            <div class="flex items-center space-x-2 text-xs sm:text-sm text-green-400 font-medium mb-6">

                <a
                    href="{{ route('home') }}"
                    class="hover:text-green-300 hover:underline transition"
                >
                    Beranda
                </a>

                <span>&rsaquo;</span>

                <a
                    href="{{ route('umkm.index') }}"
                    class="hover:text-green-300 hover:underline transition"
                >
                    UMKM
                </a>

                <span>&rsaquo;</span>

                <span class="text-white">
                    {{ $seller->business_name }}
                </span>

            </div>


            <!-- Header Content -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">


                <!-- SISI KIRI -->
                <div class="lg:col-span-8 flex flex-col sm:flex-row items-center sm:items-start gap-6">


                    <!-- Foto Profil -->
                    <div class="shrink-0">

                        @if($seller->profile_image)

                            <img
                                src="{{ asset('storage/' . $seller->profile_image) }}"
                                alt="{{ $seller->business_name }}"
                                class="w-32 h-32 sm:w-36 sm:h-36 rounded-2xl object-cover border-4 border-white shadow-2xl bg-white"
                            >

                        @else

                            <div class="w-32 h-32 sm:w-36 sm:h-36 rounded-2xl bg-white text-green-700 flex items-center justify-center text-4xl font-extrabold border-4 border-white shadow-2xl">
                                {{ strtoupper(substr($seller->business_name, 0, 2)) }}
                            </div>

                        @endif

                    </div>


                    <!-- Identitas Toko -->
                    <div class="text-center sm:text-left text-white">

                        <span class="inline-block bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-2">
                            {{ $seller->businessCategory->name ?? 'UMKM' }}
                        </span>


                        <h1 class="text-2xl sm:text-4xl font-extrabold tracking-tight">
                            {{ $seller->business_name }}
                        </h1>


                        <!-- HANYA TOTAL PRODUK -->
                        <div class="flex items-center justify-center sm:justify-start mt-2 text-sm text-gray-200">

                            <span>
                                {{ $products->count() }} Produk
                            </span>

                        </div>


                        <p class="mt-3 text-sm text-gray-300 max-w-xl line-clamp-2">

                            {{ $seller->business_description ?? 'UMKM terpercaya di Desa Tedunan yang menyediakan produk berkualitas tinggi langsung dari produsen lokal.' }}

                        </p>


                        <!-- Tombol WhatsApp -->
                        <div class="mt-5 flex flex-wrap gap-3 justify-center sm:justify-start">

                            @php

                                $waNumber = preg_replace('/^0/', '62', $seller->phone);

                                $waText = urlencode(
                                    "Halo Bapak/Ibu " .
                                    $seller->owner_name .
                                    ", saya melihat profil UMKM " .
                                    $seller->business_name .
                                    " di Katalog Desa Tedunan."
                                );

                            @endphp


                            <a
                                href="https://wa.me/{{ $waNumber }}?text={{ $waText }}"
                                target="_blank"
                                class="inline-flex items-center px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl shadow-lg transition duration-200 text-sm"
                            >

                                <svg
                                    class="w-4 h-4 mr-2 fill-current"
                                    viewBox="0 0 24 24"
                                >
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.248-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"
                                    />
                                </svg>

                                <span>
                                    Hubungi via WhatsApp
                                </span>

                            </a>

                        </div>

                    </div>


                    <!-- SISI KANAN HEADER -->
                    <div class="lg:col-span-4 bg-white text-gray-900 rounded-3xl shadow-2xl p-6 border border-gray-100">

                        <h3 class="font-bold text-base text-gray-900 mb-4 pb-2 border-b border-gray-100">
                            Informasi Kontak
                        </h3>


                        <ul class="space-y-3 text-xs sm:text-sm text-gray-600">


                            <!-- Alamat -->
                            <li class="flex items-start space-x-3">

                                <svg
                                    class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5"
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


                                <div>

                                    <strong class="block text-gray-900">
                                        Alamat
                                    </strong>

                                    <span>
                                        {{ $seller->address }},
                                        RT {{ $seller->rt }} / RW {{ $seller->rw }},
                                        Kec. Wedung, Kab. Demak
                                    </span>

                                </div>

                            </li>


                            <!-- Telepon -->
                            <li class="flex items-start space-x-3">

                                <svg
                                    class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                    ></path>
                                </svg>


                                <div>

                                    <strong class="block text-gray-900">
                                        No. Telepon / WhatsApp
                                    </strong>

                                    <span>
                                        {{ $seller->phone }}
                                    </span>

                                </div>

                            </li>


                            <!-- Jam -->
                            <li class="flex items-start space-x-3">

                                <svg
                                    class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                    ></path>
                                </svg>


                                <div>

                                    <strong class="block text-gray-900">
                                        Jam Operasional
                                    </strong>

                                    <span>
                                        Senin - Sabtu, 08.00 - 17.00
                                    </span>

                                </div>

                            </li>

                        </ul>


                        <div class="mt-5 pt-3 border-t border-gray-100">

                            <a
                                href="{{ $seller->google_maps ?? 'https://www.google.com/maps/search/?api=1&query=' . urlencode($seller->business_name . ' Desa Tedunan Jepara') }}"
                                target="_blank"
                                class="w-full block text-center bg-green-50 hover:bg-green-100 text-green-700 font-bold py-2 rounded-xl text-xs transition"
                            >
                                Lihat di Google Maps &rarr;
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- ========================================================= -->
    <!-- 2. STATISTIK BAR -->
    <!-- ========================================================= -->

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="bg-white rounded-2xl shadow-md p-6 mb-12 border border-gray-100 grid grid-cols-1 sm:grid-cols-3 divide-y sm:divide-y-0 sm:divide-x divide-gray-100 text-center">


            <!-- Bergabung -->
            <div class="p-3">

                <div class="text-2xl font-extrabold text-green-700">
                    {{ $seller->created_at->diffForHumans(null, true) }}
                </div>

                <div class="text-xs text-gray-500 font-semibold mt-1">
                    Bergabung
                </div>

            </div>


            <!-- Produk -->
            <div class="p-3">

                <div class="text-2xl font-extrabold text-green-700">
                    {{ $products->count() }}
                </div>

                <div class="text-xs text-gray-500 font-semibold mt-1">
                    Produk
                </div>

            </div>


            <!-- Ulasan -->
            <div class="p-3">

                <div class="text-2xl font-extrabold text-green-700">
                    {{ $reviewCount }}
                </div>

                <div class="text-xs text-gray-500 font-semibold mt-1">
                    Ulasan
                </div>

            </div>

        </div>


        <!-- ========================================================= -->
        <!-- 3. KONTEN UTAMA -->
        <!-- ========================================================= -->

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">


            <!-- ===================================================== -->
            <!-- KOLOM KIRI -->
            <!-- ===================================================== -->

            <div class="lg:col-span-8 space-y-12">


                <!-- PRODUK UNGGULAN -->
                <div>

                    <div class="flex items-center justify-between mb-6">

                        <h2 class="text-2xl font-extrabold text-gray-900">
                            Produk Unggulan
                        </h2>

                        <a
                            href="#all-products"
                            class="text-green-600 hover:text-green-700 font-semibold text-sm"
                        >
                            Lihat Semua Produk &rsaquo;
                        </a>

                    </div>


                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">


                        @forelse($products as $product)

                            @php
                                $productReviewCount = $product->reviews->count();
                            @endphp


                            <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition border border-gray-200 overflow-hidden flex flex-col justify-between group">


                                <!-- Gambar Produk -->
                                <a
                                    href="{{ route('produk.show', $product->id) }}"
                                    class="block relative h-48 bg-gray-100 overflow-hidden"
                                >

                                    @if($product->images->isNotEmpty())

                                        <img
                                            src="{{ asset('storage/' . $product->images->first()->image) }}"
                                            alt="{{ $product->name }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                                        >

                                    @else

                                        <div class="flex items-center justify-center h-full text-gray-400 text-xs">
                                            No Image
                                        </div>

                                    @endif

                                </a>


                                <!-- Informasi Produk -->
                                <div class="p-4 flex-1 flex flex-col justify-between">


                                    <div>

                                        <a
                                            href="{{ route('produk.show', $product->id) }}"
                                            class="block font-bold text-gray-900 hover:text-green-600 text-sm line-clamp-2"
                                        >
                                            {{ $product->name }}
                                        </a>


                                        <div class="mt-2 text-base font-extrabold text-green-700">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </div>

                                    </div>


                                    <!-- HANYA JUMLAH ULASAN -->
                                    @if($productReviewCount > 0)

                                        <div class="mt-4 pt-2 border-t border-gray-100">

                                            <span class="text-xs text-gray-500">
                                                {{ $productReviewCount }} ulasan
                                            </span>

                                        </div>

                                    @endif


                                </div>

                            </div>


                        @empty

                            <div class="col-span-full py-12 text-center bg-white rounded-2xl border border-dashed text-gray-500">

                                Belum ada produk tersedia.

                            </div>

                        @endforelse


                    </div>

                </div>


                <!-- ================================================= -->
                <!-- TENTANG USAHA -->
                <!-- ================================================= -->

                <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-6 sm:p-8">

                    <h2 class="text-2xl font-extrabold text-gray-900 mb-4">
                        Tentang Usaha
                    </h2>


                    <p class="text-gray-600 leading-relaxed text-sm sm:text-base">

                        {{ $seller->business_description ?? $seller->business_name . ' berdiri sejak tahun 2022 dengan fokus pada penyediaan produk berkualitas tinggi dari hasil bumi dan kerajinan lokal Desa Tedunan. Kami berkomitmen untuk memberikan pelayanan terbaik bagi para pelanggan.' }}

                    </p>


                    <!-- Poin Keunggulan -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-6 pt-6 border-t border-gray-100">


                        <div class="flex items-center space-x-3 bg-green-50 p-3 rounded-xl">

                            <span class="text-green-700 font-bold">
                                &#10003;
                            </span>

                            <span class="text-xs font-semibold text-gray-800">
                                Kualitas Terjamin & Dipilih dari bahan terbaik
                            </span>

                        </div>


                        <div class="flex items-center space-x-3 bg-green-50 p-3 rounded-xl">

                            <span class="text-green-700 font-bold">
                                &#10003;
                            </span>

                            <span class="text-xs font-semibold text-gray-800">
                                Proses Higienis & Standar bersih
                            </span>

                        </div>


                        <div class="flex items-center space-x-3 bg-green-50 p-3 rounded-xl">

                            <span class="text-green-700 font-bold">
                                &#10003;
                            </span>

                            <span class="text-xs font-semibold text-gray-800">
                                Dukung Petani Lokal & Pemberdayaan warga
                            </span>

                        </div>


                    </div>

                </div>

            </div>


            <!-- ===================================================== -->
            <!-- KOLOM KANAN -->
            <!-- ===================================================== -->

            <div class="lg:col-span-4 space-y-8">


                <!-- ================================================= -->
                <!-- LOKASI USAHA -->
                <!-- ================================================= -->

                <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-6">

                    <h3 class="text-lg font-bold text-gray-900 mb-4">
                        Lokasi Usaha
                    </h3>


                    <div class="h-48 rounded-2xl bg-gray-200 overflow-hidden relative mb-4">

                        <img
                            src="{{ asset('images/UMKM-Hero.jpeg') }}"
                            alt="Peta Lokasi"
                            class="w-full h-full object-cover opacity-75"
                        >


                        <div class="absolute inset-0 flex items-center justify-center">

                            <span class="bg-white/90 backdrop-blur-md px-4 py-2 rounded-xl text-xs font-bold text-gray-800 shadow">
                                📍 {{ $seller->business_name }}
                            </span>

                        </div>

                    </div>


                    <p class="text-xs text-gray-600 mb-4">

                        {{ $seller->address }},
                        RT {{ $seller->rt }} / RW {{ $seller->rw }},
                        Kec. Wedung, Kab. Demak, Jawa Tengah

                    </p>


                    <a
                        href="{{ $seller->google_maps ?? 'https://www.google.com/maps' }}"
                        target="_blank"
                        class="w-full block text-center border border-gray-300 hover:bg-gray-50 text-gray-800 font-bold py-2.5 rounded-xl text-sm transition"
                    >
                        Buka di Google Maps &rarr;
                    </a>

                </div>


                <!-- ================================================= -->
                <!-- ULASAN PENGUNJUNG -->
                <!-- ================================================= -->

                <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-6">


                    <div class="flex items-center justify-between mb-5">

                        <h3 class="text-lg font-bold text-gray-900">
                            Ulasan Pengunjung
                        </h3>

                        @if($reviewCount > 0)

                            <span class="text-xs text-green-600 font-semibold">
                                {{ $reviewCount }} Ulasan
                            </span>

                        @endif

                    </div>


                    @if($reviews->count() > 0)


                        <!-- DAFTAR ULASAN -->
                        <div class="space-y-5">


                            @foreach($reviews->take(5) as $review)

                                <div class="border-b border-gray-100 pb-4 last:border-0 last:pb-0">


                                    <div class="flex items-start justify-between gap-4">


                                        <!-- Nama & Rating -->
                                        <div>

                                            <strong class="block text-sm font-bold text-gray-900">
                                                {{ $review->visitor_name }}
                                            </strong>


                                            <!-- RATING YANG BENAR-BENAR DITULIS USER -->
                                            <div class="mt-1 flex items-center gap-1">

                                                @for($i = 1; $i <= 5; $i++)

                                                    @if($i <= $review->rating)

                                                        <span class="text-amber-400 text-sm">
                                                            ★
                                                        </span>

                                                    @else

                                                        <span class="text-gray-300 text-sm">
                                                            ★
                                                        </span>

                                                    @endif

                                                @endfor

                                            </div>

                                        </div>


                                        @if($review->created_at)

                                            <span class="text-[10px] text-gray-400 whitespace-nowrap">

                                                {{ $review->created_at->format('d M Y') }}

                                            </span>

                                        @endif


                                    </div>


                                    @if($review->comment)

                                        <p class="mt-2 text-xs text-gray-600 leading-relaxed">

                                            {{ $review->comment }}

                                        </p>

                                    @endif


                                    <!-- Nama Produk -->
                                    @if($review->product)

                                        <p class="mt-2 text-[10px] text-gray-400">

                                            Produk:
                                            <span class="font-semibold text-gray-500">
                                                {{ $review->product->name }}
                                            </span>

                                        </p>

                                    @endif


                                </div>

                            @endforeach


                        </div>


                        @if($reviewCount > 5)

                            <div class="mt-5 pt-4 border-t border-gray-100 text-center">

                                <span class="text-xs font-semibold text-green-600">
                                    Lihat Semua
                                </span>

                            </div>

                        @endif


                    @else


                        <!-- BELUM ADA ULASAN -->
                        <div class="py-8 text-center">

                            <div class="text-3xl mb-2">
                                ☆
                            </div>

                            <p class="text-sm font-semibold text-gray-500">
                                Belum ada ulasan.
                            </p>

                            <p class="text-xs text-gray-400 mt-1">
                                Jadilah yang pertama memberikan ulasan.
                            </p>

                        </div>


                    @endif


                </div>


            </div>


        </div>

    </div>

</x-front-layout>