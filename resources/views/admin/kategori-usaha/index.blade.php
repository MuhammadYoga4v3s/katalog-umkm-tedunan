<x-admin-layout>

    <div
        x-data="{
            showAddModal: false,
            showEditModal: false,

            editData: {
                id: '',
                name: '',
                description: ''
            },

            openEdit(category) {
                this.editData.id = category.id;
                this.editData.name = category.name;
                this.editData.description = category.description ?? '';
                this.showEditModal = true;
            },

            closeModals() {
                this.showAddModal = false;
                this.showEditModal = false;
            }
        }"
        @keydown.escape.window="closeModals()"
    >

        <!-- ===================================================== -->
        <!-- HEADER -->
        <!-- ===================================================== -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

            <div>
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-xl bg-green-100 text-green-700 flex items-center justify-center">
                        <svg
                            class="w-6 h-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M4 6h16M4 10h16M4 14h10M4 18h7"
                            />
                        </svg>
                    </div>

                    <div>
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900">
                            Kategori Usaha
                        </h1>

                        <p class="text-sm text-gray-500 mt-1">
                            Kelola kategori usaha yang digunakan oleh UMKM Desa Tedunan.
                        </p>
                    </div>
                </div>
            </div>

            <button
                type="button"
                @click="showAddModal = true"
                class="inline-flex items-center justify-center gap-2 px-5 py-3
                       bg-green-600 hover:bg-green-700
                       text-white text-sm font-bold
                       rounded-xl shadow-sm hover:shadow-md
                       transition-all duration-200
                       focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
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
                        d="M12 4v16m8-8H4"
                    />
                </svg>

                Tambah Kategori
            </button>

        </div>


        <!-- ===================================================== -->
        <!-- ALERT SUCCESS -->
        <!-- ===================================================== -->
        @if(session('success'))
            <div
                class="mb-6 flex items-start gap-3
                       bg-green-50 border border-green-200
                       text-green-800 rounded-xl p-4"
            >
                <div class="flex-shrink-0 mt-0.5">
                    <svg
                        class="w-5 h-5 text-green-600"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>
                </div>

                <div>
                    <p class="font-semibold text-sm">
                        Berhasil
                    </p>

                    <p class="text-sm mt-0.5">
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
                class="mb-6
                       bg-red-50 border border-red-200
                       text-red-800 rounded-xl p-4"
            >
                <div class="flex items-start gap-3">

                    <svg
                        class="w-5 h-5 text-red-600 mt-0.5 flex-shrink-0"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 9v3m0 4h.01M5.07 19h13.86a2 2 0 001.73-3L13.73 4a2 2 0 00-3.46 0L3.34 16a2 2 0 001.73 3z"
                        />
                    </svg>

                    <div>
                        <p class="font-semibold text-sm mb-1">
                            Terdapat kesalahan
                        </p>

                        <ul class="text-sm list-disc ml-5 space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        @endif


        <!-- ===================================================== -->
        <!-- SUMMARY CARD -->
        <!-- ===================================================== -->
        <div class="mb-6">

            <div
                class="bg-white rounded-2xl border border-gray-200
                       shadow-sm px-5 py-4
                       flex items-center justify-between"
            >

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center">
                        <svg
                            class="w-5 h-5 text-gray-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M4 6h16M4 10h16M4 14h16M4 18h10"
                            />
                        </svg>
                    </div>

                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">
                            Data Kategori
                        </p>

                        <p class="text-sm font-semibold text-gray-800">
                            Daftar kategori usaha UMKM
                        </p>
                    </div>

                </div>

                <div
                    class="px-3 py-1.5 rounded-full
                           bg-green-50 text-green-700
                           text-sm font-bold"
                >
                    {{ $categories->count() }} Kategori
                </div>

            </div>

        </div>


        <!-- ===================================================== -->
        <!-- TABLE -->
        <!-- ===================================================== -->
        <div
            class="bg-white rounded-2xl border border-gray-200
                   shadow-sm overflow-hidden"
        >

            <!-- Table Header -->
            <div class="px-6 py-5 border-b border-gray-100">

                <h2 class="font-bold text-gray-900">
                    Daftar Kategori
                </h2>

                <p class="text-xs text-gray-500 mt-1">
                    Kategori yang tersedia untuk pengelompokan UMKM.
                </p>

            </div>


            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">

                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-20">
                                No
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Nama Kategori
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Deskripsi
                            </th>

                            <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider w-40">
                                Aksi
                            </th>

                        </tr>
                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse($categories as $index => $category)

                            <tr class="hover:bg-gray-50/80 transition">

                                <!-- No -->
                                <td class="px-6 py-5">

                                    <span
                                        class="inline-flex items-center justify-center
                                               w-8 h-8 rounded-lg
                                               bg-gray-100 text-gray-600
                                               text-xs font-bold"
                                    >
                                        {{ $index + 1 }}
                                    </span>

                                </td>


                                <!-- Nama -->
                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="w-10 h-10 rounded-xl
                                                   bg-green-50 text-green-700
                                                   flex items-center justify-center
                                                   flex-shrink-0"
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
                                                    stroke-width="1.8"
                                                    d="M4 6h16M4 10h16M4 14h10M4 18h7"
                                                />
                                            </svg>
                                        </div>

                                        <div>
                                            <p class="text-sm font-bold text-gray-900">
                                                {{ $category->name }}
                                            </p>

                                            <p class="text-xs text-gray-400 mt-0.5">
                                                ID #{{ $category->id }}
                                            </p>
                                        </div>

                                    </div>

                                </td>


                                <!-- Deskripsi -->
                                <td class="px-6 py-5">

                                    <p class="text-sm text-gray-600 max-w-xl">
                                        {{ $category->description ?: 'Tidak ada deskripsi.' }}
                                    </p>

                                </td>


                                <!-- Aksi -->
                                <td class="px-6 py-5">

                                    <div class="flex items-center justify-end gap-2">

                                        <!-- Edit -->
                                        <button
                                            type="button"
                                            @click="openEdit({
                                                id: @js($category->id),
                                                name: @js($category->name),
                                                description: @js($category->description ?? '')
                                            })"
                                            class="inline-flex items-center gap-1.5
                                                   px-3 py-2 rounded-lg
                                                   text-xs font-bold
                                                   text-green-700
                                                   bg-green-50
                                                   hover:bg-green-100
                                                   transition"
                                        >
                                            <svg
                                                class="w-4 h-4"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M15.232 5.232l3.536 3.536M4 20h4l10.5-10.5a2.5 2.5 0 00-3.536-3.536L4.5 16.464 4 20z"
                                                />
                                            </svg>

                                            Edit
                                        </button>


                                        <!-- Hapus -->
                                        <form
                                            action="{{ route('admin.kategori-usaha.destroy', $category->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus kategori {{ addslashes($category->name) }}?');"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="inline-flex items-center gap-1.5
                                                       px-3 py-2 rounded-lg
                                                       text-xs font-bold
                                                       text-red-600
                                                       bg-red-50
                                                       hover:bg-red-100
                                                       transition"
                                            >
                                                <svg
                                                    class="w-4 h-4"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="1.8"
                                                        d="M6 7h12M10 11v6M14 11v6M9 7V4h6v3m-9 0l1 13h8l1-13"
                                                    />
                                                </svg>

                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4" class="px-6 py-16">

                                    <div class="flex flex-col items-center justify-center text-center">

                                        <div
                                            class="w-16 h-16 rounded-2xl
                                                   bg-gray-100
                                                   flex items-center justify-center
                                                   mb-4"
                                        >
                                            <svg
                                                class="w-8 h-8 text-gray-400"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.5"
                                                    d="M4 6h16M4 10h16M4 14h10M4 18h7"
                                                />
                                            </svg>
                                        </div>

                                        <h3 class="font-bold text-gray-800">
                                            Belum Ada Kategori
                                        </h3>

                                        <p class="text-sm text-gray-500 mt-1 mb-5">
                                            Tambahkan kategori usaha pertama untuk UMKM.
                                        </p>

                                        <button
                                            type="button"
                                            @click="showAddModal = true"
                                            class="px-4 py-2.5 rounded-lg
                                                   bg-green-600 hover:bg-green-700
                                                   text-white text-sm font-bold
                                                   transition"
                                        >
                                            + Tambah Kategori
                                        </button>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        <!-- ===================================================== -->
        <!-- MODAL TAMBAH -->
        <!-- ===================================================== -->
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


            <div class="min-h-screen px-4 flex items-center justify-center py-8">

                <div
                    class="relative w-full max-w-lg
                           bg-white rounded-2xl shadow-2xl
                           overflow-hidden"
                    x-show="showAddModal"
                    x-transition
                    @click.stop
                >

                    <!-- Modal Header -->
                    <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">

                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 rounded-xl bg-green-100 text-green-700 flex items-center justify-center">
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
                                        d="M12 4v16m8-8H4"
                                    />
                                </svg>
                            </div>

                            <div>
                                <h3 class="font-bold text-gray-900">
                                    Tambah Kategori
                                </h3>

                                <p class="text-xs text-gray-500">
                                    Buat kategori usaha baru.
                                </p>
                            </div>

                        </div>

                        <button
                            type="button"
                            @click="showAddModal = false"
                            class="w-9 h-9 rounded-lg
                                   text-gray-400 hover:text-gray-700
                                   hover:bg-gray-100
                                   flex items-center justify-center
                                   transition"
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
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>

                    </div>


                    <!-- Form -->
                    <form
                        action="{{ route('admin.kategori-usaha.store') }}"
                        method="POST"
                        class="p-6"
                    >
                        @csrf

                        <div class="space-y-5">

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">
                                    Nama Kategori
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    required
                                    placeholder="Contoh: Kuliner"
                                    class="block w-full rounded-xl
                                           border-gray-300
                                           focus:border-green-500
                                           focus:ring-green-500
                                           text-sm"
                                >
                            </div>


                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">
                                    Deskripsi
                                    <span class="font-normal text-gray-400">(Opsional)</span>
                                </label>

                                <textarea
                                    name="description"
                                    rows="4"
                                    placeholder="Jelaskan jenis usaha yang termasuk dalam kategori ini..."
                                    class="block w-full rounded-xl
                                           border-gray-300
                                           focus:border-green-500
                                           focus:ring-green-500
                                           text-sm resize-none"
                                ></textarea>
                            </div>

                        </div>


                        <!-- Footer -->
                        <div class="mt-7 pt-5 border-t border-gray-100 flex justify-end gap-3">

                            <button
                                type="button"
                                @click="showAddModal = false"
                                class="px-4 py-2.5 rounded-xl
                                       bg-gray-100 hover:bg-gray-200
                                       text-gray-700 text-sm font-bold
                                       transition"
                            >
                                Batal
                            </button>

                            <button
                                type="submit"
                                class="px-5 py-2.5 rounded-xl
                                       bg-green-600 hover:bg-green-700
                                       text-white text-sm font-bold
                                       shadow-sm transition"
                            >
                                Simpan Kategori
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        <!-- ===================================================== -->
        <!-- MODAL EDIT -->
        <!-- ===================================================== -->
        <div
            x-show="showEditModal"
            x-cloak
            class="fixed inset-0 z-50 overflow-y-auto"
        >

            <!-- Overlay -->
            <div
                class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm"
                @click="showEditModal = false"
                x-transition.opacity
            ></div>


            <div class="min-h-screen px-4 flex items-center justify-center py-8">

                <div
                    class="relative w-full max-w-lg
                           bg-white rounded-2xl shadow-2xl
                           overflow-hidden"
                    x-show="showEditModal"
                    x-transition
                    @click.stop
                >

                    <!-- Header -->
                    <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">

                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 rounded-xl bg-green-100 text-green-700 flex items-center justify-center">
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M15.232 5.232l3.536 3.536M4 20h4l10.5-10.5a2.5 2.5 0 00-3.536-3.536L4.5 16.464 4 20z"
                                    />
                                </svg>
                            </div>

                            <div>
                                <h3 class="font-bold text-gray-900">
                                    Edit Kategori
                                </h3>

                                <p class="text-xs text-gray-500">
                                    Perbarui informasi kategori usaha.
                                </p>
                            </div>

                        </div>

                        <button
                            type="button"
                            @click="showEditModal = false"
                            class="w-9 h-9 rounded-lg
                                   text-gray-400 hover:text-gray-700
                                   hover:bg-gray-100
                                   flex items-center justify-center
                                   transition"
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
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>

                    </div>


                    <!-- Form -->
                    <form
                        :action="'{{ url('/admin/kategori-usaha') }}/' + editData.id"
                        method="POST"
                        class="p-6"
                    >

                        @csrf
                        @method('PUT')

                        <div class="space-y-5">

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">
                                    Nama Kategori
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    x-model="editData.name"
                                    required
                                    class="block w-full rounded-xl
                                           border-gray-300
                                           focus:border-green-500
                                           focus:ring-green-500
                                           text-sm"
                                >
                            </div>


                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">
                                    Deskripsi
                                </label>

                                <textarea
                                    name="description"
                                    x-model="editData.description"
                                    rows="4"
                                    class="block w-full rounded-xl
                                           border-gray-300
                                           focus:border-green-500
                                           focus:ring-green-500
                                           text-sm resize-none"
                                ></textarea>
                            </div>

                        </div>


                        <!-- Footer -->
                        <div class="mt-7 pt-5 border-t border-gray-100 flex justify-end gap-3">

                            <button
                                type="button"
                                @click="showEditModal = false"
                                class="px-4 py-2.5 rounded-xl
                                       bg-gray-100 hover:bg-gray-200
                                       text-gray-700 text-sm font-bold
                                       transition"
                            >
                                Batal
                            </button>

                            <button
                                type="submit"
                                class="px-5 py-2.5 rounded-xl
                                       bg-green-600 hover:bg-green-700
                                       text-white text-sm font-bold
                                       shadow-sm transition"
                            >
                                Simpan Perubahan
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-admin-layout>