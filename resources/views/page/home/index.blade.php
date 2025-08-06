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
                            <h4>Roditri Mobil, Tempatnya Para Pemburu Roda!</h4>
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
                    <h6>Jual Beli Mobil Bekas</h6>
                    <p>Semua Merk Tersedia</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="{{ asset('themes/img/features/f-icon2.png') }}" alt="">
                    </div>
                    <h6>Tukar Tambah Mobil</h6>
                    <p>tukar mobil lama dengan yang lebih baru</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="{{ asset('themes/img/features/f-icon3.png') }}" alt="">
                    </div>
                    <h6>24/7 Support</h6>
                    <p>Layanan Pengaduan Selalu Tersedia</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="{{ asset('themes/img/features/f-icon4.png') }}" alt="">
                    </div>
                    <h6>Pembayaran Aman</h6>
                    <p>Proses cepat & transparan</p>
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
                        <h1>Produk Kami</h1>
                        <p>Produk Unggulan Kami</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($produk as $value)
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <div class="product-img-container"
                            style="height: 200px; display: flex; align-items: center; justify-content: center;">
                            <img class="img-fluid" style="max-height: 100%; max-width: 100%; object-fit: contain;"
                                src="{{ Storage::url($value->foto1) }}" alt="{{ $value->nama }}">
                        </div>
                        <div class="product-details">
                            <h6>{{ $value->nama }} {{ $value->tahun }}</h6>
                            <div class="price">
                                <h6> {{ isset($value->harga) ? 'Rp ' . number_format($value->harga, 0, ',', '.') : 'Rp 0' }}
                                </h6>
                            </div>
                            <div class="prd-bottom">
                                <a href="{{ url('roditri-mobil/detail_produk/' . Crypt::encryptString($value->id)) }}"
                                    class="social-info">
                                    <span class="lnr lnr-move"></span>
                                    <p class="hover-text">view detail</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection