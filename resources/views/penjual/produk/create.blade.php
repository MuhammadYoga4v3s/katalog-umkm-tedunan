<x-seller-layout>

    <div class="max-w-4xl mx-auto space-y-6">

        <!-- HEADER -->
        <div class="flex items-center gap-4">

            <a
                href="{{ route('seller.produk.index') }}"
                class="w-10 h-10 rounded-xl bg-white border border-gray-200 text-gray-500 hover:text-green-600 hover:border-green-200 hover:bg-green-50 flex items-center justify-center transition shadow-sm"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"
                    />
                </svg>
            </a>

            <div>
                <h1 class="text-2xl font-extrabold text-gray-900">
                    Tambah Produk Baru
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Tambahkan produk UMKM Anda ke katalog digital Desa Tedunan.
                </p>
            </div>

        </div>


        <!-- ERROR ALERT -->
        @if($errors->any())

            <div class="bg-red-50 border border-red-200 rounded-xl p-5">

                <div class="flex items-start gap-3">

                    <div class="shrink-0 w-9 h-9 rounded-lg bg-red-100 text-red-600 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 9v2m0 4h.01M10.29 3.86l-7.82 13a2 2 0 001.71 3h15.64a2 2 0 001.71-3l-7.82-13a2 2 0 00-3.42 0z"
                            />
                        </svg>
                    </div>

                    <div>
                        <p class="font-bold text-red-800 text-sm">
                            Periksa kembali data yang dimasukkan
                        </p>

                        <ul class="list-disc ml-5 mt-2 text-sm text-red-700 space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>

            </div>

        @endif


        <!-- FORM CARD -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

            <!-- CARD HEADER -->
            <div class="px-6 sm:px-8 py-5 border-b border-gray-100 bg-gradient-to-r from-green-50 to-white">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-green-100 text-green-700 flex items-center justify-center">

                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 4v16m8-8H4"
                            />
                        </svg>

                    </div>

                    <div>
                        <h2 class="font-extrabold text-gray-900">
                            Informasi Produk
                        </h2>

                        <p class="text-xs text-gray-500 mt-0.5">
                            Isi informasi produk dengan lengkap dan benar.
                        </p>
                    </div>

                </div>

            </div>


            <form
                action="{{ route('seller.produk.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="p-6 sm:p-8"
            >

                @csrf


                <!-- FOTO PRODUK -->
                <div class="mb-8">

                    <div class="flex items-center justify-between mb-2">

                        <div>
                            <label class="block text-sm font-bold text-gray-800">
                                Foto Produk
                                <span class="text-red-500">*</span>
                            </label>

                            <p class="text-xs text-gray-500 mt-1">
                                Gunakan foto produk yang jelas dan menarik.
                            </p>
                        </div>

                        <span class="hidden sm:inline-flex items-center px-3 py-1 rounded-full bg-green-50 text-green-700 text-xs font-semibold">
                            Bisa lebih dari 1 foto
                        </span>

                    </div>


                    <label
                        class="group mt-4 relative flex flex-col items-center justify-center w-full min-h-[230px] border-2 border-dashed border-gray-300 rounded-2xl bg-gray-50 hover:bg-green-50/50 hover:border-green-400 transition cursor-pointer"
                    >

                        <div class="text-center px-6">

                            <div class="mx-auto w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center group-hover:scale-105 transition">

                                <svg
                                    class="w-7 h-7"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M14 8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                    />
                                </svg>

                            </div>


                            <p class="mt-4 text-sm font-bold text-gray-700 group-hover:text-green-700 transition">
                                Pilih foto produk
                            </p>

                            <p class="text-xs text-gray-500 mt-1">
                                Anda dapat memilih beberapa foto sekaligus
                            </p>


                            <span class="inline-flex items-center mt-4 px-4 py-2 rounded-lg bg-green-600 group-hover:bg-green-700 text-white text-sm font-semibold transition">
                                Pilih Foto
                            </span>


                            <p class="text-[11px] text-gray-400 mt-3">
                                PNG, JPG, JPEG • Maks. 2MB per foto
                            </p>

                        </div>


                        <input
                            type="file"
                            name="images[]"
                            multiple
                            accept="image/*"
                            required
                            class="sr-only"
                        />

                    </label>

                </div>


                <!-- PEMBATAS -->
                <div class="border-t border-gray-100 my-8"></div>


                <!-- INFORMASI DASAR -->
                <div class="mb-8">

                    <div class="mb-5">

                        <h3 class="text-base font-extrabold text-gray-900">
                            Informasi Dasar
                        </h3>

                        <p class="text-xs text-gray-500 mt-1">
                            Informasi utama yang akan ditampilkan pada katalog.
                        </p>

                    </div>


                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                        <!-- Nama Produk -->
                        <div class="sm:col-span-2">

                            <label class="block text-sm font-bold text-gray-700">
                                Nama Produk
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                placeholder="Contoh: Garam Krosok Desa Tedunan"
                                class="mt-1.5 block w-full rounded-xl border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                            >

                        </div>


                        <!-- Kategori -->
                        <div class="sm:col-span-2">

                            <label class="block text-sm font-bold text-gray-700">
                                Kategori Produk
                                <span class="text-red-500">*</span>
                            </label>

                            <select
                                name="product_category_id"
                                required
                                class="mt-1.5 block w-full rounded-xl border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                            >

                                <option value="">
                                    -- Pilih Kategori Produk --
                                </option>

                                @foreach($categories as $cat)

                                    <option
                                        value="{{ $cat->id }}"
                                        {{ old('product_category_id') == $cat->id ? 'selected' : '' }}
                                    >
                                        {{ $cat->name }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <!-- Harga -->
                        <div>

                            <label class="block text-sm font-bold text-gray-700">
                                Harga (Rp)
                                <span class="text-red-500">*</span>
                            </label>

                            <div class="relative mt-1.5">

                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm font-semibold text-gray-400">
                                    Rp
                                </span>

                                <input
                                    type="number"
                                    name="price"
                                    value="{{ old('price', 0) }}"
                                    required
                                    min="0"
                                    class="block w-full rounded-xl border-gray-300 pl-10 shadow-sm focus:border-green-500 focus:ring-green-500"
                                >

                            </div>

                        </div>


                        <!-- Stok -->
                        <div>

                            <label class="block text-sm font-bold text-gray-700">
                                Stok Awal
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="number"
                                name="stock"
                                value="{{ old('stock', 1) }}"
                                required
                                min="0"
                                class="mt-1.5 block w-full rounded-xl border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                            >

                        </div>


                        <!-- Status -->
                        <div class="sm:col-span-2">

                            <label class="block text-sm font-bold text-gray-700">
                                Status Awal
                                <span class="text-red-500">*</span>
                            </label>

                            <select
                                name="status"
                                required
                                class="mt-1.5 block w-full rounded-xl border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                            >

                                <option
                                    value="available"
                                    {{ old('status') == 'available' ? 'selected' : '' }}
                                >
                                    Tersedia (Langsung Tampilkan)
                                </option>

                                <option
                                    value="unavailable"
                                    {{ old('status') == 'unavailable' ? 'selected' : '' }}
                                >
                                    Sembunyikan Dulu
                                </option>

                            </select>

                        </div>


                        <!-- Deskripsi -->
                        <div class="sm:col-span-2">

                            <label class="block text-sm font-bold text-gray-700">
                                Deskripsi Lengkap
                            </label>

                            <textarea
                                name="description"
                                rows="5"
                                placeholder="Jelaskan produk, ukuran, bahan, keunggulan, atau informasi lain yang perlu diketahui pembeli..."
                                class="mt-1.5 block w-full rounded-xl border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                            >{{ old('description') }}</textarea>

                            <p class="text-xs text-gray-400 mt-1.5">
                                Deskripsi yang lengkap membantu calon pembeli memahami produk Anda.
                            </p>

                        </div>

                    </div>

                </div>


                <!-- FOOTER FORM -->
                <div class="border-t border-gray-100 pt-6 flex flex-col-reverse sm:flex-row sm:items-center sm:justify-between gap-3">

                    <a
                        href="{{ route('seller.produk.index') }}"
                        class="w-full sm:w-auto text-center px-5 py-2.5 rounded-xl border border-gray-300 bg-white text-gray-700 font-semibold hover:bg-gray-50 transition"
                    >
                        Batal
                    </a>


                    <button
                        type="submit"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-2.5 rounded-xl bg-green-600 hover:bg-green-700 text-white font-bold shadow-sm hover:shadow-md transition"
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
                                d="M5 13l4 4L19 7"
                            />
                        </svg>

                        Upload & Simpan Produk

                    </button>

                </div>

            </form>

        </div>

    </div>

</x-seller-layout>