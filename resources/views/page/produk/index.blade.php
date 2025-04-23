@extends('page.main')
@section('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Produk</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('home') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('produk') }}">Produk</a>
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
                        @foreach ($produk as $value)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <div class="product-image-wrapper"
                                        style="width: 100%; height: 250px; background: #f9f9f9; display: flex; justify-content: center; align-items: center; overflow: hidden;">
                                        <img src="{{ Storage::url($value->foto) }}" alt="{{ $value->nama }}"
                                            style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                    </div>
                                    <div class="product-details">
                                        <h6>{{ $value->nama }} {{ $value->tahun }}</h6>
                                        <div class="price">
                                            <h6>{{ isset($value->harga) ? 'Rp ' . number_format($value->harga, 0, ',', '.') : 'Rp 0' }}
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
                        <!-- single product -->
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
