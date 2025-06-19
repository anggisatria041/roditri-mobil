@extends('layouts.main')
@section('toolbar')
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center me-3 flex-wrap lh-1">
            <h1 class="d-flex align-items-center text-gray-900 fw-bold my-1 fs-3">Dashboard</h1>
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="" class="text-muted text-hover-primary">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-gray-900">Index</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row g-5 gx-xl-10">
                <div class="page-heading">
                </div>
                <div class="col-xxl-12 mb-md-5 mb-xl-10">
                    <div class="row g-5 g-xl-8">
                        <div class="col-xl-3">
                            <a href="{{ route('produk.index') }}" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                                <div class="card-body">
                                    <i class="ki-outline ki-chart-simple text-primary fs-2x ms-n1"></i>
                                    <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">Total: {{ $produk }}</div>
                                    <div class="fw-semibold text-gray-400">Jumlah Produk</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3">
                            <a href="{{ route('pemesanan.index') }}" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                                <div class="card-body">
                                    <i class="ki-outline ki-cheque text-gray-100 fs-2x ms-n1"></i>
                                    <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">Total: {{ $pesanan }}</div>
                                    <div class="fw-semibold text-gray-100">Jumlah Pemesanan</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3">
                            <a href="{{ route('pemesanan.index') }}"
                                class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                                <div class="card-body">
                                    <i class="ki-outline ki-briefcase text-white fs-2x ms-n1"></i>
                                    <div class="text-white fw-bold fs-2 mb-2 mt-5">Total: {{ $pesanan_kredit }}</div>
                                    <div class="fw-semibold text-white">Jumlah Pemesanan Kredit</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3">
                            <a href="{{ route('pemesanan.index') }}"
                                class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
                                <div class="card-body">
                                    <i class="ki-outline ki-chart-pie-simple text-white fs-2x ms-n1"></i>
                                    <div class="text-white fw-bold fs-2 mb-2 mt-5">Total: {{ $pesanan_tunai }}</div>
                                    <div class="fw-semibold text-white">Jumlah Pemesanan Tunai</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
