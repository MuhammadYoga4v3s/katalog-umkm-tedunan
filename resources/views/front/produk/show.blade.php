<x-front-layout>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- ========================================================= -->
        <!-- TOMBOL KEMBALI -->
        <!-- ========================================================= -->

        <div class="mb-7">

            <a
                href="{{ route('produk.index') }}"
                class="inline-flex items-center text-sm font-semibold text-gray-500 hover:text-green-600 transition"
            >

                <svg
                    class="w-5 h-5 mr-2"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"
                    ></path>
                </svg>

                Kembali ke Katalog Produk

            </a>

        </div>


        <!-- ========================================================= -->
        <!-- ALERT SUCCESS -->
        <!-- ========================================================= -->

        @if(session('success'))

            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 p-4 rounded-2xl">

                <div class="flex items-start gap-3">

                    <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center shrink-0">

                        <svg
                            class="w-4 h-4 text-green-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7"
                            ></path>
                        </svg>

                    </div>

                    <p class="text-sm font-medium pt-1">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        @endif


        <!-- ========================================================= -->
        <!-- ALERT ERROR -->
        <!-- ========================================================= -->

        @if($errors->any())

            <div class="mb-6 bg-red-50 border border-red-200 text-red-700 p-4 rounded-2xl">

                <div class="flex items-start gap-3">

                    <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center shrink-0">

                        <svg
                            class="w-4 h-4 text-red-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                            ></path>
                        </svg>

                    </div>

                    <ul class="list-disc ml-3 text-sm space-y-1">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            </div>

        @endif


        <!-- ========================================================= -->
        <!-- DETAIL PRODUK -->
        <!-- ========================================================= -->

        <div class="bg-white rounded-3xl shadow-sm border border-gray-200 overflow-hidden mb-12">

            <div class="p-6 sm:p-8 lg:p-10 grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-14">


                <!-- ================================================= -->
                <!-- GALERI PRODUK -->
                <!-- ================================================= -->

                @php

                    $firstImage = $product->images->isNotEmpty()
                        ? asset('storage/' . $product->images->first()->image)
                        : null;

                @endphp


                <div
                    x-data="{ mainImage: '{{ $firstImage }}' }"
                    class="min-w-0"
                >

                    <!-- Foto Utama -->

                    <div class="relative bg-gray-100 rounded-2xl overflow-hidden border border-gray-200 mb-4">

                        @if($firstImage)

                            <img
                                :src="mainImage"
                                alt="{{ $product->name }}"
                                class="w-full h-[420px] object-cover"
                            >

                        @else

                            <div class="w-full h-[420px] flex flex-col items-center justify-center text-gray-400">

                                <svg
                                    class="w-14 h-14 text-gray-300 mb-3"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                    ></path>
                                </svg>

                                <span class="text-sm">
                                    Belum ada foto
                                </span>

                            </div>

                        @endif

                    </div>


                    <!-- Thumbnail -->

                    @if($product->images->count() > 1)

                        <div class="flex gap-3 overflow-x-auto pb-2">

                            @foreach($product->images as $img)

                                <button
                                    type="button"
                                    @click="mainImage = '{{ asset('storage/' . $img->image) }}'"
                                    class="shrink-0 w-20 h-20 rounded-xl overflow-hidden border-2 border-transparent hover:border-green-500 focus:border-green-500 transition"
                                >

                                    <img
                                        src="{{ asset('storage/' . $img->image) }}"
                                        alt="{{ $product->name }}"
                                        class="w-full h-full object-cover"
                                    >

                                </button>

                            @endforeach

                        </div>

                    @endif

                </div>


                <!-- ================================================= -->
                <!-- INFORMASI PRODUK -->
                <!-- ================================================= -->

                <div class="flex flex-col">


                    <!-- Kategori -->

                    <div class="mb-4">

                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-green-50 text-green-700 text-xs font-bold">

                            {{ $product->productCategory->name ?? 'Umum' }}

                        </span>

                    </div>


                    <!-- Nama Produk -->

                    <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight leading-tight">

                        {{ $product->name }}

                    </h1>


                    <!-- Harga -->

                    <div class="mt-4 mb-7">

                        <span class="text-sm text-gray-400 block mb-1">
                            Harga
                        </span>

                        <span class="text-3xl sm:text-4xl font-extrabold text-green-600">

                            Rp {{ number_format($product->price, 0, ',', '.') }}

                        </span>

                    </div>


                    <!-- Informasi Ringkas -->

                    <div class="bg-gray-50 rounded-2xl border border-gray-200 p-5 mb-7">

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">


                            <!-- Stok -->

                            <div>

                                <span class="block text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">
                                    Ketersediaan
                                </span>

                                <div class="flex items-center gap-2">

                                    @if($product->stock > 0)

                                        <span class="w-2.5 h-2.5 rounded-full bg-green-500"></span>

                                        <span class="font-bold text-gray-900">
                                            {{ $product->stock }} Pcs
                                        </span>

                                    @else

                                        <span class="w-2.5 h-2.5 rounded-full bg-red-500"></span>

                                        <span class="font-bold text-red-600">
                                            Stok Habis
                                        </span>

                                    @endif

                                </div>

                            </div>


                            <!-- Penjual -->

                            <div>

                                <span class="block text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">
                                    Dijual Oleh
                                </span>

                                <a
                                    href="{{ route('umkm.show', $product->seller_id) }}"
                                    class="font-bold text-green-700 hover:text-green-800 hover:underline"
                                >

                                    {{ $product->seller->business_name }}

                                </a>

                            </div>

                        </div>

                    </div>


                    <!-- Deskripsi -->

                    <div class="mb-8">

                        <h2 class="text-lg font-bold text-gray-900 mb-3">
                            Deskripsi Produk
                        </h2>

                        <div class="text-gray-600 leading-relaxed whitespace-pre-line text-sm sm:text-base">

                            {{ $product->description ?: 'Tidak ada deskripsi untuk produk ini.' }}

                        </div>

                    </div>


                    <!-- WhatsApp -->

                    <div class="mt-auto">

                        @php

                            $waNumber = preg_replace('/^0/', '62', $product->seller->phone);

                            $waText = urlencode(
                                "Halo, saya tertarik dengan produk *" .
                                $product->name .
                                "* seharga Rp" .
                                number_format($product->price, 0, ',', '.') .
                                " yang ada di Katalog Desa Tedunan. Apakah masih tersedia?"
                            );

                        @endphp


                        @if($product->stock > 0)

                            <a
                                href="https://wa.me/{{ $waNumber }}?text={{ $waText }}"
                                target="_blank"
                                class="w-full flex items-center justify-center px-8 py-4 bg-green-600 hover:bg-green-700 text-white text-base sm:text-lg font-bold rounded-xl shadow-lg hover:shadow-xl transition duration-200"
                            >

                                <svg
                                    class="w-6 h-6 mr-2"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.248-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
                                </svg>

                                Pesan via WhatsApp

                            </a>

                        @else

                            <div class="w-full flex items-center justify-center px-8 py-4 bg-gray-200 text-gray-500 text-base sm:text-lg font-bold rounded-xl">

                                Stok Produk Habis

                            </div>

                        @endif

                    </div>

                </div>

            </div>

        </div>


        <!-- ========================================================= -->
        <!-- ULASAN & FORM -->
        <!-- ========================================================= -->

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">


            <!-- ===================================================== -->
            <!-- DAFTAR ULASAN -->
            <!-- ===================================================== -->

            <div class="lg:col-span-8">

                <div class="flex items-center justify-between mb-6">

                    <div>

                        <h2 class="text-2xl font-extrabold text-gray-900">
                            Ulasan Pelanggan
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            {{ $product->reviews->count() }} ulasan dari pelanggan
                        </p>

                    </div>

                </div>


                <div class="space-y-4">

                    @forelse($product->reviews as $review)

                        <div class="bg-white p-5 sm:p-6 rounded-2xl shadow-sm border border-gray-200">


                            <!-- Header Review -->

                            <div class="flex items-start justify-between gap-4 mb-3">

                                <div>

                                    <span class="block font-bold text-gray-900">
                                        {{ $review->visitor_name }}
                                    </span>


                                    <!-- Rating Asli -->

                                    <div class="flex items-center gap-0.5 mt-1">

                                        @for($i = 1; $i <= 5; $i++)

                                            @if($i <= $review->rating)

                                                <span class="text-amber-400 text-base">
                                                    ★
                                                </span>

                                            @else

                                                <span class="text-gray-300 text-base">
                                                    ★
                                                </span>

                                            @endif

                                        @endfor

                                    </div>

                                </div>


                                @if($review->created_at)

                                    <span class="text-xs text-gray-400 whitespace-nowrap">

                                        {{ $review->created_at->diffForHumans() }}

                                    </span>

                                @endif

                            </div>


                            <!-- Komentar -->

                            @if($review->comment)

                                <p class="text-sm text-gray-600 leading-relaxed">

                                    {{ $review->comment }}

                                </p>

                            @endif


                        </div>


                    @empty

                        <div class="bg-white p-10 rounded-2xl text-center border border-dashed border-gray-300">

                            <div class="w-14 h-14 mx-auto rounded-full bg-gray-50 flex items-center justify-center mb-4">

                                <span class="text-2xl text-gray-300">
                                    ☆
                                </span>

                            </div>

                            <p class="text-gray-700 font-bold">
                                Belum ada ulasan
                            </p>

                            <p class="text-gray-400 text-sm mt-1">
                                Jadilah pelanggan pertama yang memberikan ulasan untuk produk ini.
                            </p>

                        </div>

                    @endforelse

                </div>

            </div>


            <!-- ===================================================== -->
            <!-- FORM ULASAN -->
            <!-- ===================================================== -->

            <div class="lg:col-span-4">

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 lg:sticky lg:top-5">


                    <div class="mb-6">

                        <div class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-yellow-50 mb-3">

                            <span class="text-xl">
                                ★
                            </span>

                        </div>

                        <h3 class="text-xl font-extrabold text-gray-900">
                            Tulis Ulasan
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            Bagikan pengalaman Anda mengenai produk ini.
                        </p>

                    </div>


                    <form
                        action="{{ route('produk.review', $product->id) }}"
                        method="POST"
                        class="space-y-5"
                    >

                        @csrf


                        <!-- Nama -->

                        <div>

                            <label
                                for="visitor_name"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Nama Anda
                            </label>

                            <input
                                id="visitor_name"
                                type="text"
                                name="visitor_name"
                                value="{{ old('visitor_name') }}"
                                required
                                placeholder="Masukkan nama Anda"
                                class="block w-full px-4 py-3 rounded-xl border-gray-300 bg-gray-50 text-sm shadow-sm focus:bg-white focus:border-green-500 focus:ring-green-500 transition"
                            >

                        </div>


                        <!-- Email -->

                        <div>

                            <label
                                for="visitor_email"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Email
                                <span class="font-normal text-gray-400">
                                    (Tidak dipublikasikan)
                                </span>
                            </label>

                            <input
                                id="visitor_email"
                                type="email"
                                name="visitor_email"
                                value="{{ old('visitor_email') }}"
                                required
                                placeholder="nama@email.com"
                                class="block w-full px-4 py-3 rounded-xl border-gray-300 bg-gray-50 text-sm shadow-sm focus:bg-white focus:border-green-500 focus:ring-green-500 transition"
                            >

                        </div>


                        <!-- Rating -->

                        <div>

                            <label
                                for="rating"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Rating Bintang
                            </label>

                            <select
                                id="rating"
                                name="rating"
                                required
                                class="block w-full px-4 py-3 rounded-xl border-gray-300 bg-gray-50 text-base text-gray-800 shadow-sm focus:bg-white focus:border-green-500 focus:ring-green-500 transition"
                            >

                                <option value="5" {{ old('rating', '5') == '5' ? 'selected' : '' }}>
                                    ★★★★★ &nbsp; 5 - Sangat Bagus
                                </option>

                                <option value="4" {{ old('rating') == '4' ? 'selected' : '' }}>
                                    ★★★★☆ &nbsp; 4 - Bagus
                                </option>

                                <option value="3" {{ old('rating') == '3' ? 'selected' : '' }}>
                                    ★★★☆☆ &nbsp; 3 - Cukup
                                </option>

                                <option value="2" {{ old('rating') == '2' ? 'selected' : '' }}>
                                    ★★☆☆☆ &nbsp; 2 - Kurang
                                </option>

                                <option value="1" {{ old('rating') == '1' ? 'selected' : '' }}>
                                    ★☆☆☆☆ &nbsp; 1 - Sangat Kurang
                                </option>

                            </select>

                        </div>


                        <!-- Komentar -->

                        <div>

                            <label
                                for="comment"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Komentar & Pengalaman
                            </label>

                            <textarea
                                id="comment"
                                name="comment"
                                rows="5"
                                required
                                placeholder="Ceritakan pengalaman Anda..."
                                class="block w-full px-4 py-3 rounded-xl border-gray-300 bg-gray-50 text-sm shadow-sm focus:bg-white focus:border-green-500 focus:ring-green-500 transition resize-none"
                            >{{ old('comment') }}</textarea>

                        </div>


                        <!-- Submit -->

                        <button
                            type="submit"
                            class="w-full flex items-center justify-center gap-2 bg-green-600 hover:bg-green-700 text-white font-bold py-3.5 px-5 rounded-xl shadow-sm hover:shadow-md transition duration-200"
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
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                                ></path>
                            </svg>

                            Kirim Ulasan

                        </button>


                    </form>

                </div>

            </div>

        </div>

    </div>

</x-front-layout>