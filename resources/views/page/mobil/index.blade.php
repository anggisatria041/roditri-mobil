@extends('page.main')
@section('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Kategori Mobil</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('home') }}">Beranda<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('mobil') }}">Mobil</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Pencarian Kategori</div>
                    <ul class="main-categories">
                        <li class="main-nav-list"><a href="#">Kategori 1</a></li>
                        <li class="main-nav-list"><a href="#">Kategori 2</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                        <!-- single product -->
                        <div class="col-lg-4 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" img src="{{ asset('assets/media/products/mobil-1.png') }}" alt="">
                                <div class="product-details">
                                    <h6>Toyota Avanza 2022</h6>
                                    <div class="price">
                                        <h6>Rp 150.000.000</h6>
                                        <h6 class="l-through">Rp 210.000.000</h6>
                                    </div>
                                    <div class="prd-bottom">

                                        <a href="" class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Checkout</p>
                                        </a>
                                        <a href="{{ route('detailMobil') }}" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">view detail</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single product -->
                        <div class="col-lg-4 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" img src="{{ asset('assets/media/products/mobil-1.png') }}" alt="">
                                <div class="product-details">
                                    <h6>Toyota Avanza 2022</h6>
                                    <div class="price">
                                        <h6>Rp 150.000.000</h6>
                                        <h6 class="l-through">Rp 210.000.000</h6>
                                    </div>
                                    <div class="prd-bottom">

                                        <a href="" class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Checkout</p>
                                        </a>
                                        <a href="href=" {{ route('detailMobil') }}"" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">view detail</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single product -->
                        <div class="col-lg-4 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" img src="{{ asset('assets/media/products/mobil-1.png') }}" alt="">
                                <div class="product-details">
                                    <h6>Toyota Avanza 2022</h6>
                                    <div class="price">
                                        <h6>Rp 150.000.000</h6>
                                        <h6 class="l-through">Rp 210.000.000</h6>
                                    </div>
                                    <div class="prd-bottom">

                                        <a href="" class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Checkout</p>
                                        </a>
                                        <a href="href=" {{ route('detailMobil') }}"" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">view detail</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Best Seller -->
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="pagination">
                        <a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                        <a href="#">6</a>
                        <a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <!-- End Filter Bar -->
            </div>
        </div>
    </div>
    <div class="mb-4"></div>
@endsection