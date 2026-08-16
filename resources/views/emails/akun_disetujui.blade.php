<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran UMKM Disetujui</title>
</head>

<body style="
    margin:0;
    padding:0;
    background-color:#f3f4f6;
    font-family:Arial, Helvetica, sans-serif;
    color:#374151;
">

    <!-- Container -->
    <div style="
        max-width:600px;
        margin:30px auto;
        background:#ffffff;
        border-radius:12px;
        overflow:hidden;
        box-shadow:0 3px 12px rgba(0,0,0,0.08);
    ">

        <!-- ================= HEADER ================= -->
        <div style="
            background:#2563eb;
            padding:28px 25px;
            text-align:center;
            color:#ffffff;
        ">

            <!-- Logo -->
            <div style="margin-bottom:15px;">
                <img
                    src="{{ asset('images/logoDesa.png') }}"
                    alt="Logo Desa Tedunan"
                    style="
                        height:75px;
                        max-width:180px;
                        object-fit:contain;
                    "
                >
            </div>

            <h1 style="
                margin:0;
                font-size:22px;
                font-weight:bold;
            ">
                Katalog UMKM Desa Tedunan
            </h1>

            <p style="
                margin:8px 0 0;
                font-size:13px;
                color:#dbeafe;
            ">
                Sistem Katalog Digital UMKM Desa Tedunan
            </p>

        </div>


        <!-- ================= CONTENT ================= -->
        <div style="padding:32px;">

            <h2 style="
                margin:0 0 20px;
                font-size:21px;
                color:#111827;
            ">
                Pendaftaran UMKM Disetujui 🎉
            </h2>


            <!-- Greeting -->
            <p style="
                margin:0 0 15px;
                font-size:14px;
                line-height:1.7;
            ">
                Halo,
                <strong>{{ $user->name }}</strong>.
            </p>


            <!-- Main Message -->
            <p style="
                margin:0 0 15px;
                font-size:14px;
                line-height:1.7;
            ">
                Selamat! Pendaftaran usaha
                <strong>{{ $user->seller->business_name }}</strong>
                di
                <strong>Katalog Digital UMKM Desa Tedunan</strong>
                telah disetujui oleh Admin.
            </p>


            <p style="
                margin:0 0 20px;
                font-size:14px;
                line-height:1.7;
            ">
                Sekarang Anda sudah dapat masuk ke dalam sistem untuk
                melengkapi profil usaha, mengelola produk, serta memperbarui
                informasi UMKM Anda.
            </p>


            <!-- ================= INFORMASI AKUN ================= -->
            <div style="
                background:#eff6ff;
                border:1px solid #dbeafe;
                border-radius:8px;
                padding:20px;
                margin:25px 0;
            ">

                <h3 style="
                    margin:0 0 15px;
                    font-size:16px;
                    color:#1e40af;
                ">
                    Informasi Akun
                </h3>


                <p style="
                    margin:0 0 12px;
                    font-size:14px;
                    line-height:1.6;
                ">
                    <strong>Nama Pemilik</strong><br>
                    {{ $user->name }}
                </p>


                <p style="
                    margin:0 0 12px;
                    font-size:14px;
                    line-height:1.6;
                ">
                    <strong>Email Login</strong><br>
                    {{ $user->email }}
                </p>


                <p style="
                    margin:0;
                    font-size:14px;
                    line-height:1.6;
                ">
                    <strong>Nama Usaha</strong><br>
                    {{ $user->seller->business_name }}
                </p>

            </div>


            <!-- ================= BUTTON LOGIN ================= -->
            <div style="
                text-align:center;
                margin:30px 0;
            ">

                <a
                    href="{{ route('login') }}"
                    style="
                        display:inline-block;
                        padding:13px 26px;
                        background:#2563eb;
                        color:#ffffff;
                        text-decoration:none;
                        border-radius:7px;
                        font-size:14px;
                        font-weight:bold;
                    "
                >
                    Login ke Dashboard Penjual
                </a>

            </div>


            <!-- ================= PANDUAN LOGIN ================= -->
            <div style="
                border-top:1px solid #e5e7eb;
                padding-top:22px;
                margin-top:25px;
            ">

                <h3 style="
                    margin:0 0 12px;
                    font-size:16px;
                    color:#111827;
                ">
                    Panduan Login
                </h3>


                <ol style="
                    margin:0;
                    padding-left:20px;
                    font-size:13px;
                    line-height:1.8;
                    color:#4b5563;
                ">

                    <li>
                        Klik tombol
                        <strong>Login ke Dashboard Penjual</strong>
                        pada email ini.
                    </li>

                    <li>
                        Masukkan email yang digunakan saat pendaftaran.
                    </li>

                    <li>
                        Masukkan password yang telah dibuat saat pendaftaran.
                    </li>

                    <li>
                        Klik tombol <strong>Login</strong>.
                    </li>

                    <li>
                        Setelah berhasil masuk, Anda dapat melengkapi
                        profil usaha dan mengelola produk UMKM.
                    </li>

                </ol>

            </div>


            <!-- ================= SECURITY ================= -->
            <div style="
                margin-top:22px;
                padding:15px;
                background:#fffbeb;
                border-left:4px solid #f59e0b;
                border-radius:4px;
            ">

                <p style="
                    margin:0;
                    font-size:12px;
                    line-height:1.6;
                    color:#92400e;
                ">
                    <strong>Catatan Keamanan:</strong><br>
                    Jangan membagikan informasi akun Anda kepada orang lain.
                    Pastikan password tetap bersifat pribadi dan aman.
                </p>

            </div>


            <!-- Closing -->
            <p style="
                margin:25px 0 10px;
                font-size:13px;
                line-height:1.7;
                color:#6b7280;
            ">
                Terima kasih telah bergabung dalam
                <strong>Katalog Digital UMKM Desa Tedunan</strong>.
            </p>


            <p style="
                margin:0;
                font-size:13px;
                line-height:1.7;
                color:#6b7280;
            ">
                Salam,<br>
                <strong>Admin Desa Tedunan</strong>
            </p>

        </div>


        <!-- ================= FOOTER ================= -->
        <div style="
            background:#f9fafb;
            padding:17px 20px;
            text-align:center;
            font-size:11px;
            line-height:1.6;
            color:#9ca3af;
        ">

            Email ini dikirim secara otomatis oleh
            <strong>Sistem Katalog UMKM Desa Tedunan</strong>.

            <br>

            Mohon tidak membalas email ini.

        </div>

    </div>

</body>
</html>