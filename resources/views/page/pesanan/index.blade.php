@extends('page.main')
@section('content')
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Histori Pesanan</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('home') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="{{ route('pesanan') }}">Pesanan</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Pembayaran Via</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/media/products/mobil-1.png') }}" alt="" width="150px"
                                            height="100px">
                                    </div>
                                    <div class="media-body">
                                        <p>Toyota Avanza 2022</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>360.000.000</h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <h5>Transfer Bank</h5>
                                </div>
                            </td>
                            <td>
                                <h5>Success</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/media/products/mobil-1.png') }}" alt="" width="150px"
                                            height="100px">
                                    </div>
                                    <div class="media-body">
                                        <p>Toyota Avanza 2022</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>360.000.000</h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <h5>Kredit</h5>
                                </div>
                            </td>
                            <td>
                                <h5>Pandding</h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection