<x-front-layout>

    <!-- ========================================================= -->
    <!-- HERO SECTION -->
    <!-- ========================================================= -->
    <div class="bg-gradient-to-r from-green-700 via-green-800 to-emerald-900 text-white py-16 sm:py-20 relative overflow-hidden">

        <!-- Dekorasi background -->
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:16px_16px]"></div>

        <div class="absolute -top-24 -right-24 w-72 h-72 bg-green-400/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-32 -left-20 w-80 h-80 bg-emerald-400/10 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">

            <span class="inline-flex items-center bg-green-600/40 text-green-100 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-widest border border-green-400/30 backdrop-blur-sm">
                Profil & Program Kerja
            </span>

            <h1 class="mt-5 text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight">
                Tentang Desa Tedunan & KKN-T
            </h1>

            <p class="mt-4 text-base sm:text-lg lg:text-xl text-green-100 max-w-3xl mx-auto px-2 leading-relaxed">
                Digitalisasi UMKM Desa Tedunan melalui inovasi, kolaborasi,
                dan pemberdayaan ekonomi lokal menuju lumbung mandiri.
            </p>

            <!-- Tombol Website Desa -->
            <div class="mt-7">
                <a href="https://www.tedunan-wedung.desa.id/"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 bg-white text-green-800 hover:bg-green-50 px-5 py-2.5 rounded-lg font-bold text-sm shadow-lg hover:shadow-xl transition">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657-2.686 2.5-5.733 2.5-9S13.657 5.686 12 3m0 18c-1.657-2.686-2.5-5.733-2.5-9S10.343 5.686 12 3"/>
                    </svg>

                    Website Resmi Desa Tedunan

                    <svg class="w-4 h-4"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4m-4-10h6m0 0v6m0-6L10 14"/>
                    </svg>
                </a>
            </div>

        </div>
    </div>


    <!-- ========================================================= -->
    <!-- CONTENT -->
    <!-- ========================================================= -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">


        <!-- ===================================================== -->
        <!-- STATISTIK -->
        <!-- ===================================================== -->
        <div class="bg-white rounded-2xl shadow-xl -mt-20 sm:-mt-24 p-6 sm:p-10 mb-12 sm:mb-16 relative z-10 border border-gray-100">

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 sm:gap-8 text-center divide-y sm:divide-y-0 sm:divide-x divide-gray-100">

                <div class="p-4">
                    <div class="text-3xl sm:text-4xl font-extrabold text-green-700">
                        {{ $totalUMKM }}
                    </div>

                    <div class="mt-1 text-xs sm:text-sm font-bold text-gray-500 uppercase tracking-wider">
                        UMKM Bergabung
                    </div>
                </div>

                <div class="p-4 pt-6 sm:pt-4">
                    <div class="text-3xl sm:text-4xl font-extrabold text-green-700">
                        {{ $totalProduk }}
                    </div>

                    <div class="mt-1 text-xs sm:text-sm font-bold text-gray-500 uppercase tracking-wider">
                        Produk Lokal
                    </div>
                </div>

                <div class="p-4 pt-6 sm:pt-4">
                    <div class="text-3xl sm:text-4xl font-extrabold text-green-700">
                        {{ $totalKategori }}
                    </div>

                    <div class="mt-1 text-xs sm:text-sm font-bold text-gray-500 uppercase tracking-wider">
                        Kategori Usaha
                    </div>
                </div>

            </div>
        </div>


        <!-- ===================================================== -->
        <!-- PROFIL DESA & KKN -->
        <!-- ===================================================== -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center mb-16">

            <!-- Text -->
            <div class="lg:col-span-7 space-y-4">

                <div class="inline-flex items-center space-x-2 text-green-700 font-semibold text-sm">

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>

                    <span>Mengenal Lebih Dekat Desa Tedunan</span>

                </div>

                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-gray-900 leading-tight">
                    Potensi Mikro dan Semangat Kemandirian Warga Desa
                </h2>

                <div class="text-gray-600 space-y-4 leading-relaxed text-sm sm:text-base">

                    <p>
                        Desa Tedunan memiliki beragam potensi ekonomi lokal
                        yang menjadi bagian penting dalam kehidupan masyarakat.
                        Potensi tersebut mencakup hasil pertanian, perikanan,
                        peternakan, produksi garam, kerajinan, hingga berbagai
                        produk olahan yang dikembangkan oleh pelaku UMKM desa.
                    </p>

                    <p>
                        Melalui program
                        <strong class="text-gray-800">
                            Kuliah Kerja Nyata Tematik (KKN-T) UNDIP 2026
                        </strong>,
                        kami berinisiatif membangun sebuah platform katalog
                        digital untuk membantu memperkenalkan dan mendokumentasikan
                        potensi UMKM Desa Tedunan secara lebih terstruktur.
                    </p>

                    <p>
                        Platform ini diharapkan dapat menjadi media informasi
                        bagi masyarakat sekaligus sarana promosi bagi pelaku
                        usaha lokal. Dengan adanya digitalisasi ini, data UMKM,
                        produk, dan potensi ekonomi desa dapat terdokumentasi
                        dengan lebih baik dan mudah diakses.
                    </p>

                    <p>
                        Ke depannya, katalog digital ini diharapkan dapat terus
                        dikembangkan dan dikelola secara berkelanjutan bersama
                        Pemerintah Desa Tedunan sebagai bagian dari upaya
                        mewujudkan ekonomi desa yang mandiri dan berdaya saing.
                    </p>

                </div>

            </div>


            <!-- Foto -->
            <div class="lg:col-span-5">

                <div class="bg-white p-3 rounded-2xl shadow-xl border border-gray-100 overflow-hidden group">

                    <div class="h-72 sm:h-80 rounded-xl overflow-hidden relative">

                        <img src="{{ asset('images/UMKM-hero.jpeg') }}"
                             alt="Potensi Desa Tedunan"
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent flex items-end p-6">

                            <div>
                                <p class="text-white text-sm font-semibold">
                                    Desa Tedunan
                                </p>

                                <p class="text-white/80 text-xs mt-1">
                                    Potensi dan aktivitas ekonomi masyarakat desa
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- ===================================================== -->
        <!-- INFORMASI WEBSITE DESA -->
        <!-- ===================================================== -->
        <div class="mb-16">

            <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-green-700 to-emerald-800 shadow-xl">

                <!-- Dekorasi -->
                <div class="absolute -right-16 -top-16 w-48 h-48 bg-white/10 rounded-full"></div>
                <div class="absolute -left-10 -bottom-20 w-52 h-52 bg-white/5 rounded-full"></div>

                <div class="relative z-10 p-6 sm:p-8 lg:p-10">

                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">

                        <!-- Icon -->
                        <div class="lg:col-span-2 flex justify-center lg:justify-start">

                            <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-white/15 border border-white/20 flex items-center justify-center backdrop-blur-sm">

                                <svg class="w-9 h-9 sm:w-10 sm:h-10 text-white"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="1.8"
                                          d="M3 21h18M4 21V10l8-6 8 6v11M8 21v-7h8v7M9 10h.01M15 10h.01"/>
                                </svg>

                            </div>

                        </div>


                        <!-- Text -->
                        <div class="lg:col-span-7 text-center lg:text-left">

                            <p class="text-green-200 text-xs font-bold uppercase tracking-widest">
                                Informasi Resmi Desa
                            </p>

                            <h2 class="text-xl sm:text-2xl font-extrabold text-white mt-1">
                                Pemerintah Desa Tedunan
                            </h2>

                            <p class="text-green-100 text-sm sm:text-base mt-2 leading-relaxed">
                                Untuk mendapatkan informasi resmi mengenai
                                pemerintahan, pelayanan masyarakat, berita,
                                kegiatan, dan informasi Desa Tedunan, silakan
                                kunjungi website resmi Pemerintah Desa Tedunan.
                            </p>

                        </div>


                        <!-- Button -->
                        <div class="lg:col-span-3 flex justify-center lg:justify-end">

                            <a href="https://www.tedunan-wedung.desa.id/"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="inline-flex items-center justify-center gap-2 bg-white text-green-800 hover:bg-green-50 px-5 py-3 rounded-xl font-bold text-sm shadow-lg hover:shadow-xl transition-all duration-200">

                                Kunjungi Website Desa

                                <svg class="w-4 h-4"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4m-4-10h6m0 0v6m0-6L10 14"/>
                                </svg>

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- ===================================================== -->
        <!-- GALERI DOKUMENTASI -->
        <!-- ===================================================== -->
        <div class="bg-white rounded-2xl p-6 sm:p-10 shadow-sm border border-gray-200">

            <!-- Header -->
            <div class="text-center max-w-2xl mx-auto mb-10">

                <span class="inline-block text-xs font-bold text-green-700 uppercase tracking-widest bg-green-50 border border-green-100 px-3 py-1 rounded-full">
                    Dokumentasi Kegiatan
                </span>

                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-3">
                    Galeri Dokumentasi KKN
                </h2>

                <p class="mt-2 text-sm sm:text-base text-gray-500">
                    Momen kegiatan survei, pendataan, sosialisasi,
                    pendampingan, dan digitalisasi UMKM bersama masyarakat
                    Desa Tedunan.
                </p>

            </div>


            <!-- Gallery -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @for ($i = 1; $i <= 9; $i++)

                    <div class="bg-gray-50 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 group">

                        <!-- Image -->
                        <div class="h-56 overflow-hidden relative bg-gray-200">

                            <img src="{{ asset('images/dokum' . $i . '.jpeg') }}"
                                 alt="Dokumentasi KKN {{ $i }}"
                                 loading="lazy"
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">

                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-80"></div>

                            <!-- Number -->
                            <span class="absolute top-3 left-3 bg-black/60 backdrop-blur-md text-white text-xs px-2.5 py-1 rounded-md font-medium">
                                Dokumentasi #{{ $i }}
                            </span>

                        </div>


                        <!-- Caption -->
                        <div class="p-5">

                            <p class="text-xs font-bold text-green-700 uppercase tracking-wide">
                                KKN-T UNDIP 2026
                            </p>

                            <h3 class="text-base font-bold text-gray-900 mt-1">
                                Pendampingan & Digitalisasi UMKM Desa
                            </h3>

                            <p class="text-xs text-gray-500 mt-1">
                                Dokumentasi kegiatan bersama masyarakat dan
                                pelaku usaha lokal Desa Tedunan.
                            </p>

                        </div>

                    </div>

                @endfor

            </div>

        </div>


        <!-- ===================================================== -->
        <!-- CTA PENUTUP -->
        <!-- ===================================================== -->
        <div class="mt-12 text-center">

            <div class="max-w-3xl mx-auto">

                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">
                    Bersama Mengembangkan Potensi Desa Tedunan
                </h2>

                <p class="mt-3 text-sm sm:text-base text-gray-500 leading-relaxed">
                    Katalog digital ini menjadi salah satu langkah kecil
                    dalam mendukung promosi, dokumentasi, dan pengembangan
                    UMKM Desa Tedunan secara berkelanjutan.
                </p>

                <div class="mt-6 flex flex-col sm:flex-row items-center justify-center gap-3">

                    <a href="{{ route('umkm.index') }}"
                       class="inline-flex items-center justify-center gap-2 bg-green-700 hover:bg-green-800 text-white px-5 py-2.5 rounded-lg font-bold text-sm transition shadow-sm">

                        Jelajahi UMKM Desa

                        <svg class="w-4 h-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>

                    </a>

                    <a href="https://www.tedunan-wedung.desa.id/"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="inline-flex items-center justify-center gap-2 bg-white hover:bg-gray-50 text-gray-700 border border-gray-200 px-5 py-2.5 rounded-lg font-bold text-sm transition shadow-sm">

                        Website Resmi Desa

                        <svg class="w-4 h-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4m-4-10h6m0 0v6m0-6L10 14"/>
                        </svg>

                    </a>

                </div>

            </div>

        </div>

    </div>

</x-front-layout>