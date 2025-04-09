@extends('page.main')
@section('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Pesanan Produk</h1>
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
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{ asset('assets/media/products/mobil-1.png') }}" alt=""
                                                width="150px" height="100px">
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
                                        <h5>1</h5>
                                    </div>
                                </td>
                                <td>
                                    <h5>360.000.000</h5>
                                </td>
                            </tr>
                            </tr>
                            <tr class="bottom_button">
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5>360.000.000</h5>
                                </td>
                            </tr>
                            <tr class="shipping_area">
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Detail</h5>
                                </td>
                                <td>
                                    <div class="shipping_box">
                                        <ul class="list">
                                            <li>Total Pesanan: 1</li>
                                            <li>Tanggal: 17/03/2025</li>
                                            <li>Kode Pesanan : PO012912</li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td> </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="checkout_btn_inner ml-4">
                                        <a class="primary-btn" href="#">Beli</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
