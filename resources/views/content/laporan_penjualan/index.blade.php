@extends('layouts.main')
@section('toolbar')
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center me-3 flex-wrap lh-1">
            <h1 class="d-flex align-items-center text-gray-900 fw-bold my-1 fs-3">Laporan Penjualan</h1>
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="" class="text-muted text-hover-primary">Laporan Penjualan</a>
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
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_deactivate" aria-expanded="true" aria-controls="kt_account_deactivate">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Laporan Penjualan</h3>
            </div>
        </div>
        <div id="kt_account_settings_deactivate" class="collapse show">
            <div class="card-body border-top p-9">
                <div class="form-check form-check-solid fv-row">
                    <div id="kt_signin_email_edit" class="flex-row-fluid">
                        <form class="form" action="" method="POST" id="formAdd" enctype="multipart/form-data">
                            <div class="row mb-6">
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <div class="fv-row mb-0">
                                        <label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Produk</label>
                                        <select class="form-control form-control-lg form-control-solid"
                                            data-control="select2" data-hide-search="true" name="produk_id">
                                            <option value="">Pilih Produk</option>
                                            @foreach ($produk as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="fv-row mb-0">
                                        <label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Bulan</label>
                                        <input type="month" class="form-control form-control-lg form-control-solid"
                                            name="bulan" />
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <a href="#" onclick="initDatatable()" class="btn btn-primary ">
                                    Search
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-5 mb-xl-8 d-none" id="cardLaporanPenjualan">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Data Penjualan</span>
            </h3>
        </div>
        <div class="card-body py-3">
            <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table table-striped gy-7 gs-7" id="dtLaporanPenjualan">
                        <thead>
                            <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Bulan</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        function initDatatable() {
            $('#cardLaporanPenjualan').removeClass('d-none');
            let produk = $('select[name="produk_id"]').val();
            let bulanInput = $('input[name="bulan"]').val(); // format: yyyy-mm
            let tahun = '';
            let bulan = '';

            if (bulanInput) {
                [tahun, bulan] = bulanInput.split('-'); // Pisahkan jadi [yyyy, mm]
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#dtLaporanPenjualan').DataTable({
                responsive: true,
                paging: true,
                bDestroy: true,
                searching: true,
                ordering: false,
                lengthChange: true,
                autoWidth: false,
                aaSorting: [],
                serverSide: true,
                processing: true,
                language: {
                    lengthMenu: "Show _MENU_"
                },
                dom: "<'row mb-2'" +
                    "<'col-sm-6 d-flex align-items-center justify-content-start dt-toolbar'l>" +
                    "<'col-sm-6 d-flex align-items-center justify-content-end dt-toolbar'f>" +
                    ">" +
                    "<'table-responsive'tr>" +
                    "<'row'" +
                    "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                    "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                    ">",
                ajax: {
                    type: 'POST',
                    url: "{{ route('laporan_penjualan-list') }}",
                    data: function(d) {
                        d.produk_id = produk;
                        d.bulan = bulan;
                        d.tahun = tahun;
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        className: 'text-center',
                        width: '20px'
                    },
                    {
                        data: 'produk',
                        name: 'produk'
                    },
                    {
                        data: 'jumlah',
                        name: 'jumlah'
                    },
                    {
                        data: 'bulan',
                        name: 'bulan'
                    }
                ]
            });
        }
    </script>
@endsection
