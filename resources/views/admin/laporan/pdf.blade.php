<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Katalog UMKM Desa Tedunan</title>
    <style>
        /* CSS Murni agar terbaca oleh DOMPDF */
        body { font-family: Arial, sans-serif; font-size: 12px; color: #333; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #333; padding-bottom: 10px; }
        .header h2 { margin: 0; font-size: 18px; text-transform: uppercase; }
        .header h3 { margin: 5px 0 0; font-size: 14px; font-weight: normal; }
        .summary { margin-bottom: 20px; }
        .summary p { margin: 5px 0; font-size: 13px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #999; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; text-align: center; }
        .text-center { text-align: center; }
        .footer { margin-top: 30px; font-size: 10px; text-align: right; color: #666; }
    </style>
</head>
<body>

    <div class="header">
        <h2>LAPORAN STATISTIK PLATFORM</h2>
        <h3>Katalog Digital UMKM Desa Tedunan</h3>
    </div>

    <div class="summary">
        <p><strong>Tanggal Dicetak :</strong> {{ \Carbon\Carbon::now()->translatedFormat('d F Y, H:i') }}</p>
        <p><strong>Total UMKM Aktif :</strong> {{ $totalUMKM }} Toko</p>
        <p><strong>Total Produk Terdaftar :</strong> {{ $totalProduk }} Produk</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%">Nama UMKM</th>
                <th width="25%">Nama Pemilik</th>
                <th width="25%">Kategori Usaha</th>
                <th width="20%">Jumlah Produk</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sellers as $index => $seller)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $seller->business_name }}</td>
                <td>{{ $seller->owner_name }}</td>
                <td>{{ $seller->businessCategory->name ?? '-' }}</td>
                <td class="text-center">{{ $seller->products_count }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada data UMKM.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Dicetak oleh sistem Administrator Katalog UMKM Desa Tedunan.
    </div>

</body>
</html>