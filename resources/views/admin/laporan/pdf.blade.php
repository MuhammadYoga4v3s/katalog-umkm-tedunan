<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Lengkap Katalog UMKM Desa Tedunan</title>

    <style>
        @page {
            margin: 25px 30px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10px;
            color: #333;
            line-height: 1.4;
        }

        .header {
            text-align: center;
            border-bottom: 3px solid #16a34a;
            padding-bottom: 12px;
            margin-bottom: 18px;
        }

        .header h1 {
            margin: 0;
            font-size: 20px;
            color: #166534;
            text-transform: uppercase;
        }

        .header h2 {
            margin: 4px 0 0;
            font-size: 14px;
            color: #374151;
            font-weight: normal;
        }

        .header p {
            margin: 5px 0 0;
            font-size: 9px;
            color: #6b7280;
        }

        .section-title {
            background-color: #166534;
            color: white;
            padding: 7px 9px;
            font-size: 12px;
            font-weight: bold;
            margin-top: 18px;
            margin-bottom: 8px;
        }

        .sub-title {
            background-color: #f0fdf4;
            color: #166534;
            border-left: 4px solid #16a34a;
            padding: 6px 8px;
            font-size: 11px;
            font-weight: bold;
            margin-top: 12px;
            margin-bottom: 7px;
        }

        /* Statistik */

        .stats-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 6px;
            margin: 0 -6px;
        }

        .stats-box {
            border: 1px solid #d1d5db;
            padding: 10px;
            text-align: center;
            background-color: #f9fafb;
        }

        .stats-number {
            font-size: 18px;
            font-weight: bold;
            color: #16a34a;
        }

        .stats-label {
            font-size: 9px;
            color: #6b7280;
            margin-top: 3px;
        }

        /* Tabel */

        table.data {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }

        table.data th,
        table.data td {
            border: 1px solid #d1d5db;
            padding: 6px;
            vertical-align: top;
        }

        table.data th {
            background-color: #f3f4f6;
            text-align: center;
            font-weight: bold;
            color: #374151;
        }

        table.data tr:nth-child(even) td {
            background-color: #fafafa;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .font-bold {
            font-weight: bold;
        }

        .text-green {
            color: #15803d;
        }

        .text-red {
            color: #dc2626;
        }

        .text-gray {
            color: #6b7280;
        }

        .badge {
            display: inline-block;
            padding: 2px 5px;
            border-radius: 3px;
            font-size: 8px;
            font-weight: bold;
        }

        .badge-green {
            background-color: #dcfce7;
            color: #166534;
        }

        .badge-red {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .badge-yellow {
            background-color: #fef3c7;
            color: #92400e;
        }

        /* Detail UMKM */

        .umkm-card {
            border: 1px solid #d1d5db;
            margin-bottom: 12px;
            page-break-inside: avoid;
        }

        .umkm-header {
            background-color: #f0fdf4;
            border-bottom: 1px solid #bbf7d0;
            padding: 8px;
        }

        .umkm-name {
            font-size: 12px;
            font-weight: bold;
            color: #166534;
        }

        .umkm-meta {
            font-size: 9px;
            color: #6b7280;
            margin-top: 2px;
        }

        .umkm-body {
            padding: 8px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            border: none;
            padding: 2px 4px;
            vertical-align: top;
        }

        .info-label {
            width: 18%;
            font-weight: bold;
            color: #4b5563;
        }

        /* Footer */

        .footer {
            margin-top: 25px;
            padding-top: 8px;
            border-top: 1px solid #d1d5db;
            font-size: 8px;
            color: #6b7280;
            text-align: center;
        }

        .page-break {
            page-break-before: always;
        }

        .avoid-break {
            page-break-inside: avoid;
        }
    </style>
</head>

<body>

    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <div class="header">
        <h1>Laporan Lengkap Katalog UMKM</h1>
        <h2>Desa Tedunan</h2>
        <p>
            Laporan Statistik, Data UMKM, Produk, Wilayah RT/RW, dan Penilaian
        </p>
        <p>
            Dicetak pada:
            {{ \Carbon\Carbon::now()->translatedFormat('d F Y, H:i') }}
        </p>
    </div>


    {{-- =========================================================
        1. RINGKASAN STATISTIK
    ========================================================== --}}
    <div class="section-title">
        1. Ringkasan Statistik Platform
    </div>

    <table class="stats-table">
        <tr>
            <td width="25%">
                <div class="stats-box">
                    <div class="stats-number">
                        {{ $totalUMKM }}
                    </div>
                    <div class="stats-label">
                        Total UMKM
                    </div>
                </div>
            </td>

            <td width="25%">
                <div class="stats-box">
                    <div class="stats-number">
                        {{ $totalProduk }}
                    </div>
                    <div class="stats-label">
                        Total Produk
                    </div>
                </div>
            </td>

            <td width="25%">
                <div class="stats-box">
                    <div class="stats-number">
                        {{ $totalKategori ?? 0 }}
                    </div>
                    <div class="stats-label">
                        Kategori Usaha
                    </div>
                </div>
            </td>

            <td width="25%">
                <div class="stats-box">
                    <div class="stats-number">
                        {{ $totalUlasan ?? 0 }}
                    </div>
                    <div class="stats-label">
                        Total Ulasan
                    </div>
                </div>
            </td>
        </tr>
    </table>


    {{-- =========================================================
        2. REKAP RT/RW
    ========================================================== --}}
    <div class="section-title">
        2. Rekapitulasi UMKM Berdasarkan RT/RW
    </div>

    @if(isset($rekapWilayah) && count($rekapWilayah) > 0)

        <table class="data">
            <thead>
                <tr>
                    <th width="8%">No</th>
                    <th width="18%">RT</th>
                    <th width="18%">RW</th>
                    <th width="22%">Jumlah UMKM</th>
                    <th width="17%">Produk</th>
                    <th width="17%">Persentase</th>
                </tr>
            </thead>

            <tbody>
                @foreach($rekapWilayah as $index => $wilayah)
                    <tr>
                        <td class="text-center">
                            {{ $index + 1 }}
                        </td>

                        <td class="text-center">
                            RT {{ $wilayah->rt ?? '-' }}
                        </td>

                        <td class="text-center">
                            RW {{ $wilayah->rw ?? '-' }}
                        </td>

                        <td class="text-center font-bold">
                            {{ $wilayah->jumlah_umkm }}
                        </td>

                        <td class="text-center">
                            {{ $wilayah->jumlah_produk }}
                        </td>

                        <td class="text-center">
                            {{ $totalUMKM > 0
                                ? number_format(($wilayah->jumlah_umkm / $totalUMKM) * 100, 1)
                                : 0
                            }}%
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @else

        <table class="data">
            <tr>
                <td class="text-center text-gray">
                    Belum ada data wilayah UMKM.
                </td>
            </tr>
        </table>

    @endif


    {{-- =========================================================
        3. REKAP KATEGORI USAHA
    ========================================================== --}}
    <div class="section-title">
        3. Rekapitulasi Berdasarkan Kategori Usaha
    </div>

    @if(isset($rekapKategori) && count($rekapKategori) > 0)

        <table class="data">
            <thead>
                <tr>
                    <th width="8%">No</th>
                    <th width="42%">Kategori Usaha</th>
                    <th width="25%">Jumlah UMKM</th>
                    <th width="25%">Jumlah Produk</th>
                </tr>
            </thead>

            <tbody>
                @foreach($rekapKategori as $index => $kategori)
                    <tr>
                        <td class="text-center">
                            {{ $index + 1 }}
                        </td>

                        <td>
                            {{ $kategori->name }}
                        </td>

                        <td class="text-center">
                            {{ $kategori->jumlah_umkm }}
                        </td>

                        <td class="text-center">
                            {{ $kategori->jumlah_produk }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @else

        <table class="data">
            <tr>
                <td class="text-center text-gray">
                    Belum ada data kategori usaha.
                </td>
            </tr>
        </table>

    @endif


    {{-- =========================================================
        4. DAFTAR SELURUH UMKM
    ========================================================== --}}
    <div class="section-title page-break">
        4. Daftar Lengkap UMKM Desa Tedunan
    </div>

    <table class="data">
        <thead>
            <tr>
                <th width="4%">No</th>
                <th width="17%">Nama UMKM</th>
                <th width="16%">Pemilik</th>
                <th width="13%">Kategori</th>
                <th width="10%">RT/RW</th>
                <th width="16%">Kontak</th>
                <th width="12%">Produk</th>
                <th width="12%">Status</th>
            </tr>
        </thead>

        <tbody>

            @forelse($sellers as $index => $seller)

                <tr>

                    <td class="text-center">
                        {{ $index + 1 }}
                    </td>

                    <td class="font-bold">
                        {{ $seller->business_name ?? '-' }}
                    </td>

                    <td>
                        {{ $seller->owner_name ?? '-' }}
                    </td>

                    <td>
                        {{ $seller->businessCategory->name ?? '-' }}
                    </td>

                    <td class="text-center">
                        RT {{ $seller->rt ?? '-' }}
                        <br>
                        RW {{ $seller->rw ?? '-' }}
                    </td>

                    <td>
                        {{ $seller->phone ?? '-' }}
                    </td>

                    <td class="text-center">
                        {{ $seller->products_count ?? $seller->products->count() }}
                    </td>

                    <td class="text-center">

                        @if(isset($seller->verification_status))

                            @if($seller->verification_status === 'approved')
                                <span class="badge badge-green">
                                    Terverifikasi
                                </span>
                            @elseif($seller->verification_status === 'pending')
                                <span class="badge badge-yellow">
                                    Menunggu
                                </span>
                            @else
                                <span class="badge badge-red">
                                    Ditolak
                                </span>
                            @endif

                        @else

                            -

                        @endif

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="8" class="text-center text-gray">
                        Belum ada data UMKM.
                    </td>
                </tr>

            @endforelse

        </tbody>
    </table>


    {{-- =========================================================
        5. DETAIL PRODUK SETIAP UMKM
    ========================================================== --}}
    <div class="section-title page-break">
        5. Detail Produk Setiap UMKM
    </div>

    @forelse($sellers as $seller)

        <div class="umkm-card">

            <div class="umkm-header">

                <div class="umkm-name">
                    {{ $seller->business_name ?? '-' }}
                </div>

                <div class="umkm-meta">
                    Pemilik:
                    {{ $seller->owner_name ?? '-' }}
                    &nbsp; | &nbsp;

                    RT {{ $seller->rt ?? '-' }}/RW {{ $seller->rw ?? '-' }}
                    &nbsp; | &nbsp;

                    {{ $seller->businessCategory->name ?? 'Tanpa Kategori' }}
                </div>

            </div>

            <div class="umkm-body">

                <table class="data">

                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="28%">Produk</th>
                            <th width="17%">Kategori</th>
                            <th width="15%">Harga</th>
                            <th width="10%">Stok</th>
                            <th width="10%">Ulasan</th>
                            <th width="15%">Rating</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($seller->products as $product)

                            <tr>

                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="font-bold">
                                    {{ $product->name }}
                                </td>

                                <td>
                                    {{ $product->productCategory->name ?? '-' }}
                                </td>

                                <td class="text-right">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </td>

                                <td class="text-center">
                                    {{ $product->stock }}
                                </td>

                                <td class="text-center">
                                    {{ $product->reviews->count() }}
                                </td>

                                <td class="text-center">

                                    @if($product->reviews->count() > 0)

                                        {{ number_format($product->reviews->avg('rating'), 1) }}
                                        / 5

                                    @else

                                        -

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center text-gray">
                                    UMKM ini belum memiliki produk.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    @empty

        <p class="text-center text-gray">
            Belum ada data UMKM.
        </p>

    @endforelse


    {{-- =========================================================
        6. INFORMASI LOKASI & KONTAK
    ========================================================== --}}
    <div class="section-title page-break">
        6. Informasi Kontak dan Lokasi UMKM
    </div>

    <table class="data">

        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="20%">UMKM</th>
                <th width="18%">Pemilik</th>
                <th width="12%">RT/RW</th>
                <th width="17%">Telepon</th>
                <th width="28%">Alamat</th>
            </tr>
        </thead>

        <tbody>

            @forelse($sellers as $index => $seller)

                <tr>

                    <td class="text-center">
                        {{ $index + 1 }}
                    </td>

                    <td class="font-bold">
                        {{ $seller->business_name ?? '-' }}
                    </td>

                    <td>
                        {{ $seller->owner_name ?? '-' }}
                    </td>

                    <td class="text-center">
                        RT {{ $seller->rt ?? '-' }}
                        <br>
                        RW {{ $seller->rw ?? '-' }}
                    </td>

                    <td>
                        {{ $seller->phone ?? '-' }}
                    </td>

                    <td>
                        {{ $seller->address ?? '-' }}
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="6" class="text-center">
                        Belum ada data.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>


    {{-- =========================================================
        FOOTER
    ========================================================== --}}
    <div class="footer">

        <strong>
            Sistem Katalog Digital UMKM Desa Tedunan
        </strong>

        <br>

        Laporan ini dibuat secara otomatis oleh sistem.

        <br>

        Pemerintah Desa Tedunan &bull;
        Katalog UMKM Desa Tedunan

    </div>

</body>
</html>