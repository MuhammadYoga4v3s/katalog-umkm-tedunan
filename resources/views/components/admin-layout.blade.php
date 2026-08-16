<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Katalog UMKM Desa Tedunan</title>
    <!-- Memanggil Tailwind CSS bawaan Breeze -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg border-r">
            <div class="p-6 border-b">
                <h2 class="text-xl font-extrabold text-blue-600">Admin Panel</h2>
                <p class="text-sm text-gray-500">UMKM Tedunan</p>
            </div>
            <nav class="mt-4 px-4 space-y-2">
                <!-- Nanti href-nya kita perbarui satu per satu kalau rutenya sudah dibuat -->
                <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4 rounded bg-blue-50 text-blue-700 font-medium">Dashboard</a>
                <a href="{{ route('admin.akun-penjual.index') }}" class="block py-2.5 px-4 rounded hover:bg-gray-100 text-gray-700">Akun UMKM</a>
                <a href="{{ route('admin.verifikasi.index') }}" class="block py-2.5 px-4 rounded hover:bg-gray-100 text-gray-700">Verifikasi</a>
                <a href="{{ route('admin.kategori-usaha.index') }}" class="block py-2.5 px-4 rounded hover:bg-gray-100 text-gray-700">Kategori Usaha</a>
                <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-100 text-gray-700">Produk</a>
                <a href="{{ route('admin.laporan.download') }}" class="block py-2.5 px-4 rounded hover:bg-gray-100 text-gray-700" target="_blank">Unduh Laporan (PDF)</a>
                <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-100 text-gray-700">Pengaturan</a>
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