@extends('page.main')
@section('content')
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Detail Cicilan</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('home') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="{{ route('pesanan') }}">Pesanan<span class="lnr lnr-arrow-right"></span></a>
                    <a href="">Detail Cicilan</a>
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
                            <th scope="col">Harga Cicilan</th>
                            <th scope="col">Cicilan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
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
                                <div>
                                    <h5>Cicilan 1</h5>
                                </div>
                            </td>
                            <td>
                                <h5>Success</h5>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="#" data-bs-toggle="modal"
                                    data-bs-target="#bayarModal">Bayar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>
                                <h5>360.000.000</h5>
                            </td>
                            <td>
                                <div>
                                    <h5>Cicilan 2</h5>
                                </div>
                            </td>
                            <td>
                                <h5>Pandding</h5>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="#" data-bs-toggle="modal"
                                    data-bs-target="#bayarModal">Bayar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="bayarModal" tabindex="-1" aria-labelledby="bayarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bayarModalLabel">Upload Pembayaran Cicilan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <form id="formCicilan">
                    <div class="mb-3">
                        <label for="bukti_tf" class="form-label">Bukti Pembayaran</label>
                        <input type="file" class="form-control" id="bukti_tf" required>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection