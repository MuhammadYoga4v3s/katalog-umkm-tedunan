<x-admin-layout>
    <div x-data="{ 
        showModal: false, 
        verifyData: { id: '', name: '', status: '', actionText: '', colorClass: '' } 
    }">
        
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Antrean Verifikasi UMKM</h2>
        </div>

        <!-- Alerts -->
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Tabel Data -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data Usaha</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Info Pemilik</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Daftar</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($pendingSellers as $seller)
                    <tr>
                        <td class="px-6 py-4">
                            <div class="text-sm font-bold text-gray-900">{{ $seller->business_name }}</div>
                            <div class="text-xs text-gray-500">{{ $seller->businessCategory->name ?? '-' }}</div>
                            <div class="text-xs text-gray-400 mt-1">{{ $seller->address }} RT {{ $seller->rt }}/RW {{ $seller->rw }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $seller->owner_name }}</div>
                            <div class="text-sm text-gray-500">{{ $seller->phone }}</div>
                            <div class="text-xs text-gray-500">{{ $seller->user->email ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                            {{ $seller->created_at->format('d M Y, H:i') }}
                        </td>
                        <td class="px-6 py-4 text-center text-sm font-medium space-x-2">
                            <!-- Tombol Terima -->
                            <button @click="
                                showModal = true; 
                                verifyData.id = '{{ $seller->id }}'; 
                                verifyData.name = '{{ addslashes($seller->business_name) }}'; 
                                verifyData.status = 'approved';
                                verifyData.actionText = 'Setujui Pendaftaran';
                                verifyData.colorClass = 'bg-green-600 hover:bg-green-700';
                            " class="text-white bg-green-500 hover:bg-green-600 px-3 py-1 rounded text-xs font-bold">Terima</button>
                            
                            <!-- Tombol Tolak -->
                            <button @click="
                                showModal = true; 
                                verifyData.id = '{{ $seller->id }}'; 
                                verifyData.name = '{{ addslashes($seller->business_name) }}'; 
                                verifyData.status = 'rejected';
                                verifyData.actionText = 'Tolak Pendaftaran';
                                verifyData.colorClass = 'bg-red-600 hover:bg-red-700';
                            " class="text-white bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-xs font-bold">Tolak</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500 flex flex-col items-center">
                            <svg class="w-12 h-12 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Tidak ada antrean pendaftaran UMKM saat ini.</span>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- MODAL KONFIRMASI VERIFIKASI -->
        <div x-show="showModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
                <div x-show="showModal" @click="showModal = false" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>

                <div class="inline-block w-full max-w-md p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-lg z-50">
                    <h3 class="text-lg font-bold text-gray-900 mb-2" x-text="verifyData.actionText"></h3>
                    <p class="text-sm text-gray-600 mb-4">Anda akan memproses UMKM: <strong x-text="verifyData.name" class="text-gray-900"></strong>.</p>
                    
                    <form :action="'{{ url('admin/verifikasi') }}/' + verifyData.id" method="POST">
                        @csrf
                        <input type="hidden" name="status" x-model="verifyData.status">
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Catatan Admin (Opsional)</label>
                            <textarea name="note" rows="3" placeholder="Berikan alasan jika ditolak, atau pesan sambutan jika diterima..." class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                        </div>
                        
                        <div class="mt-5 flex justify-end space-x-3">
                            <button type="button" @click="showModal = false" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">Batal</button>
                            <button type="submit" :class="verifyData.colorClass" class="px-4 py-2 text-sm font-medium text-white rounded-md" x-text="verifyData.status === 'approved' ? 'Ya, Setujui' : 'Ya, Tolak'"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-admin-layout>