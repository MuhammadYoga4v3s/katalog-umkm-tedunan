<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Toko - {{ $seller->business_name }}</title>

    <style>
        @page {
            margin: 35px 40px;
        }

        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 11px;
            color: #374151;
            line-height: 1.5;
        }

        /* =========================
           HEADER
        ========================== */
        .header {
            width: 100%;
            border-bottom: 3px solid #16a34a;
            padding-bottom: 14px;
            margin-bottom: 20px;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-table td {
            border: none;
            padding: 0;
            vertical-align: middle;
        }

        .logo-box {
            width: 55px;
            height: 55px;
            border-radius: 8px;
            background-color: #f0fdf4;
            text-align: center;
            vertical-align: middle;
        }

        .logo-box img {
            max-width: 45px;
            max-height: 45px;
        }

        .header-title {
            padding-left: 12px !important;
        }

        .header-title h1 {
            margin: 0;
            color: #166534;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .header-title p {
            margin: 3px 0 0;
            color: #6b7280;
            font-size: 10px;
        }

        .header-date {
            text-align: right;
            color: #6b7280;
            font-size: 9px;
        }

        /* =========================
           JUDUL LAPORAN
        ========================== */
        .report-title {
            margin-bottom: 16px;
        }

        .report-title h2 {
            margin: 0;
            color: #111827;
            font-size: 15px;
        }

        .report-title p {
            margin: 3px 0 0;
            color: #6b7280;
            font-size: 10px;
        }

        /* =========================
           INFORMASI TOKO
        ========================== */
        .info-wrapper {
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-left: 4px solid #16a34a;
            padding: 12px 14px;
            margin-bottom: 20px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            border: none;
            padding: 3px 0;
            font-size: 10px;
        }

        .info-label {
            width: 18%;
            color: #166534;
            font-weight: bold;
        }

        .info-value {
            color: #374151;
        }

        /* =========================
           RINGKASAN
        ========================== */
        .summary-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 8px 0;
            margin: 0 -8px 20px;
        }

        .summary-table td {
            width: 33.33%;
            border: 1px solid #e5e7eb;
            background-color: #ffffff;
            padding: 10px;
            text-align: center;
            vertical-align: middle;
        }

        .summary-number {
            display: block;
            color: #16a34a;
            font-size: 17px;
            font-weight: bold;
        }

        .summary-label {
            display: block;
            color: #6b7280;
            font-size: 9px;
            margin-top: 2px;
        }

        /* =========================
           TABEL PRODUK
        ========================== */
        .product-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        .product-table th {
            background-color: #166534;
            color: #ffffff;
            border: 1px solid #166534;
            padding: 8px 6px;
            font-size: 9px;
            text-align: center;
            font-weight: bold;
        }

        .product-table td {
            border: 1px solid #d1d5db;
            padding: 7px 6px;
            font-size: 9.5px;
            vertical-align: middle;
        }

        .product-table tbody tr:nth-child(even) td {
            background-color: #f9fafb;
        }

        .product-name {
            font-weight: bold;
            color: #111827;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .rating {
            color: #d97706;
            font-weight: bold;
        }

        .no-rating {
            color: #9ca3af;
        }

        /* =========================
           FOOTER
        ========================== */
        .footer {
            margin-top: 25px;
            padding-top: 10px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            color: #9ca3af;
            font-size: 8.5px;
        }

        .footer strong {
            color: #166534;
        }
    </style>
</head>

<body>

    <!-- =========================
         HEADER
    ========================== -->
    <div class="header">
        <table class="header-table">
            <tr>
                <td style="width: 60px;">
                    <div class="logo-box">
                        @if(file_exists(public_path('images/logoDesa.png')))
                            <img src="{{ public_path('images/logoDesa.png') }}" alt="Logo Desa">
                        @endif
                    </div>
                </td>

                <td class="header-title">
                    <h1>Katalog UMKM Desa Tedunan</h1>
                    <p>Sistem Katalog Digital UMKM & Potensi Desa</p>
                </td>

                <td class="header-date">
                    Dicetak pada<br>
                    <strong>{{ \Carbon\Carbon::now()->translatedFormat('d F Y, H:i') }}</strong>
                </td>
            </tr>
        </table>
    </div>

    <!-- =========================
         JUDUL LAPORAN
    ========================== -->
    <div class="report-title">
        <h2>Laporan Data Produk & Penilaian</h2>
        <p>Informasi katalog produk dan ulasan pelanggan dari toko UMKM.</p>
    </div>

    <!-- =========================
         INFORMASI TOKO
    ========================== -->
    <div class="info-wrapper">
        <table class="info-table">
            <tr>
                <td class="info-label">Nama Usaha</td>
                <td class="info-value">: {{ $seller->business_name }}</td>
            </tr>

            <tr>
                <td class="info-label">Pemilik</td>
                <td class="info-value">: {{ $seller->owner_name }}</td>
            </tr>

            <tr>
                <td class="info-label">Kontak</td>
                <td class="info-value">: {{ $seller->phone }}</td>
            </tr>

            <tr>
                <td class="info-label">Alamat</td>
                <td class="info-value">
                    : {{ $seller->address ?? '-' }}
                    @if($seller->rt || $seller->rw)
                        , RT {{ $seller->rt ?? '-' }}/RW {{ $seller->rw ?? '-' }}
                    @endif
                </td>
            </tr>
        </table>
    </div>

    <!-- =========================
         RINGKASAN
    ========================== -->
    @php
        $totalProducts = $products->count();

        $totalReviews = $products->sum(function ($product) {
            return $product->reviews->count();
        });

        $allRatings = collect();

        foreach ($products as $product) {
            foreach ($product->reviews as $review) {
                $allRatings->push($review->rating);
            }
        }

        $averageRating = $allRatings->count() > 0
            ? $allRatings->avg()
            : 0;
    @endphp

    <table class="summary-table">
        <tr>
            <td>
                <span class="summary-number">{{ $totalProducts }}</span>
                <span class="summary-label">Total Produk</span>
            </td>

            <td>
                <span class="summary-number">{{ $totalReviews }}</span>
                <span class="summary-label">Total Ulasan</span>
            </td>

            <td>
                <span class="summary-number">
                    {{ $averageRating > 0 ? number_format($averageRating, 1) : '-' }}
                </span>
                <span class="summary-label">Rating Rata-rata</span>
            </td>
        </tr>
    </table>

    <!-- =========================
         DATA PRODUK
    ========================== -->
    <table class="product-table">
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
                @php
                    $reviewCount = $product->reviews->count();

                    $productRating = $reviewCount > 0
                        ? $product->reviews->avg('rating')
                        : null;
                @endphp

                <tr>
                    <td class="text-center">
                        {{ $index + 1 }}
                    </td>

                    <td>
                        <span class="product-name">
                            {{ $product->name }}
                        </span>
                    </td>

                    <td class="text-right">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </td>

                    <td class="text-center">
                        {{ $product->stock }}
                    </td>

                    <td class="text-center">
                        {{ $reviewCount }}
                    </td>

                    <td class="text-center">
                        @if($productRating !== null)
                            <span class="rating">
                                {{ number_format($productRating, 1) }}
                            </span>
                        @else
                            <span class="no-rating">-</span>
                        @endif
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        Belum ada produk yang terdaftar.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- =========================
         FOOTER
    ========================== -->
    <div class="footer">
        <strong>Katalog UMKM Desa Tedunan</strong><br>
        Laporan ini dibuat secara otomatis oleh Sistem Katalog Digital UMKM Desa Tedunan.
    </div>

</body>
</html>