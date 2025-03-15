@extends('page.main')
@section('content')
    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-start">
                <div class="col-lg-12">
                    <div class="row single-slide align-items-center d-flex">
                        <div class="col-lg-5 col-md-6">
                            <div class="banner-content">
                                <h1>Selamat Datang di <br>Roditri Mobil!</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="banner-img">
                                <img class="d-none d-lg-block mx-auto w-200px w-md-40 w-xl-400px mb-8 mb-lg-20
                                    animate__animated animate__fadeInRight"
                                    style="--animate-duration: 1.5s; --animate-delay: 0.5s;"
                                    src="{{ asset('assets/media/misc/car.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="features-area section_gap">
        <div class="container">
            <div class="row features-inner">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('themes/img/features/f-icon1.png') }}" alt="">
                        </div>
                        <h6>Free Delivery</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('themes/img/features/f-icon2.png') }}" alt="">
                        </div>
                        <h6>Return Policy</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('themes/img/features/f-icon3.png') }}" alt="">
                        </div>
                        <h6>24/7 Support</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('themes/img/features/f-icon4.png') }}" alt="">
                        </div>
                        <h6>Secure Payment</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="">
        <div class="">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Produk Terbaru</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('themes/img/product/mobil-1.png') }}" alt="">
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
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('themes/img/product/mobil-1.png') }}" alt="">
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
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('themes/img/product/mobil-1.png') }}" alt="">
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
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('themes/img/product/mobil-1.png') }}" alt="">
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
                </div>
            </div>
        </div>
    </section>
@endsection
