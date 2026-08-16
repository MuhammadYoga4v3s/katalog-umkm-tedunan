<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Toko - {{ $seller->business_name }}</title>
    <style>
        /* CSS Murni untuk DOMPDF */
        body { font-family: Arial, sans-serif; font-size: 12px; color: #333; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #27ae60; padding-bottom: 10px; }
        .header h2 { margin: 0; font-size: 18px; text-transform: uppercase; color: #27ae60; }
        .header h3 { margin: 5px 0 0; font-size: 14px; font-weight: normal; }
        .info-toko { margin-bottom: 20px; font-size: 13px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; text-align: center; }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .footer { margin-top: 30px; font-size: 10px; text-align: right; color: #666; }
    </style>
</head>
<body>

    <div class="header">
        <h2>LAPORAN DATA PRODUK & PENILAIAN</h2>
        <h3>{{ $seller->business_name }} - UMKM Desa Tedunan</h3>
    </div>

    <div class="info-toko">
        <table style="width: 50%; border: none; margin-bottom: 20px;">
            <tr><td style="border: none; padding: 2px;"><strong>Pemilik</strong></td><td style="border: none; padding: 2px;">: {{ $seller->owner_name }}</td></tr>
            <tr><td style="border: none; padding: 2px;"><strong>Kontak</strong></td><td style="border: none; padding: 2px;">: {{ $seller->phone }}</td></tr>
            <tr><td style="border: none; padding: 2px;"><strong>Alamat</strong></td><td style="border: none; padding: 2px;">: RT {{ $seller->rt }}/RW {{ $seller->rw }}</td></tr>
            <tr><td style="border: none; padding: 2px;"><strong>Dicetak Pada</strong></td><td style="border: none; padding: 2px;">: {{ \Carbon\Carbon::now()->translatedFormat('d F Y, H:i') }}</td></tr>
        </table>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="35%">Nama Produk</th>
                <th width="20%">Harga (Rp)</th>
                <th width="15%">Sisa Stok</th>
                <th width="15%">Jumlah Ulasan</th>
                <th width="10%">Rating</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $index => $product)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $product->name }}</td>
                <td class="text-right">{{ number_format($product->price, 0, ',', '.') }}</td>
                <td class="text-center">{{ $product->stock }}</td>
                <td class="text-center">{{ $product->reviews->count() }}</td>
                <td class="text-center">{{ $product->reviews_avg_rating ? number_format($product->reviews_avg_rating, 1) : '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada produk yang terdaftar.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Dicetak otomatis oleh Sistem Katalog UMKM Desa Tedunan.
    </div>

</body>
</html>