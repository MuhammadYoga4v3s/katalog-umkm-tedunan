<x-guest-layout>

    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-[1.15fr_0.85fr]">


        <!-- ========================================================= -->
        <!-- BAGIAN KIRI - HERO -->
        <!-- ========================================================= -->

        <div class="relative hidden lg:block overflow-hidden">

            <!-- Background -->
            <img
                src="{{ asset('images/UMKM-Hero.jpeg') }}"
                alt="UMKM Desa Tedunan"
                class="absolute inset-0 w-full h-full object-cover"
            >


            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/40"></div>

            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-black/10"></div>


            <!-- ===================================================== -->
            <!-- KONTEN HERO -->
            <!-- ===================================================== -->

            <div class="relative z-10 h-full flex flex-col justify-between p-10 xl:p-14">


                <!-- LOGO DESA -->

                <div>

                    <img
                        src="{{ asset('images/logoDesa.png') }}"
                        alt="Logo Desa Tedunan"
                        class="h-20 xl:h-24 w-auto object-contain"
                    >

                </div>


                <!-- TEXT HERO -->

                <div class="max-w-2xl text-white pb-4">

                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/15 backdrop-blur-md border border-white/20 mb-5">

                        <span class="w-2 h-2 rounded-full bg-green-400 mr-2"></span>

                        <span class="text-sm font-semibold">
                            Katalog UMKM Desa Tedunan
                        </span>

                    </div>


                    <h1 class="text-4xl xl:text-6xl font-extrabold leading-[1.05] tracking-tight">

                        Kenali dan Dukung

                        <br>

                        <span class="text-green-300">
                            Produk Lokal Tedunan
                        </span>

                    </h1>


                    <p class="mt-6 max-w-xl text-base xl:text-lg text-white/85 leading-relaxed">

                        Temukan berbagai produk unggulan dari pelaku UMKM Desa Tedunan.
                        Dukung pertumbuhan usaha lokal dan bangga menggunakan produk desa.

                    </p>

                </div>

            </div>

        </div>



        <!-- ========================================================= -->
        <!-- BAGIAN KANAN - LOGIN -->
        <!-- ========================================================= -->

        <div class="min-h-screen flex items-center justify-center bg-white px-6 py-12 sm:px-10 lg:px-12 xl:px-20">

            <div class="w-full max-w-md">


                <!-- ================================================= -->
                <!-- LOGO -->
                <!-- ================================================= -->

                <div class="flex justify-center mb-7">

                    <img
                        src="{{ asset('images/logoDesa.png') }}"
                        alt="Logo Desa Tedunan"
                        class="h-20 w-auto object-contain"
                    >

                </div>


                <!-- ================================================= -->
                <!-- JUDUL -->
                <!-- ================================================= -->

                <div class="text-center mb-8">

                    <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">

                        Selamat Datang

                    </h2>


                    <p class="mt-2 text-sm text-gray-500">

                        Masuk ke akun Katalog UMKM Desa Tedunan

                    </p>

                </div>


                <!-- ================================================= -->
                <!-- SESSION STATUS -->
                <!-- ================================================= -->

                <x-auth-session-status
                    class="mb-5"
                    :status="session('status')"
                />


                <!-- ================================================= -->
                <!-- FORM -->
                <!-- ================================================= -->

                <form
                    method="POST"
                    action="{{ route('login') }}"
                    class="space-y-5"
                >

                    @csrf


                    <!-- ================================================= -->
                    <!-- EMAIL -->
                    <!-- ================================================= -->

                    <div>

                        <x-input-label
                            for="email"
                            :value="__('Email')"
                            class="text-sm font-semibold text-gray-700"
                        />


                        <x-text-input
                            id="email"
                            class="block mt-2 w-full px-4 py-3.5 rounded-xl border-gray-300 bg-gray-50 text-sm shadow-sm focus:bg-white focus:border-green-500 focus:ring-green-500 transition"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="Masukkan email Anda"
                        />


                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2"
                        />

                    </div>


                    <!-- ================================================= -->
                    <!-- PASSWORD -->
                    <!-- ================================================= -->

                    <div>

                        <div class="flex items-center justify-between">

                            <x-input-label
                                for="password"
                                :value="__('Password')"
                                class="text-sm font-semibold text-gray-700"
                            />


                            @if (Route::has('password.request'))

                                <a
                                    href="{{ route('password.request') }}"
                                    class="text-xs font-semibold text-green-600 hover:text-green-700 hover:underline transition"
                                >
                                    {{ __('Lupa password?') }}
                                </a>

                            @endif

                        </div>


                        <x-text-input
                            id="password"
                            class="block mt-2 w-full px-4 py-3.5 rounded-xl border-gray-300 bg-gray-50 text-sm shadow-sm focus:bg-white focus:border-green-500 focus:ring-green-500 transition"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Masukkan password Anda"
                        />


                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2"
                        />

                    </div>


                    <!-- ================================================= -->
                    <!-- REMEMBER ME -->
                    <!-- ================================================= -->

                    <div class="flex items-center">

                        <label
                            for="remember_me"
                            class="inline-flex items-center cursor-pointer"
                        >

                            <input
                                id="remember_me"
                                type="checkbox"
                                class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500"
                                name="remember"
                            >


                            <span class="ms-2 text-sm text-gray-600">
                                {{ __('Ingat saya') }}
                            </span>

                        </label>

                    </div>


                    <!-- ================================================= -->
                    <!-- BUTTON -->
                    <!-- ================================================= -->

                    <div class="pt-1">

                        <x-primary-button
                            class="w-full justify-center py-3.5 rounded-xl bg-green-600 hover:bg-green-700 focus:bg-green-700 active:bg-green-800 focus:ring-green-500 shadow-md hover:shadow-lg transition duration-200"
                        >

                            <span class="flex items-center justify-center gap-2">

                                {{ __('Masuk') }}

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

                            </span>

                        </x-primary-button>

                    </div>

                </form>


                <!-- ================================================= -->
                <!-- INFORMASI BAWAH -->
                <!-- ================================================= -->

                <div class="mt-8 pt-6 border-t border-gray-100 text-center">

                    <p class="text-xs text-gray-400">

                        Katalog UMKM Desa Tedunan

                    </p>

                    <p class="mt-1 text-[11px] text-gray-400">

                        Mendukung produk lokal dan pelaku usaha Desa Tedunan

                    </p>

                </div>


            </div>

        </div>

    </div>

</x-guest-layout>