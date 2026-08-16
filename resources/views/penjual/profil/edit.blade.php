<x-seller-layout>
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-green-50">
                <h2 class="text-xl font-bold text-gray-800">Pengaturan Profil UMKM</h2>
                <p class="text-sm text-gray-500">Lengkapi informasi usaha Anda agar menarik perhatian pembeli.</p>
            </div>

            <form action="{{ route('seller.profil.update') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PUT')

                <!-- Alerts -->
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif
                @if($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
                        <ul class="list-disc ml-5">
                            @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                        </ul>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- Foto Profil Toko -->
                    <div class="col-span-1 md:col-span-2 flex items-center space-x-6 mb-4">
                        <div class="shrink-0">
                            @if($seller->profile_image)
                                <img class="h-24 w-24 object-cover rounded-full border border-gray-200 shadow-sm" src="{{ asset('storage/' . $seller->profile_image) }}" alt="Foto Profil">
                            @else
                                <div class="h-24 w-24 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 border border-gray-300">No Image</div>
                            @endif
                        </div>
                        <label class="block">
                            <span class="sr-only">Pilih foto profil</span>
                            <input type="file" name="profile_image" accept="image/*" class="block w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-green-50 file:text-green-700
                                hover:file:bg-green-100
                            "/>
                            <p class="mt-1 text-xs text-gray-500">JPG, JPEG, atau PNG. Maks 2MB.</p>
                        </label>
                    </div>

                    <!-- Informasi Dasar -->
                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Nama Pemilik</label>
                        <input type="text" name="owner_name" value="{{ old('owner_name', $seller->owner_name) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>
                    
                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Nama Usaha / Toko</label>
                        <input type="text" name="business_name" value="{{ old('business_name', $seller->business_name) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Deskripsi Usaha</label>
                        <textarea name="business_description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">{{ old('business_description', $seller->business_description) }}</textarea>
                    </div>

                    <!-- Kontak & Lokasi -->
                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Nomor WhatsApp / HP</label>
                        <input type="text" name="phone" value="{{ old('phone', $seller->phone) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Link Google Maps (Opsional)</label>
                        <input type="url" name="google_maps" value="{{ old('google_maps', $seller->google_maps) }}" placeholder="https://maps.google.com/..." class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                        <input type="text" name="address" value="{{ old('address', $seller->address) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">RT</label>
                        <input type="text" name="rt" value="{{ old('rt', $seller->rt) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">RW</label>
                        <input type="text" name="rw" value="{{ old('rw', $seller->rw) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>
                </div>

                <div class="mt-8 pt-5 border-t border-gray-200 flex justify-end">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded shadow-md">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-seller-layout>