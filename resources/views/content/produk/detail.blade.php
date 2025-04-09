@extends('layouts.main')
@section('toolbar')
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center me-3 flex-wrap lh-1">
            <h1 class="d-flex align-items-center text-gray-900 fw-bold my-1 fs-3">Produk</h1>
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="" class="text-muted text-hover-primary">Produk</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-gray-900">Detail</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="col-xl-8">
            <div class="card card-flush h-md-100">
                <div class="card-header pt-7">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">Detail Produk</span>
                        <span class="text-gray-500 mt-1 fw-semibold fs-6">Informasi</span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="{{ route('produk.index') }}" class="btn btn-sm btn-primary align-self-center">Kembali</a>
                    </div>
                </div>
                <div class="card-body pt-6">
                    <div class="card-body p-9">
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold fs-6 text-gray-800">Nama</label>
                            <label class="col-lg-1 fw-bold fs-6 text-gray-800">:</label>
                            <div class="col-lg-6">
                                <span class="fw-semibold">{{ $produk->nama }}</span>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold fs-6 text-gray-800">Tahun</label>
                            <label class="col-lg-1 fw-bold fs-6 text-gray-800">:</label>
                            <div class="col-lg-6 fv-row">
                                <span class="fw-semibold">{{ $produk->tahun }}</span>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold fs-6 text-gray-800">Harga</label>
                            <label class="col-lg-1 fw-bold fs-6 text-gray-800">:</label>
                            <div class="col-lg-6">
                                <span class="fw-semibold">
                                    {{ isset($produk->harga) ? 'Rp ' . number_format($produk->harga, 0, ',', '.') : 'Rp 0' }}
                                </span>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold fs-6 text-gray-800">Warna</label>
                            <label class="col-lg-1 fw-bold fs-6 text-gray-800">:</label>
                            <div class="col-lg-6">
                                <span class="fw-semibold">{{ $produk->warna }}</span>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold fs-6 text-gray-800">Bahan Bakar</label>
                            <label class="col-lg-1 fw-bold fs-6 text-gray-800">:</label>
                            <div class="col-lg-6">
                                <span class="fw-semibold">{{ $produk->bahan_bakar }}</span>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold fs-6 text-gray-800">Tipe</label>
                            <label class="col-lg-1 fw-bold fs-6 text-gray-800">:</label>
                            <div class="col-lg-6">
                                <span class="fw-semibold">{{ $produk->tipe }}</span>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold fs-6 text-gray-800">Jumlah Muatan</label>
                            <label class="col-lg-1 fw-bold fs-6 text-gray-800">:</label>
                            <div class="col-lg-6">
                                <span class="fw-semibold">{{ $produk->jumlah_muatan }}</span>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold fs-6 text-gray-800">Masa Berlaku STNK</label>
                            <label class="col-lg-1 fw-bold fs-6 text-gray-800">:</label>
                            <div class="col-lg-6">
                                <span class="fw-semibold">{{ $produk->masa_berlaku_stnk }}</span>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold fs-6 text-gray-800">Jarak Tempuh</label>
                            <label class="col-lg-1 fw-bold fs-6 text-gray-800">:</label>
                            <div class="col-lg-6">
                                <span class="fw-semibold">{{ $produk->jarak_tempuh }} Km</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card card-flush h-md-100">
                <div class="card-header pt-5 mb-6">
                    <h3 class="card-title align-items-start flex-column">
                        <div class="d-flex align-items-center mb-2">
                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">Gambar Produk</span>
                        </div>
                        <span class="fs-6 fw-semibold text-gray-500">Informasi Fitur</span>
                    </h3>
                </div>
                <div class="card-body py-0 px-0">
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <div class="text-center" style="width: 100%;">
                            <div class="position-relative">
                                <img src="{{ Storage::url($produk->foto) }}" alt="image" class="img-fluid rounded" />
                            </div>
                        </div>
                    </div>
                    <div class="tab-content mt-n6">
                        <div class="tab-pane fade active show" id="kt_charts_widget_35_tab_content_1">
                            <div class="table-responsive mx-9 mt-n6">
                                <table class="table align-middle gs-0 gy-4">
                                    <tbody>
                                        @foreach ($fitur as $value)
                                            <tr>
                                                <td>
                                                    <div class="symbol symbol-30px symbol-circle me-3">
                                                        <span class="symbol-label bg-primary">
                                                            <i class="ki-outline ki-abstract-41 fs-5 text-white"></i>
                                                        </span>
                                                    </div>
                                                    <span class="text-gray-800 fw-bold fs-6">{{ $value->fitur }}
                                                        <span class="badge badge-light-success fs-base">
                                                            <i
                                                                class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>fitur</span>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
