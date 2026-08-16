<x-admin-layout>
    <div x-data="{ showAddModal: false }" class="space-y-6">

        <!-- PAGE HEADER -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <div class="flex items-center gap-2 text-sm text-gray-500 mb-1">
                    <span>Admin</span>
                    <span>/</span>
                    <span class="text-green-600 font-medium">Akun UMKM</span>
                </div>

                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900">
                    Manajemen Akun UMKM
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Kelola akun penjual dan informasi usaha yang terdaftar di katalog.
                </p>
            </div>

            <button
                type="button"
                @click="showAddModal = true"
                class="inline-flex items-center justify-center gap-2 px-5 py-2.5
                       bg-green-600 hover:bg-green-700 text-white
                       rounded-xl font-semibold text-sm shadow-sm
                       hover:shadow-md transition-all duration-200"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 4v16m8-8H4"/>
                </svg>
                Buat Akun UMKM
            </button>
        </div>


        <!-- FLASH MESSAGE -->
        @if(session('success'))
            <div class="flex items-start gap-3 bg-green-50 border border-green-200
                        text-green-800 rounded-xl p-4">
                <div class="flex-shrink-0 mt-0.5">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

                <div>
                    <p class="font-semibold text-sm">Berhasil</p>
                    <p class="text-sm mt-0.5">{{ session('success') }}</p>
                </div>
            </div>
        @endif


        <!-- VALIDATION ERROR -->
        @if($errors->any())
            <div class="bg-red-50 border border-red-200 rounded-xl p-4">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>

                    <div>
                        <p class="font-semibold text-sm text-red-800">
                            Terdapat kesalahan
                        </p>

                        <ul class="mt-1 list-disc list-inside text-sm text-red-700 space-y-0.5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif


        <!-- SUMMARY -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

            <!-- Total -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">
                            Total Akun
                        </p>

                        <p class="text-2xl font-extrabold text-gray-900 mt-1">
                            {{ $sellers->count() }}
                        </p>
                    </div>

                    <div class="w-11 h-11 rounded-xl bg-green-50 text-green-600
                                flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                </div>
            </div>


            <!-- Aktif -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">
                            Akun Aktif
                        </p>

                        <p class="text-2xl font-extrabold text-green-600 mt-1">
                            {{ $sellers->where('status', 'active')->count() }}
                        </p>
                    </div>

                    <div class="w-11 h-11 rounded-xl bg-green-50 text-green-600
                                flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                </div>
            </div>


            <!-- Tidak Aktif -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">
                            Tidak Aktif
                        </p>

                        <p class="text-2xl font-extrabold text-gray-700 mt-1">
                            {{ $sellers->where('status', '!=', 'active')->count() }}
                        </p>
                    </div>

                    <div class="w-11 h-11 rounded-xl bg-gray-100 text-gray-500
                                flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M18 12H6"/>
                        </svg>
                    </div>
                </div>
            </div>

        </div>


        <!-- TABLE CARD -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

            <!-- Table Header -->
            <div class="px-5 sm:px-6 py-5 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="font-bold text-gray-900">
                            Daftar Akun Penjual
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Daftar seluruh akun UMKM yang terdaftar.
                        </p>
                    </div>
                </div>
            </div>


            <!-- Responsive Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full">

                    <thead>
                        <tr class="bg-gray-50/80 border-b border-gray-100">
                            <th class="px-6 py-4 text-left text-xs font-bold
                                       text-gray-500 uppercase tracking-wider">
                                Akun
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-bold
                                       text-gray-500 uppercase tracking-wider">
                                Usaha
                            </th>

                            <th class="px-6 py-4 text-center text-xs font-bold
                                       text-gray-500 uppercase tracking-wider">
                                Status
                            </th>

                            <th class="px-6 py-4 text-right text-xs font-bold
                                       text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse($sellers as $user)

                            <tr class="hover:bg-green-50/30 transition-colors duration-150">

                                <!-- AKUN -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">

                                        <div class="w-10 h-10 rounded-xl bg-green-100
                                                    text-green-700 flex items-center
                                                    justify-center font-bold">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>

                                        <div>
                                            <p class="text-sm font-bold text-gray-900">
                                                {{ $user->name }}
                                            </p>

                                            <p class="text-xs text-gray-500 mt-0.5">
                                                {{ $user->email }}
                                            </p>
                                        </div>

                                    </div>
                                </td>


                                <!-- USAHA -->
                                <td class="px-6 py-4">
                                    @if($user->seller)
                                        <p class="text-sm font-semibold text-gray-900">
                                            {{ $user->seller->business_name }}
                                        </p>

                                        <p class="text-xs text-gray-500 mt-1">
                                            {{ $user->seller->businessCategory->name ?? 'Kategori belum diatur' }}
                                        </p>
                                    @else
                                        <span class="text-sm text-gray-400">
                                            Data usaha belum tersedia
                                        </span>
                                    @endif
                                </td>


                                <!-- STATUS -->
                                <td class="px-6 py-4 text-center">
                                    @if($user->status === 'active')

                                        <span class="inline-flex items-center gap-1.5
                                                     px-3 py-1 rounded-full
                                                     bg-green-50 text-green-700
                                                     text-xs font-bold">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                            Aktif
                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-1.5
                                                     px-3 py-1 rounded-full
                                                     bg-gray-100 text-gray-600
                                                     text-xs font-bold">
                                            <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>
                                            Tidak Aktif
                                        </span>

                                    @endif
                                </td>


                                <!-- AKSI -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-end gap-2">

                                        <!-- Toggle Status -->
                                        <form
                                            action="{{ route('admin.akun-penjual.update', $user->id) }}"
                                            method="POST"
                                        >
                                            @csrf
                                            @method('PUT')

                                            <input
                                                type="hidden"
                                                name="status"
                                                value="{{ $user->status === 'active' ? 'inactive' : 'active' }}"
                                            >

                                            <button
                                                type="submit"
                                                class="inline-flex items-center gap-1.5 px-3 py-2
                                                       rounded-lg text-xs font-semibold
                                                       transition
                                                       {{ $user->status === 'active'
                                                            ? 'bg-amber-50 text-amber-700 hover:bg-amber-100'
                                                            : 'bg-green-50 text-green-700 hover:bg-green-100' }}"
                                            >
                                                @if($user->status === 'active')
                                                    Nonaktifkan
                                                @else
                                                    Aktifkan
                                                @endif
                                            </button>
                                        </form>


                                        <!-- Delete -->
                                        <form
                                            action="{{ route('admin.akun-penjual.destroy', $user->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus akun ini secara permanen? Semua data produk yang terkait juga dapat terhapus.');"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="inline-flex items-center justify-center
                                                       w-9 h-9 rounded-lg
                                                       bg-red-50 text-red-600
                                                       hover:bg-red-100 transition"
                                                title="Hapus akun"
                                            >
                                                <svg class="w-4 h-4"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     viewBox="0 0 24 24">
                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3m-4 0h14"/>
                                                </svg>
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="4" class="px-6 py-16 text-center">

                                    <div class="flex flex-col items-center">

                                        <div class="w-14 h-14 rounded-2xl bg-gray-100
                                                    flex items-center justify-center mb-4">
                                            <svg class="w-7 h-7 text-gray-400"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="1.8"
                                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                        </div>

                                        <p class="font-semibold text-gray-700">
                                            Belum ada akun UMKM
                                        </p>

                                        <p class="text-sm text-gray-500 mt-1">
                                            Buat akun pertama untuk mulai mengelola UMKM.
                                        </p>

                                    </div>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>


        <!-- MODAL TAMBAH AKUN -->
        <div
            x-show="showAddModal"
            x-cloak
            class="fixed inset-0 z-50 overflow-y-auto"
        >

            <!-- Overlay -->
            <div
                class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm"
                @click="showAddModal = false"
                x-transition.opacity
            ></div>


            <!-- Modal -->
            <div class="min-h-screen flex items-center justify-center
                        px-4 py-8 relative">

                <div
                    @click.stop
                    x-show="showAddModal"
                    x-transition
                    class="relative w-full max-w-2xl bg-white rounded-2xl
                           shadow-2xl overflow-hidden"
                >

                    <!-- Modal Header -->
                    <div class="px-6 py-5 bg-gradient-to-r from-green-700 to-green-600 text-white">

                        <div class="flex items-start justify-between">

                            <div>
                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10 rounded-xl bg-white/15
                                                flex items-center justify-center">

                                        <svg class="w-5 h-5"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M12 4v16m8-8H4"/>
                                        </svg>

                                    </div>

                                    <div>
                                        <h3 class="text-lg font-bold">
                                            Buat Akun UMKM
                                        </h3>

                                        <p class="text-green-100 text-sm">
                                            Tambahkan akun penjual baru.
                                        </p>
                                    </div>

                                </div>
                            </div>


                            <button
                                type="button"
                                @click="showAddModal = false"
                                class="w-9 h-9 rounded-lg hover:bg-white/10
                                       flex items-center justify-center transition"
                            >
                                <svg class="w-5 h-5"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>

                        </div>

                    </div>


                    <!-- Form -->
                    <form
                        action="{{ route('admin.akun-penjual.store') }}"
                        method="POST"
                        class="p-6"
                    >
                        @csrf

                        <!-- Section Akun -->
                        <div class="mb-6">

                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-7 h-7 rounded-lg bg-green-100
                                            text-green-700 flex items-center justify-center
                                            text-xs font-bold">
                                    1
                                </div>

                                <h4 class="font-bold text-gray-900">
                                    Informasi Akun
                                </h4>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                                        Nama Pemilik
                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        value="{{ old('name') }}"
                                        required
                                        placeholder="Contoh: Budi Santoso"
                                        class="block w-full rounded-xl border-gray-300
                                               shadow-sm focus:border-green-500
                                               focus:ring-green-500"
                                    >
                                </div>


                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                                        Email Login
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                        placeholder="email@example.com"
                                        class="block w-full rounded-xl border-gray-300
                                               shadow-sm focus:border-green-500
                                               focus:ring-green-500"
                                    >
                                </div>


                                <div class="md:col-span-2">

                                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                                        Password Sementara
                                    </label>

                                    <input
                                        type="password"
                                        name="password"
                                        required
                                        minlength="8"
                                        placeholder="Minimal 8 karakter"
                                        class="block w-full rounded-xl border-gray-300
                                               shadow-sm focus:border-green-500
                                               focus:ring-green-500"
                                    >

                                    <p class="text-xs text-gray-500 mt-1.5">
                                        Pastikan password disampaikan kepada pemilik UMKM.
                                    </p>

                                </div>

                            </div>

                        </div>


                        <!-- Section Usaha -->
                        <div>

                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-7 h-7 rounded-lg bg-green-100
                                            text-green-700 flex items-center justify-center
                                            text-xs font-bold">
                                    2
                                </div>

                                <h4 class="font-bold text-gray-900">
                                    Informasi Usaha
                                </h4>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                                        Nama Usaha
                                    </label>

                                    <input
                                        type="text"
                                        name="business_name"
                                        value="{{ old('business_name') }}"
                                        required
                                        placeholder="Contoh: Toko Berkah"
                                        class="block w-full rounded-xl border-gray-300
                                               shadow-sm focus:border-green-500
                                               focus:ring-green-500"
                                    >
                                </div>


                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                                        Kategori Usaha
                                    </label>

                                    <select
                                        name="business_category_id"
                                        required
                                        class="block w-full rounded-xl border-gray-300
                                               shadow-sm focus:border-green-500
                                               focus:ring-green-500"
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


                        <!-- Footer -->
                        <div class="mt-7 pt-5 border-t border-gray-100
                                    flex flex-col-reverse sm:flex-row
                                    sm:justify-end gap-3">

                            <button
                                type="button"
                                @click="showAddModal = false"
                                class="px-5 py-2.5 rounded-xl
                                       bg-gray-100 hover:bg-gray-200
                                       text-gray-700 font-semibold text-sm transition"
                            >
                                Batal
                            </button>

                            <button
                                type="submit"
                                class="px-5 py-2.5 rounded-xl
                                       bg-green-600 hover:bg-green-700
                                       text-white font-semibold text-sm
                                       shadow-sm hover:shadow-md transition"
                            >
                                Buat Akun UMKM
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
</x-admin-layout>