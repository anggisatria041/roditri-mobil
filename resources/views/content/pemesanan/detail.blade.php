@extends('layouts.main')
@section('toolbar')
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center me-3 flex-wrap lh-1">
            <h1 class="d-flex align-items-center text-gray-900 fw-bold my-1 fs-3">Pemesanan</h1>
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="" class="text-muted text-hover-primary">List</a>
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
    <div class="row g-5">
        <div class="col-xl-7">
            <div class="card mb-5 mb-xl-12" id="kt_profile_details_view">
                <div class="card-header cursor-pointer">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Detail Pemesanan</h3>
                    </div>
                    <a href="{{ route('pemesanan.index') }}" class="btn btn-sm btn-primary align-self-center">Kembali</a>
                </div>
                <div class="card-body p-9">
                    <div class="row mb-7">
                        <label class="col-lg-6 fw-semibold text-muted">Nama</label>
                        <div class="col-lg-6">
                            <span class="fw-bold fs-6 text-gray-800">{{ $data->user->nama }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-6 fw-semibold text-muted">Produk</label>
                        <div class="col-lg-6 fv-row">
                            <span class="fw-semibold text-gray-800 fs-6">{{ $data->produk->nama }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-6 fw-semibold text-muted">Harga
                        </label>
                        <div class="col-lg-6 d-flex align-items-center">
                            <span class="fw-bold fs-6 text-gray-800 me-2">
                                {{ isset($data->produk->harga) ? 'Rp ' . number_format($data->produk->harga, 0, ',', '.') : 'Rp 0' }}
                            </span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-6 fw-semibold text-muted">Jenis Pembayaran</label>
                        <div class="col-lg-6">
                            @if ($data->jenis_pembayaran == 'Tunai')
                                <span class="badge badge-light-success">Tunai</span>
                            @else
                                <span class="badge badge-light-warning">Kredit</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-6 fw-semibold text-muted">Status Pembayaran
                        </label>
                        <div class="col-lg-6">
                            @if ($data->status_pembayaran == 'Pending')
                                <span class="badge badge-light-warning">Pending</span>
                            @elseif($data->status_pembayaran == 'Lunas')
                                <span class="badge badge-light-success">Lunas</span>
                            @else
                                <span class="badge badge-light-danger">Ditolak</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-6 fw-semibold text-muted">Status Pemesanan</label>
                        <div class="col-lg-6">
                            @if ($data->status_pemesanan == 'Proses')
                                <span class="badge badge-light-primary">Proses</span>
                            @elseif($data->status_pemesanan == 'Diterima')
                                <span class="badge badge-light-success">Diterima</span>
                            @elseif($data->status_pemesanan == 'Selesai')
                                <span class="badge badge-light-success">Selesai</span>
                            @else
                                <span class="badge badge-light-danger">Ditolak</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-10">
                        <label class="col-lg-6 fw-semibold text-muted">Tanggal</label>
                        <div class="col-lg-6">
                            <span class="fw-semibold fs-6 text-gray-800">{{ $data->tanggal }}</span>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <label class="col-lg-6 fw-semibold text-muted">KTP</label>
                        <div class="col-lg-6">
                            @if ($data->ktp)
                                <a href="{{ Storage::url($data->ktp) }}"
                                    class="fw-semibold fs-6 text-primary text-hover-primary" target="_blank">File</a>
                            @else
                                -
                            @endif
                        </div>
                    </div>
                    @if ($data->jenis_pembayaran == 'Tunai')
                        <div class="row mb-10">
                            <label class="col-lg-6 fw-semibold text-muted">Bukti Pembayaran</label>
                            <div class="col-lg-6">
                                @if ($data->bukti_pembayaran)
                                    <a href="{{ Storage::url($data->bukti_pembayaran) }}"
                                        class="fw-semibold fs-6 text-primary text-hover-primary" target="_blank">File</a>
                                @else
                                    -
                                @endif
                            </div>
                        </div>
                    @endif
                    @if ($data->jenis_pembayaran == 'kredit')
                        <div class="row mb-10">
                            <label class="col-lg-6 fw-semibold text-muted">Slip Gaji</label>
                            <div class="col-lg-6">
                                @if ($data->slip_gaji)
                                    <a href="{{ Storage::url($data->slip_gaji) }}"
                                        class="fw-semibold fs-6 text-primary text-hover-primary" target="_blank">File</a>
                                @else
                                    -
                                @endif
                            </div>
                        </div>
                        <div class="row mb-10">
                            <label class="col-lg-6 fw-semibold text-muted">Tenor</label>
                            <div class="col-lg-6">
                                <span class="fw-semibold fs-6 text-gray-800">{{ $data->tenor }} Bulan</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xl-5">
            <div class="card mb-5 mb-xl-12" id="kt_profile_details_view">
                <div class="card-header cursor-pointer">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Verifikasi Status</h3>
                    </div>
                </div>
                <div class="card-body p-9">
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-semibold text-muted">Status Pembayaran
                        </label>
                        <div class="col-lg-8">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Verifikasi
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item btn-verifikasi" data-id="{{ $data->id }}"
                                            data-status="Lunas" data-verifikasi="status_pembayaran"
                                            data-model="Pemesanan">Lunas</a></li>
                                    @if ($data->jenis_pembayaran == 'Tunai')
                                        <li><a class="dropdown-item btn-verifikasi" data-id="{{ $data->id }}"
                                                data-status="Ditolak" data-verifikasi="status_pembayaran"
                                                data-model="Pemesanan">Ditolak</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-semibold text-muted">Status Pemesanan</label>
                        <div class="col-lg-8">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Verifikasi
                                </button>
                                <ul class="dropdown-menu">
                                    @if ($data->jenis_pembayaran == 'kredit')
                                        <li><a class="dropdown-item btn-verifikasi" data-id="{{ $data->id }}"
                                                data-status="Diterima" data-verifikasi="status_pemesanan"
                                                data-model="Pemesanan">Diterima</a></li>
                                        <li><a class="dropdown-item btn-verifikasi" data-id="{{ $data->id }}"
                                                data-status="Ditolak" data-verifikasi="status_pemesanan"
                                                data-model="Pemesanan">Ditolak</a>
                                        </li>
                                    @else
                                        <li><a class="dropdown-item btn-verifikasi" data-id="{{ $data->id }}"
                                                data-status="Selesai" data-verifikasi="status_pemesanan"
                                                data-model="Pemesanan">Selesai</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($data->jenis_pembayaran == 'kredit' && $data->status_pemesanan == 'Diterima')
        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Detail Cicilan</span>
                    <span class="text-muted mt-1 fw-semibold fs-7">Tenor {{ $data->tenor }} Bulan</span>
                </h3>

            </div>
            <div class="card-body py-3">
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table table-striped gy-7 gs-7">
                            <thead>
                                <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                    <th>No</th>
                                    <th>Total Bayar</th>
                                    <th>Cicilan</th>
                                    <th>Tanggal Jatuh Tempo</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                    <th>Reminder</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cicilan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration + ($cicilan->currentPage() - 1) * $cicilan->perPage() }}
                                        </td>
                                        <td>
                                            {{ isset($item->total_bayar) ? 'Rp ' . number_format($item->total_bayar, 0, ',', '.') : 'Rp 0' }}
                                        </td>
                                        <td>
                                            {{ $item->cicilan }}
                                        </td>
                                        <td>
                                            {{ $item->tanggal_jatuh_tempo }}
                                        </td>
                                        <td>
                                            @if ($item->bukti_pembayaran)
                                                <a href="{{ Storage::url($item->bukti_pembayaran) }}"
                                                    class="fw-semibold fs-6 text-primary text-hover-primary"
                                                    target="_blank">File</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            {{ $item->tanggal_bayar ?? '-' }}
                                        </td>
                                        <td>
                                            @if ($item->status == 'pending')
                                                <span class="badge badge-light-warning">Pending</span>
                                            @elseif($item->status == 'Lunas')
                                                <span class="badge badge-light-success">Lunas</span>
                                            @else
                                                <span class="badge badge-light-danger">Ditolak</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-light dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Verifikasi
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item btn-verifikasi"
                                                            data-id="{{ $item->id }}" data-status="Lunas"
                                                            data-verifikasi="status"
                                                            data-model="PembayaranCicilan">Lunas</a></li>
                                                    <li><a class="dropdown-item btn-verifikasi"
                                                            data-id="{{ $item->id }}" data-status="Ditolak"
                                                            data-verifikasi="status"
                                                            data-model="PembayaranCicilan">Ditolak</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="https://mail.google.com/mail/?view=cm&to={{ $item->pemesanan->user->email }}&su={{ urlencode('Pengingat Pembayaran Cicilan') }}&body={{ urlencode(
                                                'Halo Pelanggan,Kami dari Roditri Mobil ingin mengingatkan Anda bahwa pembayaran cicilan ke ' .
                                                    $item->cicilan .
                                                    ' Anda jatuh tempo pada tanggal ' .
                                                    $item->tanggal_jatuh_tempo .
                                                    '.Kami sangat menghargai ketepatan waktu dalam pembayaran untuk menjaga kelancaran proses kredit Anda. Jika Anda telah melakukan pembayaran, mohon abaikan pesan ini. Untuk informasi lebih lanjut atau bantuan, silakan hubungi tim kami.Terima kasih atas perhatian dan kerja samanya.Salam hormat,Tim Roditri Mobil',
                                            ) }}"
                                                class="btn btn-primary btn-sm" target="_blank">
                                                Email
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-start">
                            {{ $cicilan->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Status Progres
            $(document).on('click', '.btn-verifikasi', function() {
                data = $(this).data()

                $.ajax({
                    type: "post",
                    url: "{{ url('verifikasi-status') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        Swal.fire({
                            text: "Data Berhasil Disimpan",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "OK",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function() {
                            location.reload();
                        });
                    }
                });
            });
        });
    </script>
@endsection
