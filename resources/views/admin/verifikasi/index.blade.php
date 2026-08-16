<x-admin-layout>
    <div
        x-data="{
            showModal: false,
            verifyData: {
                id: '',
                name: '',
                status: '',
                actionText: '',
                colorClass: '',
                icon: ''
            }
        }"
    >

        <!-- HEADER -->
        <div class="mb-7">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="w-1.5 h-7 bg-blue-600 rounded-full"></span>
                        <h1 class="text-2xl font-extrabold text-slate-800">
                            Verifikasi UMKM
                        </h1>
                    </div>

                    <p class="text-sm text-slate-500 ml-3.5">
                        Kelola dan verifikasi pendaftaran UMKM Desa Tedunan.
                    </p>
                </div>

                <!-- Badge antrean -->
                <div class="inline-flex items-center gap-2 px-4 py-2.5 bg-white border border-slate-200 rounded-xl shadow-sm">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-amber-500"></span>
                    </span>

                    <span class="text-sm font-semibold text-slate-700">
                        {{ $pendingSellers->count() }} Menunggu Verifikasi
                    </span>
                </div>
            </div>
        </div>

        <!-- ALERT SUCCESS -->
        @if(session('success'))
            <div class="mb-6 flex items-start gap-3 p-4 bg-emerald-50 border border-emerald-200 rounded-xl">
                <div class="flex-shrink-0 mt-0.5">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>

                <div>
                    <p class="text-sm font-semibold text-emerald-800">
                        Berhasil
                    </p>
                    <p class="text-sm text-emerald-700 mt-0.5">
                        {{ session('success') }}
                    </p>
                </div>
            </div>
        @endif

        <!-- CONTENT CARD -->
        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

            <!-- Card Header -->
            <div class="px-6 py-5 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4m5.5-4.5A9 9 0 1112 3a9 9 0 015.5 2.5z"/>
                        </svg>
                    </div>

                    <div>
                        <h2 class="font-bold text-slate-800">
                            Antrean Pendaftaran
                        </h2>
                        <p class="text-xs text-slate-500 mt-0.5">
                            Periksa data usaha sebelum memberikan persetujuan.
                        </p>
                    </div>
                </div>
            </div>

            <!-- TABLE -->
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-slate-50/80 border-b border-slate-200">
                            <th class="px-6 py-4 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                                Data Usaha
                            </th>

                            <th class="px-6 py-4 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                                Pemilik
                            </th>

                            <th class="px-6 py-4 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                                Lokasi
                            </th>

                            <th class="px-6 py-4 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                                Waktu Daftar
                            </th>

                            <th class="px-6 py-4 text-center text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse($pendingSellers as $seller)

                            <tr class="hover:bg-slate-50/70 transition-colors duration-150">

                                <!-- DATA USAHA -->
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">

                                        <div class="w-11 h-11 flex-shrink-0 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                      d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6"/>
                                            </svg>
                                        </div>

                                        <div class="min-w-0">
                                            <p class="text-sm font-bold text-slate-800 truncate">
                                                {{ $seller->business_name }}
                                            </p>

                                            <div class="flex items-center gap-2 mt-1">
                                                <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-blue-50 text-blue-700 text-[11px] font-semibold">
                                                    {{ $seller->businessCategory->name ?? 'Tanpa Kategori' }}
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </td>

                                <!-- PEMILIK -->
                                <td class="px-6 py-5">
                                    <p class="text-sm font-semibold text-slate-800">
                                        {{ $seller->owner_name }}
                                    </p>

                                    <p class="text-xs text-slate-500 mt-1">
                                        {{ $seller->phone }}
                                    </p>

                                    <p class="text-xs text-slate-400 mt-0.5">
                                        {{ $seller->user->email ?? '-' }}
                                    </p>
                                </td>

                                <!-- LOKASI -->
                                <td class="px-6 py-5">
                                    <div class="flex items-start gap-2">
                                        <svg class="w-4 h-4 text-slate-400 mt-0.5 flex-shrink-0"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="1.8"
                                                  d="M17.657 16.657L13.414 21a2 2 0 01-2.828 0l-4.243-4.343a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="1.8"
                                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>

                                        <div>
                                            <p class="text-xs text-slate-600 leading-relaxed max-w-[180px]">
                                                {{ $seller->address }}
                                            </p>

                                            <p class="text-xs font-semibold text-slate-500 mt-1">
                                                RT {{ $seller->rt }} / RW {{ $seller->rw }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <!-- WAKTU -->
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <p class="text-sm font-medium text-slate-700">
                                        {{ $seller->created_at->format('d M Y') }}
                                    </p>

                                    <p class="text-xs text-slate-400 mt-1">
                                        {{ $seller->created_at->format('H:i') }} WIB
                                    </p>
                                </td>

                                <!-- AKSI -->
                                <td class="px-6 py-5">
                                    <div class="flex items-center justify-center gap-2">

                                        <!-- TERIMA -->
                                        <button
                                            @click="
                                                showModal = true;
                                                verifyData.id = '{{ $seller->id }}';
                                                verifyData.name = '{{ addslashes($seller->business_name) }}';
                                                verifyData.status = 'approved';
                                                verifyData.actionText = 'Setujui Pendaftaran';
                                                verifyData.colorClass = 'bg-emerald-600 hover:bg-emerald-700';
                                                verifyData.icon = 'approve';
                                            "
                                            class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100 font-semibold text-xs transition"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M5 13l4 4L19 7"/>
                                            </svg>
                                            Terima
                                        </button>

                                        <!-- TOLAK -->
                                        <button
                                            @click="
                                                showModal = true;
                                                verifyData.id = '{{ $seller->id }}';
                                                verifyData.name = '{{ addslashes($seller->business_name) }}';
                                                verifyData.status = 'rejected';
                                                verifyData.actionText = 'Tolak Pendaftaran';
                                                verifyData.colorClass = 'bg-red-600 hover:bg-red-700';
                                                verifyData.icon = 'reject';
                                            "
                                            class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg bg-red-50 text-red-700 hover:bg-red-100 font-semibold text-xs transition"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                            Tolak
                                        </button>

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="px-6 py-16">
                                    <div class="flex flex-col items-center justify-center">

                                        <div class="w-16 h-16 rounded-2xl bg-emerald-50 flex items-center justify-center mb-4">
                                            <svg class="w-8 h-8 text-emerald-500"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="1.8"
                                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>

                                        <h3 class="text-sm font-bold text-slate-700">
                                            Semua Sudah Diverifikasi
                                        </h3>

                                        <p class="text-xs text-slate-400 mt-1 text-center">
                                            Tidak ada pendaftaran UMKM yang menunggu verifikasi.
                                        </p>

                                    </div>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>


        <!-- ========================= -->
        <!-- MODAL KONFIRMASI -->
        <!-- ========================= -->

        <div
            x-show="showModal"
            x-transition.opacity
            style="display: none;"
            class="fixed inset-0 z-50 overflow-y-auto"
        >

            <!-- Overlay -->
            <div
                @click="showModal = false"
                class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm"
            ></div>

            <div class="min-h-screen flex items-center justify-center px-4 py-8">

                <div
                    x-show="showModal"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="relative w-full max-w-md bg-white rounded-2xl shadow-2xl overflow-hidden"
                >

                    <!-- Modal Header -->
                    <div class="px-6 pt-6">

                        <div
                            class="w-12 h-12 rounded-xl flex items-center justify-center mb-4"
                            :class="verifyData.status === 'approved'
                                ? 'bg-emerald-100'
                                : 'bg-red-100'"
                        >

                            <template x-if="verifyData.status === 'approved'">
                                <svg class="w-6 h-6 text-emerald-600"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M5 13l4 4L19 7"/>
                                </svg>
                            </template>

                            <template x-if="verifyData.status === 'rejected'">
                                <svg class="w-6 h-6 text-red-600"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </template>

                        </div>

                        <h3
                            class="text-xl font-extrabold text-slate-800"
                            x-text="verifyData.actionText"
                        ></h3>

                        <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                            Anda akan memproses pendaftaran UMKM:
                            <strong
                                x-text="verifyData.name"
                                class="text-slate-800"
                            ></strong>.
                        </p>

                    </div>

                    <!-- Form -->
                    <form
                        :action="'{{ url('admin/verifikasi') }}/' + verifyData.id"
                        method="POST"
                        class="p-6"
                    >
                        @csrf

                        <input
                            type="hidden"
                            name="status"
                            x-model="verifyData.status"
                        >

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">
                                Catatan Admin
                                <span class="font-normal text-slate-400">(Opsional)</span>
                            </label>

                            <textarea
                                name="note"
                                rows="4"
                                placeholder="Berikan catatan untuk UMKM..."
                                class="block w-full rounded-xl border-slate-300 bg-slate-50 shadow-sm
                                       focus:border-blue-500 focus:ring-blue-500
                                       text-sm placeholder-slate-400"
                            ></textarea>

                            <p class="mt-2 text-xs text-slate-400">
                                Catatan dapat digunakan sebagai alasan penolakan atau pesan kepada pemilik UMKM.
                            </p>
                        </div>

                        <!-- Buttons -->
                        <div class="mt-6 flex items-center justify-end gap-3">

                            <button
                                type="button"
                                @click="showModal = false"
                                class="px-4 py-2.5 rounded-xl text-sm font-semibold
                                       text-slate-600 bg-slate-100 hover:bg-slate-200 transition"
                            >
                                Batal
                            </button>

                            <button
                                type="submit"
                                :class="verifyData.colorClass"
                                class="px-5 py-2.5 rounded-xl text-sm font-bold text-white shadow-sm transition"
                                x-text="verifyData.status === 'approved'
                                    ? 'Ya, Setujui'
                                    : 'Ya, Tolak'"
                            ></button>

                        </div>

                    </form>

                </div>

            </div>
        </div>

    </div>
</x-admin-layout>