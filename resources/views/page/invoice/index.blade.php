@extends('page.main')
@section('content')
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Invoice Pesanan</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('home') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="{{ route('invoice') }}">invoice</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="invoice-area mt-5 mb-5">
    <div class="container border p-5 bg-white shadow-sm">
        <div class="row mb-4">
            <div class="col">
                <h2>Invoice</h2>
                <p>No. Invoice: INV-25715560</p>
                <p>Tanggal: 30/04/2025</p>
            </div>
            <div class="col text-right">
                <h5>Nagita</h5>
                <p>Jl. Arwana No. 123<br>Telp: 08123456789<br>Email: info@example.com</p>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <h5>Tagihan Kepada:</h5>
                <p>Nagita<br>nagita@gmail.com</p>
            </div>
        </div>

        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Pembayaran Via</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Toyota Avanza 2022</td>
                        <td>Rp 360.000.000</td>
                        <td>Transfer Bank</td>
                        <td>Success</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="text-right">
            <h4>Total: Rp 360.000.000</h4>
        </div>

        <div class="text-center mt-5">
            <p>Terima kasih telah berbelanja di Roditri Mobil</p>
        </div>
    </div>
</section>

@endsection