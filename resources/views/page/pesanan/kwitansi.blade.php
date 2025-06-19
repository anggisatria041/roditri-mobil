<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kwitansi Pembelian Mobil</title>
    <style>
        @font-face {
            font-family: 'DejaVu Sans';
            font-style: normal;
            font-weight: normal;
            src: url("{{ storage_path('fonts/DejaVuSans.ttf') }}") format('truetype');
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 14px;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 700px;
            margin: auto;
            padding: 30px;
            background-color: #fff;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #0d47a1;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }


        .company-info {
            text-align: right;
            font-size: 13px;
            line-height: 1.4;
        }

        .company-info strong {
            font-size: 15px;
            color: #0d47a1;
        }

        .title-section {
            text-align: center;
            margin-bottom: 20px;
        }

        .title-section .title {
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
            color: #0d47a1;
        }

        .line {
            border-top: 2px dashed #999;
            margin: 20px 0;
        }

        table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }

        td {
            padding: 6px 4px;
            vertical-align: top;
        }

        .label {
            width: 180px;
            font-weight: bold;
            color: #000;
        }

        .status {
            font-size: 16px;
            font-weight: bold;
            color: green;
            text-align: center;
            margin-top: 30px;
            text-transform: uppercase;
        }

        .footer {
            margin-top: 50px;
            text-align: right;
        }

        .signature {
            margin-top: 0px;
            text-align: right;
        }

        .signature-box {
            margin-top: 0;
            display: inline-block;
            text-align: center;
        }

        .signature-box .line-sign {
            border-top: 1px solid #000;
            width: 200px;
            margin: 0 auto 5px;
        }

        .copyright {
            text-align: center;
            margin-top: 40px;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo" style="display: flex; align-items: center; gap: 10px;">
                <img src="{{ public_path('themes/img/logo/logo-new.png') }}" alt="Logo PT Roditri Mobil" width="40">
                <p style="color: #DB1430; margin: 0; font-weight:bold;">RODITRI MOBIL</p>
            </div>
            <div class="company-info">
                <strong>PT. Roditri Mobil</strong><br>
                Jl. Soekarno Hatta No. 123, Pekanbaru, Riau<br>
                Telp: (0761) 123456 | WA: 0812-3456-7890<br>
                Email: info@roditrimobil.co.id
            </div>
        </div>

        <div class="title-section">
            <div class="title">Kwitansi Pelunasan Pembelian Mobil</div>
            <small>No. Kwitansi: <strong>KW-{{ str_pad($data->id, 5, '0', STR_PAD_LEFT) }}</strong></small>
        </div>

        <div class="line"></div>

        <table>
            <tr>
                <td class="label">Tanggal</td>
                <td>: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td class="label">Nama Pembeli</td>
                <td>: {{ $data->user->nama }}</td>
            </tr>
            <tr>
                <td class="label">Produk Mobil</td>
                <td>: {{ $data->produk->nama }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Pembayaran</td>
                <td>: {{ ucfirst($data->jenis_pembayaran) }}</td>
            </tr>
            <tr>
                <td class="label">Harga</td>
                <td>: Rp {{ number_format($data->produk->harga, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td class="label">Status Pembayaran</td>
                <td>: <strong style="color:green;">LUNAS</strong></td>
            </tr>
        </table>

        <div class="status">Transaksi Selesai - Pembayaran Telah Diterima</div>

        <div class="footer">
            Pekanbaru, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}
        </div>

        <div class="signature">
            <div class="signature-box">
                <img src="{{ public_path('themes/img/logo/ttd.png') }}" alt="Logo PT Roditri Mobil" width="100">
                <div class="line-sign"></div>
                <strong>Admin / Petugas</strong>
            </div>
        </div>

        <div class="copyright">
            &copy; {{ date('Y') }} PT. Roditri Mobil. Semua hak dilindungi undang-undang.
        </div>
    </div>
</body>

</html>
