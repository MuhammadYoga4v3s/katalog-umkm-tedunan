<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog UMKM Desa Tedunan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased flex flex-col min-h-screen">
    
    <!-- Navbar Publik -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo / Nama Web -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600">UMKM Tedunan</a>
                    </div>
                    <!-- Menu Navigasi -->
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('home') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} text-sm font-medium">Home</a>
                        
                        <a href="{{ route('umkm.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('umkm.*') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} text-sm font-medium">UMKM</a>
                        
                        <a href="{{ route('produk.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('produk.*') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} text-sm font-medium">Produk</a>
                        
                        <a href="{{ route('tentang') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('tentang') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} text-sm font-medium">Tentang</a>
                    </div>
                </div>
                <!-- Tombol Login & Daftar -->
                <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-4">
                    @auth
                        <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('seller.dashboard') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">Ke Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700">Login</a>
                        <!-- Tambahan Tombol Daftar UMKM -->
                        <a href="{{ route('daftar-umkm') }}" class="bg-white text-blue-600 border border-blue-600 px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-50">Daftar UMKM</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-auto">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-sm text-gray-500">&copy; {{ date('Y') }} Desa Tedunan. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

</body>
</html>