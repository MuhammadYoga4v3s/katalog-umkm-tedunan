<x-seller-layout>
    <div
        x-data="{
            showEditModal: false,
            editData: {
                id: '',
                name: '',
                product_category_id: '',
                price: '',
                stock: '',
                status: '',
                description: ''
            }
        }"
        class="space-y-6"
    >

        <!-- HEADER -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-xl bg-green-100 text-green-700 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0v10l-8 4m8-14l-8 4m0 0L4 7m8 4v10"/>
                        </svg>
                    </div>

                    <div>
                        <h1 class="text-2xl font-extrabold text-gray-900">
                            Katalog Produk Saya
                        </h1>
                        <p class="text-sm text-gray-500 mt-0.5">
                            Kelola produk yang tampil di katalog UMKM Desa Tedunan.
                        </p>
                    </div>
                </div>
            </div>

            <a
                href="{{ route('seller.produk.create') }}"
                class="inline-flex items-center justify-center gap-2 bg-green-600 hover:bg-green-700 text-white font-bold px-5 py-2.5 rounded-xl shadow-sm hover:shadow-md transition"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Produk
            </a>
        </div>


        <!-- ALERT SUCCESS -->
        @if(session('success'))
            <div class="flex items-start gap-3 bg-green-50 border border-green-200 text-green-800 px-5 py-4 rounded-xl">
                <div class="shrink-0 w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

                <div>
                    <p class="font-semibold text-sm">Berhasil</p>
                    <p class="text-sm text-green-700 mt-0.5">
                        {{ session('success') }}
                    </p>
                </div>
            </div>
        @endif


        <!-- STATISTIK -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

            <!-- Total Produk -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">
                            Total Produk
                        </p>
                        <p class="text-2xl font-extrabold text-gray-900 mt-1">
                            {{ $products->count() }}
                        </p>
                    </div>

                    <div class="w-11 h-11 rounded-xl bg-green-50 text-green-600 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0v10l-8 4m8-14l-8 4m0 0L4 7m8 4v10"/>
                        </svg>
                    </div>
                </div>
            </div>


            <!-- Produk Tersedia -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">
                            Produk Tersedia
                        </p>
                        <p class="text-2xl font-extrabold text-green-600 mt-1">
                            {{ $products->where('status', 'available')->count() }}
                        </p>
                    </div>

                    <div class="w-11 h-11 rounded-xl bg-green-50 text-green-600 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622C17.176 19.29 21 14.591 21 9c0-.998-.122-1.968-.35-2.888"/>
                        </svg>
                    </div>
                </div>
            </div>


            <!-- Produk Disembunyikan -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">
                            Produk Disembunyikan
                        </p>
                        <p class="text-2xl font-extrabold text-gray-700 mt-1">
                            {{ $products->where('status', '!=', 'available')->count() }}
                        </p>
                    </div>

                    <div class="w-11 h-11 rounded-xl bg-gray-100 text-gray-500 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 012.23-3.592m3.49-2.35A9.956 9.956 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.956 9.956 0 01-1.07 2.472M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3l18 18"/>
                        </svg>
                    </div>
                </div>
            </div>

        </div>


        <!-- TABEL PRODUK -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

            <!-- Table Header -->
            <div class="px-6 py-5 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                <div>
                    <h2 class="font-bold text-gray-900">
                        Daftar Produk
                    </h2>
                    <p class="text-xs text-gray-500 mt-1">
                        Produk yang Anda kelola pada katalog digital.
                    </p>
                </div>

                <span class="text-xs font-semibold text-gray-500 bg-gray-100 px-3 py-1.5 rounded-full">
                    {{ $products->count() }} Produk
                </span>
            </div>


            <!-- Responsive Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full">

                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">

                            <th class="px-6 py-4 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">
                                Produk
                            </th>

                            <th class="px-6 py-4 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">
                                Harga
                            </th>

                            <th class="px-6 py-4 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">
                                Stok
                            </th>

                            <th class="px-6 py-4 text-center text-[11px] font-bold text-gray-500 uppercase tracking-wider">
                                Status
                            </th>

                            <th class="px-6 py-4 text-right text-[11px] font-bold text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>

                        </tr>
                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse($products as $product)

                            <tr class="hover:bg-gray-50/70 transition">

                                <!-- Produk -->
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-4 min-w-[260px]">

                                        @if($product->images->isNotEmpty())

                                            <img
                                                src="{{ asset('storage/' . $product->images->first()->image) }}"
                                                alt="{{ $product->name }}"
                                                class="h-16 w-16 object-cover rounded-xl border border-gray-200 shadow-sm"
                                            >

                                        @else

                                            <div class="h-16 w-16 bg-gray-100 rounded-xl border border-gray-200 flex items-center justify-center">
                                                <svg class="w-7 h-7 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                            </div>

                                        @endif

                                        <div class="min-w-0">
                                            <div class="font-bold text-gray-900 truncate">
                                                {{ $product->name }}
                                            </div>

                                            <div class="text-xs text-gray-500 mt-1">
                                                {{ $product->productCategory->name ?? '-' }}
                                            </div>
                                        </div>

                                    </div>
                                </td>


                                <!-- Harga -->
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <div class="text-sm font-bold text-green-600">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </div>
                                </td>


                                <!-- Stok -->
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <span class="text-sm font-semibold text-gray-700">
                                        {{ $product->stock }}
                                    </span>
                                    <span class="text-xs text-gray-400 ml-1">
                                        pcs
                                    </span>
                                </td>


                                <!-- Status -->
                                <td class="px-6 py-5 text-center whitespace-nowrap">

                                    @if($product->status === 'available')

                                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-green-50 text-green-700 text-xs font-bold">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                            Tersedia
                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-gray-100 text-gray-600 text-xs font-bold">
                                            <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>
                                            Disembunyikan
                                        </span>

                                    @endif

                                </td>


                                <!-- Aksi -->
                                <td class="px-6 py-5 text-right whitespace-nowrap">

                                    <div class="flex items-center justify-end gap-2">

                                        <!-- Edit -->
                                        <button
                                            @click="
                                                editData.id = '{{ $product->id }}';
                                                editData.name = {{ \Illuminate\Support\Js::from($product->name) }};
                                                editData.product_category_id = '{{ $product->product_category_id }}';
                                                editData.price = '{{ $product->price }}';
                                                editData.stock = '{{ $product->stock }}';
                                                editData.status = '{{ $product->status }}';
                                                editData.description = {{ \Illuminate\Support\Js::from($product->description) }};
                                                showEditModal = true;
                                            "
                                            class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg text-sm font-semibold text-blue-600 hover:bg-blue-50 transition"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.5-10.5a2.121 2.121 0 013 3L12 14l-4 1 1-4 8.5-8.5z"/>
                                            </svg>
                                            Edit
                                        </button>


                                        <!-- Hapus -->
                                        <form
                                            action="{{ route('seller.produk.destroy', $product->id) }}"
                                            method="POST"
                                            class="inline-block"
                                            onsubmit="return confirm('Yakin ingin menghapus produk ini? Foto produk juga akan terhapus.');"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg text-sm font-semibold text-red-600 hover:bg-red-50 transition"
                                            >
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3m-4 0h14"/>
                                                </svg>
                                                Hapus
                                            </button>
                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="px-6 py-16">

                                    <div class="text-center">

                                        <div class="mx-auto w-16 h-16 rounded-2xl bg-green-50 text-green-600 flex items-center justify-center mb-4">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M20 7l-8-4-8 4m16 0v10l-8 4m8-14l-8 4m0 0L4 7m8 4v10"/>
                                            </svg>
                                        </div>

                                        <h3 class="text-lg font-bold text-gray-900">
                                            Belum Ada Produk
                                        </h3>

                                        <p class="text-sm text-gray-500 mt-1 mb-5">
                                            Tambahkan produk pertama Anda ke katalog UMKM.
                                        </p>

                                        <a
                                            href="{{ route('seller.produk.create') }}"
                                            class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2.5 rounded-xl transition"
                                        >
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4v16m8-8H4"/>
                                            </svg>
                                            Tambah Produk
                                        </a>

                                    </div>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>
            </div>

        </div>


        <!-- MODAL EDIT -->
        <div
            x-show="showEditModal"
            x-cloak
            class="fixed inset-0 z-[100] overflow-y-auto"
            @keydown.escape.window="showEditModal = false"
        >

            <!-- Backdrop -->
            <div
                x-show="showEditModal"
                x-transition.opacity
                @click="showEditModal = false"
                class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm"
            ></div>


            <!-- Modal Wrapper -->
            <div class="min-h-screen px-4 py-8 flex items-center justify-center">

                <div
                    x-show="showEditModal"
                    x-transition:enter="ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="ease-in duration-150"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    @click.stop
                    class="relative w-full max-w-2xl bg-white rounded-2xl shadow-2xl overflow-hidden"
                >

                    <!-- Modal Header -->
                    <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">

                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 rounded-xl bg-green-100 text-green-700 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.5-10.5a2.121 2.121 0 013 3L12 14l-4 1 1-4 8.5-8.5z"/>
                                </svg>
                            </div>

                            <div>
                                <h3 class="text-lg font-extrabold text-gray-900">
                                    Edit Informasi Produk
                                </h3>
                                <p class="text-xs text-gray-500 mt-0.5">
                                    Perbarui informasi produk Anda.
                                </p>
                            </div>

                        </div>

                        <button
                            type="button"
                            @click="showEditModal = false"
                            class="w-9 h-9 rounded-lg text-gray-400 hover:text-gray-700 hover:bg-gray-100 flex items-center justify-center transition"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>

                    </div>


                    <!-- Modal Body -->
                    <form
                        :action="'{{ url('penjual/produk') }}/' + editData.id"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        @method('PUT')

                        <div class="px-6 py-6 space-y-5 max-h-[70vh] overflow-y-auto">

                            <!-- Nama -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700">
                                    Nama Produk
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    x-model="editData.name"
                                    required
                                    class="mt-1.5 block w-full rounded-xl border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                                >
                            </div>


                            <!-- Kategori -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700">
                                    Kategori
                                </label>

                                @php
                                    $categories = \App\Models\ProductCategory::all();
                                @endphp

                                <select
                                    name="product_category_id"
                                    x-model="editData.product_category_id"
                                    required
                                    class="mt-1.5 block w-full rounded-xl border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                                >
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <!-- Harga + Stok -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                                <div>
                                    <label class="block text-sm font-bold text-gray-700">
                                        Harga (Rp)
                                    </label>

                                    <input
                                        type="number"
                                        name="price"
                                        x-model="editData.price"
                                        required
                                        min="0"
                                        class="mt-1.5 block w-full rounded-xl border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                                    >
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700">
                                        Stok
                                    </label>

                                    <input
                                        type="number"
                                        name="stock"
                                        x-model="editData.stock"
                                        required
                                        min="0"
                                        class="mt-1.5 block w-full rounded-xl border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                                    >
                                </div>

                            </div>


                            <!-- Status -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700">
                                    Status Produk
                                </label>

                                <select
                                    name="status"
                                    x-model="editData.status"
                                    required
                                    class="mt-1.5 block w-full rounded-xl border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                                >
                                    <option value="available">
                                        Tersedia (Tampilkan)
                                    </option>

                                    <option value="unavailable">
                                        Habis (Sembunyikan)
                                    </option>
                                </select>
                            </div>


                            <!-- Foto -->
                            <div class="rounded-xl bg-gray-50 border border-gray-200 p-4">

                                <label class="block text-sm font-bold text-gray-700">
                                    Ganti Foto Produk
                                    <span class="font-normal text-gray-400">(Opsional)</span>
                                </label>

                                <input
                                    type="file"
                                    name="images[]"
                                    multiple
                                    accept="image/*"
                                    class="mt-2 block w-full text-sm text-gray-500
                                    file:mr-4
                                    file:py-2
                                    file:px-4
                                    file:rounded-lg
                                    file:border-0
                                    file:text-sm
                                    file:font-semibold
                                    file:bg-green-50
                                    file:text-green-700
                                    hover:file:bg-green-100"
                                >

                                <p class="text-xs text-gray-500 mt-2">
                                    Biarkan kosong jika tidak ingin mengganti foto.
                                    Foto lama akan otomatis diganti jika foto baru diunggah.
                                </p>

                            </div>


                            <!-- Deskripsi -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700">
                                    Deskripsi Produk
                                </label>

                                <textarea
                                    name="description"
                                    x-model="editData.description"
                                    rows="4"
                                    class="mt-1.5 block w-full rounded-xl border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                                ></textarea>
                            </div>

                        </div>


                        <!-- Modal Footer -->
                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex flex-col-reverse sm:flex-row sm:justify-end gap-3">

                            <button
                                type="button"
                                @click="showEditModal = false"
                                class="w-full sm:w-auto px-5 py-2.5 rounded-xl bg-white border border-gray-300 text-gray-700 font-semibold hover:bg-gray-100 transition"
                            >
                                Batal
                            </button>

                            <button
                                type="submit"
                                class="w-full sm:w-auto px-5 py-2.5 rounded-xl bg-green-600 hover:bg-green-700 text-white font-bold shadow-sm transition"
                            >
                                Simpan Perubahan
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
</x-seller-layout>