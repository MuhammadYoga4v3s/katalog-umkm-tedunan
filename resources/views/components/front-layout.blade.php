<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ config('site.name') }}
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>


<body
    class="bg-gray-100 font-sans antialiased flex flex-col min-h-screen"
    x-data="{ mobileMenuOpen: false }"
>


    <!-- ============================================================= -->
    <!-- NAVBAR -->
    <!-- ============================================================= -->

    <nav class="bg-white shadow-sm sticky top-0 z-50">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex justify-between h-20 items-center">


                <!-- ================================================= -->
                <!-- LOGO & IDENTITAS -->
                <!-- ================================================= -->

                <div class="flex items-center">

                    <a
                        href="{{ route('home') }}"
                        class="flex items-center gap-2 sm:gap-3"
                    >

                        <!-- Logo Desa -->

                        <img
                            src="{{ asset(config('site.logos.desa')) }}"
                            alt="{{ config('site.village_name') }}"
                            class="h-9 sm:h-10 w-auto object-contain"
                        >


                        <!-- Logo KKN -->

                        <img
                            src="{{ asset(config('site.logos.kkn')) }}"
                            alt="KKN"
                            class="h-9 sm:h-10 w-auto object-contain"
                        >


                        <!-- Nama -->

                        <div class="flex flex-col">

                            <span class="text-[10px] sm:text-xs font-bold uppercase tracking-wider text-green-700">
                                {{ config('site.short_name') }}
                            </span>

                            <span class="text-sm sm:text-lg font-extrabold text-gray-900 leading-tight">
                                {{ config('site.village_name') }}
                            </span>

                        </div>

                    </a>

                </div>



                <!-- ================================================= -->
                <!-- NAVIGASI DESKTOP -->
                <!-- ================================================= -->

                <div class="hidden md:flex items-center gap-6">

                    @foreach(config('site.navigation') as $item)

                        <a
                            href="{{ route($item['route']) }}"
                            class="
                                text-sm
                                font-medium
                                transition
                                {{ request()->routeIs($item['active'])
                                    ? 'text-green-600 font-bold'
                                    : 'text-gray-700 hover:text-green-600'
                                }}
                            "
                        >
                            {{ $item['label'] }}
                        </a>

                    @endforeach

                </div>



                <!-- ================================================= -->
                <!-- AUTH DESKTOP -->
                <!-- ================================================= -->

                <div class="hidden md:flex items-center gap-3">

                    @auth

                        @php
                            $dashboardRoute = config(
                                'site.auth.dashboard_routes.' . Auth::user()->role
                            );
                        @endphp

                        @if($dashboardRoute)

                            <a
                                href="{{ route($dashboardRoute) }}"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow hover:bg-green-700 transition"
                            >
                                {{ config('site.auth.dashboard_label') }}
                            </a>

                        @endif

                    @else

                        <a
                            href="{{ route('login') }}"
                            class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-semibold transition"
                        >
                            {{ config('site.auth.login_label') }}
                        </a>


                        <a
                            href="{{ route('daftar-umkm') }}"
                            class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow-md transition"
                        >
                            {{ config('site.auth.register_label') }}
                        </a>

                    @endauth

                </div>



                <!-- ================================================= -->
                <!-- MOBILE BUTTON -->
                <!-- ================================================= -->

                <div class="flex md:hidden items-center">

                    <button
                        type="button"
                        @click="mobileMenuOpen = !mobileMenuOpen"
                        class="text-gray-700 hover:text-green-600 focus:outline-none p-2"
                        aria-label="Buka menu"
                    >

                        <svg
                            class="w-6 h-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                x-show="!mobileMenuOpen"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"
                            />

                            <path
                                x-show="mobileMenuOpen"
                                x-cloak
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            />

                        </svg>

                    </button>

                </div>

            </div>

        </div>



        <!-- ========================================================= -->
        <!-- MOBILE MENU -->
        <!-- ========================================================= -->

        <div
            x-show="mobileMenuOpen"
            x-cloak
            x-transition
            class="md:hidden bg-white border-t border-gray-200 px-4 pt-2 pb-4 space-y-2 shadow-lg"
        >

            @foreach(config('site.navigation') as $item)

                <a
                    href="{{ route($item['route']) }}"
                    class="
                        block
                        px-3
                        py-2
                        rounded-md
                        text-base
                        font-medium
                        {{ request()->routeIs($item['active'])
                            ? 'bg-green-50 text-green-700'
                            : 'text-gray-700 hover:bg-gray-50'
                        }}
                    "
                >
                    {{ $item['label'] }}
                </a>

            @endforeach



            <!-- Auth Mobile -->

            <div class="pt-4 border-t border-gray-200 flex flex-col gap-2">

                @auth

                    @php
                        $dashboardRoute = config(
                            'site.auth.dashboard_routes.' . Auth::user()->role
                        );
                    @endphp

                    @if($dashboardRoute)

                        <a
                            href="{{ route($dashboardRoute) }}"
                            class="w-full text-center bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow"
                        >
                            {{ config('site.auth.dashboard_label') }}
                        </a>

                    @endif

                @else

                    <a
                        href="{{ route('login') }}"
                        class="w-full text-center text-gray-700 border border-gray-300 px-4 py-2 rounded-lg text-sm font-semibold"
                    >
                        {{ config('site.auth.login_label') }}
                    </a>


                    <a
                        href="{{ route('daftar-umkm') }}"
                        class="w-full text-center bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow"
                    >
                        {{ config('site.auth.register_label') }}
                    </a>

                @endauth

            </div>

        </div>

    </nav>



    <!-- ============================================================= -->
    <!-- CONTENT -->
    <!-- ============================================================= -->

    <main class="flex-grow">

        {{ $slot }}

    </main>



    <!-- ============================================================= -->
    <!-- FOOTER -->
    <!-- ============================================================= -->

    <footer class="bg-gray-900 text-white border-t mt-auto py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-2">


            <!-- Copyright -->

            <p class="text-xs sm:text-sm text-gray-300 font-medium">

                &copy;
                {{ date('Y') }}
                {{ config('site.footer.copyright') }}

                <span class="mx-1">&bull;</span>

                Developed by
                {{ config('site.footer.developer') }}

            </p>


            <!-- Description -->

            <p class="text-xs text-gray-500">

                {{ config('site.footer.description') }}

            </p>


        </div>

    </footer>


</body>

</html>