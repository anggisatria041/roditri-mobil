@extends('layouts.main')
@section('toolbar')
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center me-3 flex-wrap lh-1">
            <h1 class="d-flex align-items-center text-gray-900 fw-bold my-1 fs-3">Tunggakan Kredit</h1>
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="" class="text-muted text-hover-primary">Tunggakan</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-gray-900">List</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Manage Tunggakan Kredit</span>
            </h3>
        </div>
        <div class="card-body py-3">
            <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table table-striped gy-7 gs-7">
                        <thead>
                            <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Produk</th>
                                <th>Total Bayar</th>
                                <th>Cicilan</th>
                                <th>Jatuh Tempo</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data->isEmpty())
                                <tr>
                                    <td colspan="13" class="text-center text-muted">No record found</td>
                                </tr>
                            @else
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration + ($data->currentPage() - 1) * $data->perPage() }}</td>
                                        <td>{{ $item->pemesanan->user->nama }}</td>
                                        <td>{{ $item->pemesanan->produk->nama }}</td>
                                        <td> {{ isset($item->total_bayar) ? 'Rp ' . number_format($item->total_bayar, 0, ',', '.') : 'Rp 0' }}
                                        </td>
                                        <td>Cicilan {{ $item->cicilan }}</td>
                                        <td>{{ $item->tanggal_jatuh_tempo }}</td>
                                        <td>
                                        @if($item->pemesanan->status_pemesanan == 'Ditarik')
                                            <span class="badge badge-light-danger">Ditarik</span>
                                        @else
                                            <span class="badge badge-light-danger">Jatuh Tempo</span>
                                @endif
                                </td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-start">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
