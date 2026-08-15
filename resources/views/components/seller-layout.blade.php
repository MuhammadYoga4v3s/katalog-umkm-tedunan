<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjual - Katalog UMKM Desa Tedunan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg border-r">
            <div class="p-6 border-b">
                <h2 class="text-xl font-extrabold text-green-600">Panel Penjual</h2>
                <p class="text-sm text-gray-500">UMKM Tedunan</p>
            </div>
            <nav class="mt-4 px-4 space-y-2">
                <a href="{{ route('seller.dashboard') }}" class="block py-2.5 px-4 rounded bg-green-50 text-green-700 font-medium">Dashboard</a>
                <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-100 text-gray-700">Profil Toko</a>
                <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-100 text-gray-700">Kelola Produk</a>
                <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-100 text-gray-700">Laporan</a>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Navbar / Topbar -->
            <header class="flex justify-between items-center py-4 px-6 bg-white shadow-sm border-b">
                <div class="text-gray-700 font-medium">
                    {{-- Judul Halaman dinamis --}}
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-600">Halo, {{ Auth::user()->name }}</span>
                    <!-- Tombol Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm text-red-500 hover:text-red-700 font-semibold">Logout</button>
                    </form>
                </div>
            </header>

            <!-- Bagian ini akan diisi oleh konten halaman yang sedang dibuka -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
                {{ $slot }}
            </main>
        </div>

    </div>
</body>
</html>