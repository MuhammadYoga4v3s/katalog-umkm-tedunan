<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Disetujui</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333; line-height: 1.6;">
    <h2>Halo, {{ $user->name }}!</h2>
    <p>Selamat, pendaftaran usaha <strong>{{ $user->seller->business_name }}</strong> di Katalog Digital UMKM Desa Tedunan telah disetujui oleh Admin.</p>
    
    <p>Sekarang Anda sudah bisa mengelola profil toko dan mengunggah produk Anda. Berikut adalah detail akun Anda:</p>
    <ul>
        <li><strong>Email:</strong> {{ $user->email }}</li>
        <li><strong>Password:</strong> <i>(Password yang Anda buat saat pendaftaran)</i></li>
    </ul>

    <p>
        <a href="{{ route('login') }}" style="display: inline-block; padding: 10px 20px; background-color: #2563eb; color: white; text-decoration: none; border-radius: 5px;">Login ke Dashboard Penjual</a>
    </p>
    
    <p>Terima kasih,<br>Admin Desa Tedunan</p>
</body>
</html>