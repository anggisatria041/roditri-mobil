@extends('page.main')
@section('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Detail Mobil</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('home') }}">Beranda<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('mobil') }}">Mobil<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('detailMobil') }}">Detail Mobil</a>
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
                            <li><a class="active" href="#"><span>Category</span> : Household</a></li>
                            <li><a href="#"><span>Availibility</span> : In Stock</a></li>
                        </ul>
                        <p>Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking
                            for
                            something that can make your interior look awesome, and at the same time give you the pleasant
                            warm feeling
                            during the winter.</p>
                        <div class="product_count">
                            <label for="qty">Quantity:</label>
                            <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:"
                                class="input-text qty">
                            <button
                                onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                            <button
                                onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                        </div>
                        <div class="card_area d-flex align-items-center">
                            <a class="primary-btn" href="#">Checkout</a>
                            <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
                            <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="product_description_area">
        <div class="container">

        </div>
    </section>
@endsection