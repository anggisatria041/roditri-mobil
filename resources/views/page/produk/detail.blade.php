@extends('page.main')
@section('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Detail Produk</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('home') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('produk') }}">Produk<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('detail-produk') }}">Detail Produk</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="s_Product_carousel">
                        <div class="single-prd-item">
                            <img class="img-fluid" img src="{{ asset('themes/img/category/mobil1.jpg') }}" alt="">
                        </div>
                        <div class="single-prd-item">
                            <img class="img-fluid" img src="{{ asset('themes/img/category/mobil1.jpg') }}" alt="">
                        </div>
                        <div class="single-prd-item">
                            <img class="img-fluid" img src="{{ asset('themes/img/category/mobil1.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>Toyota Avanza 2022</h3>
                        <h2>Rp 149.999.999</h2>
                        <ul class="list">
                            <li><span>Tahun</span> : 2022</a></li>
                            <li><span>Warna</span> : Hitam</a></li>
                        </ul>
                        <p>Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking
                            for
                            something that can make your interior look awesome, and at the same time give you the pleasant
                            warm feeling
                            during the winter.</p>
                        <div class="product_count">
                            <label for="qty">Quantity:</label>
                            <input type="number" name="qty" maxlength="2" value="1" title="Quantity:"
                                class="input-text qty">

                        </div>
                        <div class="card_area d-flex align-items-center">
                            <a class="primary-btn" href="#">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">Spesifikasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab"
                        aria-controls="review" aria-selected="false">Fitur</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5>Kapasitas Mesin</h5>
                                    </td>
                                    <td>
                                        <h5>1500 cc</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Bahan Bakar</h5>
                                    </td>
                                    <td>
                                        <h5>Bensin</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Tipe</h5>
                                    </td>
                                    <td>
                                        <h5>1.5 G</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Jumlah Muatan</h5>
                                    </td>
                                    <td>
                                        <h5>6 Orang</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Masa Berlaku STNK</h5>
                                    </td>
                                    <td>
                                        <h5>Mei 2023</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Jarak Tempuh</h5>
                                    </td>
                                    <td>
                                        <h5>1500 Km</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row total_rate">
                                <div class="col-6">
                                    <div class="box_total">
                                        <h4>Toyota Avanza 2022</h4>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="rating_list">
                                        <h3>Fitur</h3>
                                        <ul class="list">
                                            <li><i class="fa fa-star"></i> Interior Canggih</li>
                                            <li><i class="fa fa-star"></i> Desain Modern</li>
                                            <li><i class="fa fa-star"></i> Kamera 360 Derajat</li>
                                            <li><i class="fa fa-star"></i> Layar Sentuh 8 Inc</li>
                                            <li><i class="fa fa-star"></i> Bluetooth Connected</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
