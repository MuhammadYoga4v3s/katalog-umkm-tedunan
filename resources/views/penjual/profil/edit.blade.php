<x-seller-layout>

    <div class="max-w-5xl mx-auto space-y-6">

        <!-- ===================================================== -->
        <!-- HEADER -->
        <!-- ===================================================== -->

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div>
                <div class="flex items-center gap-2 mb-1">

                    <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-green-50 text-green-700 text-xs font-bold">
                        Profil UMKM
                    </span>

                </div>

                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900">
                    Pengaturan Profil Toko
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Kelola informasi usaha yang akan ditampilkan kepada pengunjung katalog.
                </p>
            </div>

        </div>



        <!-- ===================================================== -->
        <!-- ALERT SUCCESS -->
        <!-- ===================================================== -->

        @if(session('success'))

            <div
                class="flex items-start gap-3 p-4 bg-green-50 border border-green-200 rounded-2xl"
            >

                <div class="w-9 h-9 rounded-xl bg-green-100 text-green-600 flex items-center justify-center shrink-0">

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

                </div>

                <div>

                    <p class="font-bold text-green-800 text-sm">
                        Berhasil disimpan
                    </p>

                    <p class="text-sm text-green-700 mt-0.5">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        @endif



        <!-- ===================================================== -->
        <!-- ALERT ERROR -->
        <!-- ===================================================== -->

        @if($errors->any())

            <div
                class="p-4 bg-red-50 border border-red-200 rounded-2xl"
            >

                <div class="flex items-start gap-3">

                    <div class="w-9 h-9 rounded-xl bg-red-100 text-red-600 flex items-center justify-center shrink-0">

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
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                            />

                        </svg>

                    </div>

                    <div>

                        <p class="font-bold text-red-800 text-sm">
                            Ada informasi yang perlu diperbaiki
                        </p>

                        <ul class="mt-1 text-sm text-red-700 list-disc ml-4 space-y-0.5">

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



        <!-- ===================================================== -->
        <!-- FORM -->
        <!-- ===================================================== -->

        <form
            action="{{ route('seller.profil.update') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')



            <!-- ================================================= -->
            <!-- FOTO PROFIL -->
            <!-- ================================================= -->

            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden mb-6">

                <div class="px-5 sm:px-6 py-5 border-b border-gray-100">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-green-50 text-green-600 flex items-center justify-center">

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
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                />

                            </svg>

                        </div>

                        <div>

                            <h2 class="font-bold text-gray-900">
                                Foto Toko
                            </h2>

                            <p class="text-xs text-gray-500 mt-0.5">
                                Gunakan foto yang jelas dan mewakili usaha Anda.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="p-5 sm:p-6">

                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6">

                        <!-- Preview -->

                        <div class="shrink-0">

                            @if($seller->profile_image)

                                <img
                                    class="h-28 w-28 object-cover rounded-2xl border border-gray-200 shadow-sm"
                                    src="{{ asset('storage/' . $seller->profile_image) }}"
                                    alt="Foto Profil"
                                >

                            @else

                                <div class="h-28 w-28 rounded-2xl bg-gradient-to-br from-green-50 to-emerald-100 flex items-center justify-center text-green-600 border border-green-100">

                                    <svg
                                        class="w-12 h-12"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M15.75 7.5a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a7.5 7.5 0 0115 0"
                                        />

                                    </svg>

                                </div>

                            @endif

                        </div>


                        <!-- Upload -->

                        <div class="flex-1 w-full">

                            <label class="block">

                                <span class="text-sm font-semibold text-gray-800">
                                    Ganti foto profil
                                </span>

                                <div class="mt-2">

                                    <input
                                        type="file"
                                        name="profile_image"
                                        accept="image/*"
                                        class="block w-full text-sm text-gray-500
                                        file:mr-4
                                        file:py-2.5
                                        file:px-4
                                        file:rounded-xl
                                        file:border-0
                                        file:text-sm
                                        file:font-semibold
                                        file:bg-green-50
                                        file:text-green-700
                                        hover:file:bg-green-100
                                        file:cursor-pointer"
                                    >

                                </div>

                            </label>

                            <p class="mt-2 text-xs text-gray-400">
                                Format JPG, JPEG, atau PNG. Ukuran maksimal 2MB.
                            </p>

                        </div>

                    </div>

                </div>

            </div>



            <!-- ================================================= -->
            <!-- INFORMASI USAHA -->
            <!-- ================================================= -->

            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden mb-6">

                <div class="px-5 sm:px-6 py-5 border-b border-gray-100">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-green-50 text-green-600 flex items-center justify-center">

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
                                    d="M3 21h18M5 21V5a2 2 0 012-2h10a2 2 0 012 2v16M9 7h1m-1 4h1m4-4h1m-1 4h1M9 21v-5h6v5"
                                />

                            </svg>

                        </div>

                        <div>

                            <h2 class="font-bold text-gray-900">
                                Informasi Usaha
                            </h2>

                            <p class="text-xs text-gray-500 mt-0.5">
                                Informasi dasar mengenai pemilik dan usaha Anda.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="p-5 sm:p-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                        <!-- Nama Pemilik -->

                        <div>

                            <label class="block text-sm font-semibold text-gray-700">
                                Nama Pemilik
                            </label>

                            <input
                                type="text"
                                name="owner_name"
                                value="{{ old('owner_name', $seller->owner_name) }}"
                                required
                                class="mt-2 block w-full rounded-xl border-gray-300 bg-gray-50 focus:bg-white focus:border-green-500 focus:ring-green-500 transition"
                            >

                        </div>



                        <!-- Nama Usaha -->

                        <div>

                            <label class="block text-sm font-semibold text-gray-700">
                                Nama Usaha / Toko
                            </label>

                            <input
                                type="text"
                                name="business_name"
                                value="{{ old('business_name', $seller->business_name) }}"
                                required
                                class="mt-2 block w-full rounded-xl border-gray-300 bg-gray-50 focus:bg-white focus:border-green-500 focus:ring-green-500 transition"
                            >

                        </div>



                        <!-- Deskripsi -->

                        <div class="md:col-span-2">

                            <label class="block text-sm font-semibold text-gray-700">
                                Deskripsi Usaha
                            </label>

                            <textarea
                                name="business_description"
                                rows="5"
                                placeholder="Ceritakan secara singkat mengenai usaha Anda..."
                                class="mt-2 block w-full rounded-xl border-gray-300 bg-gray-50 focus:bg-white focus:border-green-500 focus:ring-green-500 transition resize-none"
                            >{{ old('business_description', $seller->business_description) }}</textarea>

                            <p class="mt-1.5 text-xs text-gray-400">
                                Jelaskan produk atau layanan utama yang ditawarkan.
                            </p>

                        </div>

                    </div>

                </div>

            </div>



            <!-- ================================================= -->
            <!-- KONTAK & LOKASI -->
            <!-- ================================================= -->

            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden mb-6">

                <div class="px-5 sm:px-6 py-5 border-b border-gray-100">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-green-50 text-green-600 flex items-center justify-center">

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
                                    d="M3 5a2 2 0 012-2h3.28a2 2 0 011.94 1.515l.65 2.598a2 2 0 01-.51 1.88L9.12 10.88a16.015 16.015 0 006 6l1.887-1.24a2 2 0 011.88-.51l2.598.65A2 2 0 0123 17.72V21a2 2 0 01-2 2h-1C10.268 23 1 13.732 1 2V1a2 2 0 012-2z"
                                />

                            </svg>

                        </div>

                        <div>

                            <h2 class="font-bold text-gray-900">
                                Kontak & Lokasi
                            </h2>

                            <p class="text-xs text-gray-500 mt-0.5">
                                Informasi yang dapat digunakan pelanggan untuk menemukan usaha Anda.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="p-5 sm:p-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                        <!-- Nomor HP -->

                        <div>

                            <label class="block text-sm font-semibold text-gray-700">
                                Nomor WhatsApp / HP
                            </label>

                            <input
                                type="text"
                                name="phone"
                                value="{{ old('phone', $seller->phone) }}"
                                required
                                placeholder="08xxxxxxxxxx"
                                class="mt-2 block w-full rounded-xl border-gray-300 bg-gray-50 focus:bg-white focus:border-green-500 focus:ring-green-500 transition"
                            >

                        </div>



                        <!-- Google Maps -->

                        <div>

                            <label class="block text-sm font-semibold text-gray-700">

                                Link Google Maps

                                <span class="font-normal text-gray-400">
                                    (Opsional)
                                </span>

                            </label>

                            <input
                                type="url"
                                name="google_maps"
                                value="{{ old('google_maps', $seller->google_maps) }}"
                                placeholder="https://maps.google.com/..."
                                class="mt-2 block w-full rounded-xl border-gray-300 bg-gray-50 focus:bg-white focus:border-green-500 focus:ring-green-500 transition"
                            >

                        </div>



                        <!-- Alamat -->

                        <div class="md:col-span-2">

                            <label class="block text-sm font-semibold text-gray-700">
                                Alamat Lengkap
                            </label>

                            <input
                                type="text"
                                name="address"
                                value="{{ old('address', $seller->address) }}"
                                required
                                placeholder="Masukkan alamat lengkap usaha"
                                class="mt-2 block w-full rounded-xl border-gray-300 bg-gray-50 focus:bg-white focus:border-green-500 focus:ring-green-500 transition"
                            >

                        </div>



                        <!-- RT -->

                        <div>

                            <label class="block text-sm font-semibold text-gray-700">
                                RT
                            </label>

                            <input
                                type="text"
                                name="rt"
                                value="{{ old('rt', $seller->rt) }}"
                                required
                                class="mt-2 block w-full rounded-xl border-gray-300 bg-gray-50 focus:bg-white focus:border-green-500 focus:ring-green-500 transition"
                            >

                        </div>



                        <!-- RW -->

                        <div>

                            <label class="block text-sm font-semibold text-gray-700">
                                RW
                            </label>

                            <input
                                type="text"
                                name="rw"
                                value="{{ old('rw', $seller->rw) }}"
                                required
                                class="mt-2 block w-full rounded-xl border-gray-300 bg-gray-50 focus:bg-white focus:border-green-500 focus:ring-green-500 transition"
                            >

                        </div>

                    </div>

                </div>

            </div>



            <!-- ================================================= -->
            <!-- ACTION -->
            <!-- ================================================= -->

            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-5 sm:p-6">

                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">

                    <div class="text-center sm:text-left">

                        <p class="text-sm font-semibold text-gray-800">
                            Pastikan informasi sudah benar
                        </p>

                        <p class="text-xs text-gray-400 mt-0.5">
                            Perubahan akan diperbarui pada profil toko Anda.
                        </p>

                    </div>


                    <button
                        type="submit"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-green-600 hover:bg-green-700 active:bg-green-800 text-white font-bold py-3 px-7 rounded-xl shadow-md shadow-green-600/20 transition"
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

                        Simpan Perubahan

                    </button>

                </div>

            </div>

        </form>

    </div>

</x-seller-layout>