<x-seller-layout>
    <!-- Alpine.js untuk mengontrol Modal Edit -->
    <div x-data="{ 
            showEditModal: false, 
            editData: { id: '', name: '', product_category_id: '', price: '', stock: '', status: '', description: '' } 
        }">
        
        <!-- Header & Tombol Tambah -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Katalog Produk Saya</h2>
            <!-- Link menuju halaman create -->
            <a href="{{ route('seller.produk.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow">
                + Tambah Produk
            </a>
        </div>

        <!-- Alerts -->
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Tabel Data Produk -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Foto</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama & Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga & Stok</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($products as $product)
                    <tr>
                        <td class="px-6 py-4">
                            @if($product->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $product->images->first()->image) }}" alt="{{ $product->name }}" class="h-16 w-16 object-cover rounded-md border">
                            @else
                                <div class="h-16 w-16 bg-gray-100 rounded-md border flex items-center justify-center text-xs text-gray-400">No Photo</div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-bold text-gray-900">{{ $product->name }}</div>
                            <div class="text-xs text-gray-500">{{ $product->productCategory->name ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-green-600">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                            <div class="text-xs text-gray-500">Stok: {{ $product->stock }}</div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($product->status === 'available')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Tersedia</span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Sembunyikan</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center text-sm font-medium space-x-2">
                            <!-- Tombol Edit -->
                            <button @click="
                                    editData.id = '{{ $product->id }}';
                                    editData.name = '{{ addslashes($product->name) }}';
                                    editData.product_category_id = '{{ $product->product_category_id }}';
                                    editData.price = '{{ $product->price }}';
                                    editData.stock = '{{ $product->stock }}';
                                    editData.status = '{{ $product->status }}';
                                    editData.description = '{{ addslashes($product->description) }}';
                                    showEditModal = true;
                                " class="text-blue-600 hover:text-blue-900">Edit Info</button>
                            
                            <!-- Tombol Hapus -->
                            <form action="{{ route('seller.produk.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus produk ini? Foto produk juga akan terhapus.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">Belum ada produk. Ayo tambah produk pertamamu!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- MODAL EDIT INFO PRODUK -->
        <div x-show="showEditModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
                <div x-show="showEditModal" @click="showEditModal = false" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>

                <div class="inline-block w-full max-w-lg p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-lg z-50">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Edit Informasi Produk</h3>
                    <form :action="'{{ url('penjual/produk') }}/' + editData.id" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Nama Produk</label>
                                <input type="text" name="name" x-model="editData.name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Kategori</label>
                                @php $categories = \App\Models\ProductCategory::all(); @endphp
                                <select name="product_category_id" x-model="editData.product_category_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-1">
                                <label class="block text-sm font-medium text-gray-700">Harga (Rp)</label>
                                <input type="number" name="price" x-model="editData.price" required min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>
                            <div class="col-span-1">
                                <label class="block text-sm font-medium text-gray-700">Stok</label>
                                <input type="number" name="stock" x-model="editData.stock" required min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="status" x-model="editData.status" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                                    <option value="available">Tersedia (Tampilkan)</option>
                                    <option value="unavailable">Habis (Sembunyikan)</option>
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Deskripsi Produk</label>
                                <textarea name="description" x-model="editData.description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"></textarea>
                            </div>
                        </div>
                        <div class="mt-5 flex justify-end space-x-3">
                            <button type="button" @click="showEditModal = false" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">Batal</button>
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-700">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-seller-layout>