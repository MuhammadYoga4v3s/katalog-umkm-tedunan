<x-front-layout>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14">

        <!-- ========================================================= -->
        <!-- HEADER -->
        <!-- ========================================================= -->

        <div class="text-center mb-8">

            <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-green-50 mb-4">

                <svg
                    class="w-7 h-7 text-green-600"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-8h6v8M9 8h.01M12 8h.01M15 8h.01"
                    />
                </svg>

            </div>


            <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                Daftar sebagai UMKM
            </h1>


            <p class="mt-3 max-w-xl mx-auto text-sm sm:text-base text-gray-500 leading-relaxed">
                Bergabunglah dengan Katalog UMKM Desa Tedunan dan
                perkenalkan usaha serta produk Anda kepada masyarakat.
            </p>

        </div>


        <!-- ========================================================= -->
        <!-- CARD FORM -->
        <!-- ========================================================= -->

        <div class="bg-white rounded-3xl shadow-sm border border-gray-200 overflow-hidden">


            <!-- TOP ACCENT -->

            <div class="h-1.5 bg-green-600"></div>


            <div class="p-6 sm:p-8 lg:p-10">


                <!-- ================================================= -->
                <!-- ERROR -->
                <!-- ================================================= -->

                @if($errors->any())

                    <div class="mb-7 bg-red-50 border border-red-200 rounded-2xl p-4">

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
                                    />
                                </svg>

                            </div>


                            <div>

                                <p class="text-sm font-bold text-red-700 mb-1">
                                    Pendaftaran belum dapat diproses
                                </p>


                                <ul class="list-disc ml-4 text-sm text-red-600 space-y-1">

                                    @foreach($errors->all() as $error)

                                        <li>
                                            {{ $error }}
                                        </li>

                                    @endforeach

                                </ul>

                            </div>

                        </div>

                    </div>

                @endif


                <!-- ================================================= -->
                <!-- FORM -->
                <!-- ================================================= -->

                <form
                    action="{{ route('daftar-umkm.store') }}"
                    method="POST"
                >

                    @csrf


                    <div class="space-y-8">


                        <!-- ================================================= -->
                        <!-- SECTION INFORMASI USAHA -->
                        <!-- ================================================= -->

                        <div>

                            <div class="flex items-center gap-3 mb-5">

                                <div class="w-9 h-9 rounded-xl bg-green-50 flex items-center justify-center shrink-0">

                                    <svg
                                        class="w-5 h-5 text-green-600"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-8h6v8M9 8h.01M12 8h.01M15 8h.01"
                                        />
                                    </svg>

                                </div>


                                <div>

                                    <h2 class="font-bold text-gray-900">
                                        Informasi Usaha
                                    </h2>

                                    <p class="text-xs text-gray-500 mt-0.5">
                                        Masukkan informasi dasar mengenai usaha Anda.
                                    </p>

                                </div>

                            </div>


                            <div class="space-y-5">


                                <!-- Nama Pemilik -->

                                <div>

                                    <label
                                        for="name"
                                        class="block text-sm font-semibold text-gray-700 mb-2"
                                    >
                                        Nama Pemilik
                                    </label>


                                    <input
                                        id="name"
                                        type="text"
                                        name="name"
                                        value="{{ old('name') }}"
                                        required
                                        placeholder="Masukkan nama pemilik usaha"
                                        class="block w-full px-4 py-3.5 rounded-xl border-gray-300 bg-gray-50 text-sm shadow-sm focus:bg-white focus:border-green-500 focus:ring-green-500 transition"
                                    >

                                </div>


                                <!-- Nama Usaha -->

                                <div>

                                    <label
                                        for="business_name"
                                        class="block text-sm font-semibold text-gray-700 mb-2"
                                    >
                                        Nama Usaha / Toko
                                    </label>


                                    <input
                                        id="business_name"
                                        type="text"
                                        name="business_name"
                                        value="{{ old('business_name') }}"
                                        required
                                        placeholder="Contoh: UD Makmur Tedunan"
                                        class="block w-full px-4 py-3.5 rounded-xl border-gray-300 bg-gray-50 text-sm shadow-sm focus:bg-white focus:border-green-500 focus:ring-green-500 transition"
                                    >

                                </div>


                                <!-- Kategori -->

                                <div>

                                    <label
                                        for="business_category_id"
                                        class="block text-sm font-semibold text-gray-700 mb-2"
                                    >
                                        Kategori Usaha
                                    </label>


                                    <select
                                        id="business_category_id"
                                        name="business_category_id"
                                        required
                                        class="block w-full px-4 py-3.5 rounded-xl border-gray-300 bg-gray-50 text-base text-gray-800 shadow-sm focus:bg-white focus:border-green-500 focus:ring-green-500 transition"
                                    >

                                        <option value="">
                                            -- Pilih Kategori --
                                        </option>


                                        @foreach($categories as $cat)

                                            <option
                                                value="{{ $cat->id }}"
                                                {{ old('business_category_id') == $cat->id ? 'selected' : '' }}
                                            >
                                                {{ $cat->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>

                        </div>


                        <!-- ================================================= -->
                        <!-- PEMBATAS -->
                        <!-- ================================================= -->

                        <div class="border-t border-gray-100"></div>


                        <!-- ================================================= -->
                        <!-- SECTION LOGIN -->
                        <!-- ================================================= -->

                        <div>

                            <div class="flex items-center gap-3 mb-5">

                                <div class="w-9 h-9 rounded-xl bg-green-50 flex items-center justify-center shrink-0">

                                    <svg
                                        class="w-5 h-5 text-green-600"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M15 7a3 3 0 11-6 0 3 3 0 016 0zM5 21a7 7 0 0114 0M19 8v6m3-3h-6"
                                        />
                                    </svg>

                                </div>


                                <div>

                                    <h2 class="font-bold text-gray-900">
                                        Detail Login
                                    </h2>

                                    <p class="text-xs text-gray-500 mt-0.5">
                                        Gunakan informasi ini untuk masuk ke akun UMKM Anda.
                                    </p>

                                </div>

                            </div>


                            <!-- Info -->

                            <div class="mb-5 p-4 rounded-xl bg-amber-50 border border-amber-100">

                                <div class="flex items-start gap-3">

                                    <svg
                                        class="w-5 h-5 text-amber-500 shrink-0 mt-0.5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M12 9v3m0 4h.01M10.29 3.86l-7.82 13a2 2 0 001.71 3h15.64a2 2 0 001.71-3l-7.82-13a2 2 0 00-3.42 0z"
                                        />
                                    </svg>


                                    <p class="text-xs sm:text-sm text-amber-700 leading-relaxed">

                                        Pastikan email dan password yang digunakan benar.
                                        Simpan informasi login ini karena akan digunakan untuk
                                        mengakses akun UMKM Anda.

                                    </p>

                                </div>

                            </div>


                            <div class="space-y-5">


                                <!-- Email -->

                                <div>

                                    <label
                                        for="email"
                                        class="block text-sm font-semibold text-gray-700 mb-2"
                                    >
                                        Email Utama
                                    </label>


                                    <input
                                        id="email"
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                        placeholder="nama@email.com"
                                        autocomplete="email"
                                        class="block w-full px-4 py-3.5 rounded-xl border-gray-300 bg-gray-50 text-sm shadow-sm focus:bg-white focus:border-green-500 focus:ring-green-500 transition"
                                    >

                                </div>


                                <!-- Password -->

                                <div>

                                    <label
                                        for="password"
                                        class="block text-sm font-semibold text-gray-700 mb-2"
                                    >
                                        Password
                                    </label>


                                    <input
                                        id="password"
                                        type="password"
                                        name="password"
                                        required
                                        minlength="8"
                                        placeholder="Minimal 8 karakter"
                                        autocomplete="new-password"
                                        class="block w-full px-4 py-3.5 rounded-xl border-gray-300 bg-gray-50 text-sm shadow-sm focus:bg-white focus:border-green-500 focus:ring-green-500 transition"
                                    >


                                    <p class="mt-2 text-xs text-gray-400">
                                        Password minimal 8 karakter.
                                    </p>

                                </div>

                            </div>

                        </div>


                    </div>


                    <!-- ================================================= -->
                    <!-- BUTTON -->
                    <!-- ================================================= -->

                    <div class="mt-9 pt-6 border-t border-gray-100">

                        <button
                            type="submit"
                            class="w-full flex items-center justify-center gap-2 bg-green-600 hover:bg-green-700 text-white font-bold py-3.5 px-5 rounded-xl shadow-md hover:shadow-lg transition duration-200"
                        >

                            Kirim Pendaftaran


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
                                    d="M13 7l5 5m0 0l-5 5m5-5H6"
                                />
                            </svg>

                        </button>


                        <p class="text-center text-xs text-gray-400 mt-4">

                            Dengan mengirim pendaftaran, pastikan seluruh data yang
                            Anda masukkan sudah benar.

                        </p>

                    </div>


                </form>

            </div>

        </div>


        <!-- ========================================================= -->
        <!-- FOOTER KECIL -->
        <!-- ========================================================= -->

        <p class="text-center text-xs text-gray-400 mt-6">

            Katalog UMKM Desa Tedunan

        </p>

    </div>

</x-front-layout>