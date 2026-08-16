<x-front-layout>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- ========================================================= -->
        <!-- HEADER -->
        <!-- ========================================================= -->

        <div class="mb-8">

            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">

                <div>

                    <div class="inline-flex items-center px-3 py-1 rounded-full bg-green-50 text-green-700 text-xs font-bold uppercase tracking-wider mb-3">
                        Katalog Produk
                    </div>

                    <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                        Katalog Produk Lokal
                    </h1>

                    <p class="mt-2 text-gray-600 max-w-2xl leading-relaxed">
                        Jelajahi dan temukan berbagai produk unggulan langsung dari pengrajin dan pembuatnya.
                    </p>

                </div>

            </div>

        </div>


        <!-- ========================================================= -->
        <!-- FORM PENCARIAN & FILTER -->
        <!-- ========================================================= -->

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-5 mb-10">

            <form
                action="{{ route('produk.index') }}"
                method="GET"
                class="grid grid-cols-1 md:grid-cols-12 gap-4"
            >

                <!-- Cari Nama Produk -->
                <div class="md:col-span-6">

                    <label
                        for="search"
                        class="block text-sm font-semibold text-gray-700 mb-2"
                    >
                        Cari Produk
                    </label>

                    <div class="relative">

                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">

                            <svg
                                class="w-5 h-5 text-gray-400"
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

                        <input
                            id="search"
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari nama produk atau barang..."
                            class="w-full pl-11 pr-4 py-3 rounded-xl border-gray-300 bg-gray-50 text-sm text-gray-900 placeholder-gray-400 shadow-sm focus:bg-white focus:border-green-500 focus:ring-green-500 transition"
                        >

                    </div>

                </div>


                <!-- Filter Kategori -->
                <div class="md:col-span-4">

                    <label
                        for="kategori"
                        class="block text-sm font-semibold text-gray-700 mb-2"
                    >
                        Kategori Produk
                    </label>

                    <select
                        id="kategori"
                        name="kategori"
                        class="w-full py-3 px-4 rounded-xl border-gray-300 bg-gray-50 text-sm text-gray-900 shadow-sm focus:bg-white focus:border-green-500 focus:ring-green-500 transition"
                    >

                        <option value="">
                            Semua Kategori
                        </option>

                        @foreach($categories as $cat)

                            <option
                                value="{{ $cat->id }}"
                                {{ request('kategori') == $cat->id ? 'selected' : '' }}
                            >
                                {{ $cat->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <!-- Tombol Cari -->
                <div class="md:col-span-2 flex items-end">

                    <button
                        type="submit"
                        class="w-full py-3 px-5 bg-green-600 text-white font-bold text-sm rounded-xl hover:bg-green-700 active:bg-green-800 shadow-sm hover:shadow-md transition duration-200"
                    >

                        <span class="flex items-center justify-center gap-2">

                            <svg
                                class="w-4 h-4"
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

                            Cari Produk

                        </span>

                    </button>

                </div>

            </form>

        </div>


        <!-- ========================================================= -->
        <!-- HASIL PENCARIAN -->
        <!-- ========================================================= -->

        @if(request('search') || request('kategori'))

            <div class="flex flex-wrap items-center justify-between gap-3 mb-6">

                <div class="text-sm text-gray-600">

                    Menampilkan hasil pencarian

                    @if(request('search'))

                        untuk
                        <span class="font-bold text-gray-900">
                            "{{ request('search') }}"
                        </span>

                    @endif

                </div>


                <a
                    href="{{ route('produk.index') }}"
                    class="inline-flex items-center text-sm font-semibold text-green-600 hover:text-green-700"
                >

                    Reset Filter

                    <svg
                        class="w-4 h-4 ml-1"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        ></path>
                    </svg>

                </a>

            </div>

        @endif


        <!-- ========================================================= -->
        <!-- GRID PRODUK -->
        <!-- ========================================================= -->

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @forelse($products as $product)

                <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col border border-gray-200 overflow-hidden group">


                    <!-- ================================================= -->
                    <!-- GAMBAR PRODUK -->
                    <!-- ================================================= -->

                    <a
                        href="{{ route('produk.show', $product->id) }}"
                        class="block relative h-56 overflow-hidden bg-gray-100"
                    >

                        @if($product->images->isNotEmpty())

                            <img
                                src="{{ asset('storage/' . $product->images->first()->image) }}"
                                alt="{{ $product->name }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            >

                        @else

                            <div class="flex flex-col items-center justify-center h-full text-gray-400">

                                <svg
                                    class="w-10 h-10 mb-2 text-gray-300"
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

                                <span class="text-xs">
                                    No Image
                                </span>

                            </div>

                        @endif


                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition duration-300"></div>

                    </a>


                    <!-- ================================================= -->
                    <!-- INFO PRODUK -->
                    <!-- ================================================= -->

                    <div class="p-5 flex-1 flex flex-col">


                        <!-- Kategori -->
                        <div class="flex justify-between items-start mb-3">

                            <span class="inline-flex items-center text-xs font-bold text-green-700 bg-green-50 px-3 py-1.5 rounded-lg">

                                {{ $product->productCategory->name ?? 'Umum' }}

                            </span>

                        </div>


                        <!-- Nama Produk -->
                        <a
                            href="{{ route('produk.show', $product->id) }}"
                            class="block text-lg font-bold text-gray-900 hover:text-green-600 transition line-clamp-2 leading-snug"
                        >

                            {{ $product->name }}

                        </a>


                        <!-- Nama Toko -->
                        <p class="mt-2 text-sm text-gray-500 flex items-center min-w-0">

                            <svg
                                class="w-4 h-4 mr-1.5 text-gray-400 shrink-0"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
                                ></path>
                            </svg>


                            <a
                                href="{{ route('umkm.show', $product->seller_id) }}"
                                class="truncate hover:text-blue-600 hover:underline"
                            >

                                {{ $product->seller->business_name }}

                            </a>

                        </p>


                        <!-- Spacer -->
                        <div class="flex-1"></div>


                        <!-- ================================================= -->
                        <!-- HARGA -->
                        <!-- ================================================= -->

                        <div class="mt-5 pt-4 border-t border-gray-100 flex items-center justify-between">

                            <div>

                                <span class="block text-xs text-gray-400 mb-0.5">
                                    Harga
                                </span>

                                <span class="text-xl font-extrabold text-green-600">

                                    Rp {{ number_format($product->price, 0, ',', '.') }}

                                </span>

                            </div>


                            <!-- Arrow -->
                            <span class="w-9 h-9 rounded-full bg-green-50 text-green-600 flex items-center justify-center group-hover:bg-green-600 group-hover:text-white transition">

                                <svg
                                    class="w-4 h-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5l7 7-7 7"
                                    ></path>
                                </svg>

                            </span>

                        </div>

                    </div>

                </div>


            @empty


                <!-- ================================================= -->
                <!-- TIDAK ADA HASIL -->
                <!-- ================================================= -->

                <div class="col-span-full py-16 px-6 text-center bg-white rounded-2xl border border-dashed border-gray-300">

                    <div class="w-16 h-16 mx-auto rounded-full bg-gray-50 flex items-center justify-center mb-4">

                        <svg
                            class="w-8 h-8 text-gray-300"
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


                    <p class="text-gray-700 text-lg font-bold">
                        Pencarian tidak ditemukan.
                    </p>

                    <p class="text-gray-400 text-sm mt-1">
                        Coba gunakan kata kunci lain atau ubah kategori.
                    </p>


                    @if(request('search') || request('kategori'))

                        <a
                            href="{{ route('produk.index') }}"
                            class="inline-flex items-center mt-5 px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-xl transition"
                        >
                            Tampilkan Semua Produk
                        </a>

                    @endif

                </div>


            @endforelse

        </div>


        <!-- ========================================================= -->
        <!-- PAGINATION -->
        <!-- ========================================================= -->

        @if($products->hasPages())

            <div class="mt-10 pt-6 border-t border-gray-100">

                {{ $products->links() }}

            </div>

        @endif


    </div>

</x-front-layout>