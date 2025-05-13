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
                <li class="breadcrumb-item text-gray-900">List</li>
            </ul>
        </div>
        <div class="d-flex align-items-center py-1">
            <a href="#" class="btn btn-sm btn-primary" onclick="add_ajax()"
                data-bs-target="#kt_modal_create_app">Tambah</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Manage Data Produk</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table table-striped gy-7 gs-7">
                        <thead>
                            <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tahun</th>
                                <th>Harga</th>
                                <th>Warna</th>
                                <th>Kapasitas Mesin</th>
                                <th>Bahan Bakar</th>
                                <th>Tipe</th>
                                <th>Aksi</th>
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
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->tahun }}</td>
                                        <td>
                                            {{ isset($item->harga) ? 'Rp ' . number_format($item->harga, 0, ',', '.') : 'Rp 0' }}
                                        </td>
                                        <td>{{ $item->warna }}
                                            <span class="bullet bullet-dot me-2 h-10px w-10px"
                                                style="background-color:
                                                {{ $item->warna == 'Merah'
                                                    ? '#eb3b5a'
                                                    : ($item->warna == 'Hitam'
                                                        ? '#2f3542'
                                                        : ($item->warna == 'Putih'
                                                            ? '#ffffff'
                                                            : ($item->warna == 'Biru'
                                                                ? '#1e90ff'
                                                                : '#ccc'))) }}">
                                            </span>
                                        </td>
                                        <td>{{ $item->kapasitas_mesin }}</td>
                                        <td>{{ $item->bahan_bakar }}</td>
                                        <td>{{ $item->tipe }}</td>
                                        <td>
                                            <a href="{{ url('produk/show/' . Crypt::encryptString($item->id)) }}"
                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <i class="ki-outline ki-information fs-2 text-primary"></i>
                                            </a>
                                            <a href="javascript:void(0)" onclick="edit('{{ $item->id }}')"
                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <i class="ki-outline ki-pencil fs-2 text-info"></i>
                                            </a>
                                            <a href="javascript:void(0)" onclick="hapus('{{ $item->id }}')"
                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                <i class="ki-outline ki-trash fs-2 text-danger"></i>
                                            </a>
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
    <div class="modal fade" id="m_modal_6" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content rounded">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <form class="form" action="" method="POST" id="formAdd" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="">
                        <div class="mb-13 text-center">
                            <h1 class="mb-3" id="m_modal_6_title">Title Form</h1>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Nama</span>
                            </label>
                            <input type="text" class="form-control bg-transparent" placeholder="Masukkan Nama"
                                name="nama" />
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Tahun</span>
                            </label>
                            <select class="form-select bg-transparent" data-control="select2" data-hide-search="true"
                                name="tahun">
                                <option value="">Pilih Tahun</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year }}">{{ $year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Harga Cash</span>
                            </label>
                            <input type="text" class="form-control bg-transparent" placeholder="Rp" name="harga"
                                oninput="formatRupiah(this)" />
                        </div>
                        <div class="d-flex flex-stack mb-4">
                            <div class="me-5 fw-semibold">
                                <label class="fs-6">Detail Cicilan</label>
                                <div class="fs-7 text-muted">Tambahkan harga cicilan untuk masing-masing tenor</div>
                            </div>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Uang Muka (DP)</label>
                                <input type="text" class="form-control bg-transparent" placeholder="Rp" name="dp"
                                    oninput="formatRupiah(this)" />
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Tenor 12 Bulan</label>
                                <input type="text" class="form-control bg-transparent" placeholder="Rp"
                                    name="tenor_12" oninput="formatRupiah(this)" />
                            </div>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Tenor 24 Bulan</label>
                                <input type="text" class="form-control bg-transparent" placeholder="Rp"
                                    name="tenor_24" oninput="formatRupiah(this)" />
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Tenor 36 Bulan</label>
                                <input type="text" class="form-control bg-transparent" placeholder="Rp"
                                    name="tenor_36" oninput="formatRupiah(this)" />
                            </div>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Tenor 48 Bulan</label>
                                <input type="text" class="form-control bg-transparent" placeholder="Rp"
                                    name="tenor_48" oninput="formatRupiah(this)" />
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Tenor 60 Bulan</label>
                                <input type="text" class="form-control bg-transparent" placeholder="Rp"
                                    name="tenor_60" oninput="formatRupiah(this)" />
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Warna</span>
                            </label>
                            <div class="form-check form-check-custom form-check-solid mb-2">
                                <input class="form-check-input" type="radio" value="Hitam" name="warna" />
                                <label class="form-check-label">
                                    Hitam
                                </label>
                            </div>
                            <div class="form-check form-check-custom form-check-solid mb-2">
                                <input class="form-check-input" type="radio" value="Putih" name="warna" />
                                <label class="form-check-label">
                                    Putih
                                </label>
                            </div>
                            <div class="form-check form-check-custom form-check-solid mb-2">
                                <input class="form-check-input" type="radio" value="Biru" name="warna" />
                                <label class="form-check-label">
                                    Biru
                                </label>
                            </div>
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="radio" value="Merah" name="warna" />
                                <label class="form-check-label">
                                    Merah
                                </label>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Kapasitas Mesin</span>
                            </label>
                            <input type="number" class="form-control bg-transparent" placeholder="cc"
                                name="kapasitas_mesin" />
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Bahan Bakar</span>
                            </label>
                            <select class="form-select bg-transparent" data-control="select2" data-hide-search="true"
                                name="bahan_bakar">
                                <option value="">Pilih Bahan Bakar</option>
                                <option value="Bensin">Bensin</option>
                                <option value="Diesel">Diesel</option>
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Tipe</span>
                            </label>
                            <input type="text" class="form-control bg-transparent" placeholder="Masukkan Tipe"
                                name="tipe" />
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Jumlah Muatan</span>
                            </label>
                            <input type="number" class="form-control bg-transparent" placeholder="Masukkan Jumlah"
                                name="jumlah_muatan" />
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Masa Berlaku STNK</span>
                            </label>
                            <input type="month" class="form-control bg-transparent" placeholder="Masa Berlaku STNK"
                                name="masa_berlaku_stnk" />
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Jarak Tempuh</span>
                            </label>
                            <input type="number" class="form-control bg-transparent" placeholder="KM"
                                name="jarak_tempuh" />
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Deskripsi</span>
                            </label>
                            <textarea name="deskripsi" placeholder="Deskripsi" autocomplete="off" class="form-control bg-transparent"></textarea>
                        </div>
                        <div class="fv-row">
                            <label class="required">Fitur</label>
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <tbody class="text-gray-600 fw-semibold">
                                        @foreach ($fitur as $value)
                                            <tr>
                                                <td>
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="{{ $value->id }}" name="fitur_id[]" />
                                                        <span class="form-check-label">{{ $value->fitur }}</span>
                                                    </label>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Foto</span>
                            </label>
                            <input type="file" class="form-control bg-transparent" name="foto" />
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Close</button>
                            <a href="#" onclick="save()" class="btn btn-primary ">
                                Simpan
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        function resetForm() {
            $('#m_form_1_msg').hide();
            $('#formAdd')[0].reset();
        }

        function add_ajax() {
            method = 'add';
            resetForm();
            $('#m_modal_6_title').html("Tambah Produk");
            $('#m_form_1_msg').hide();
            $('#m_modal_6').modal('show');
        }

        function save() {
            let url;

            if (method === 'add') {
                url = "{{ route('produk.store') }}";
            } else {
                url = "{{ route('produk.update') }}";
            }

            const formData = new FormData($('#formAdd')[0]);
            const csrfToken = $('meta[name="csrf-token"]').attr('content');
            formData.append('_token', csrfToken);

            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(data) {
                    if (data.status) {
                        $('#m_modal_6').modal('hide');
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
                    } else {
                        Swal.fire({
                            text: data.message,
                            icon: 'warning'
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal("Oops", "Data gagal disimpan!", "error");
                }
            });
        }

        function edit(id) {
            method = 'edit';
            resetForm();
            $('#m_modal_6_title').html("Edit Produk");

            $.ajax({
                url: "{{ url('produk/edit') }}/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    if (data.data) {
                        $('#formAdd')[0].reset();
                        $('[name="id"]').val(data.data.id);
                        $('[name="nama"]').val(data.data.nama);
                        $('[name="tahun"]').val(data.data.tahun).change();
                        $('[name="harga"]').val(formatRupiahValue(data.data.harga));
                        $('[name="dp"]').val(formatRupiahValue(data.cicilan.dp));
                        $('[name="tenor_12"]').val(formatRupiahValue(data.cicilan.tenor_12));
                        $('[name="tenor_24"]').val(formatRupiahValue(data.cicilan.tenor_24));
                        $('[name="tenor_36"]').val(formatRupiahValue(data.cicilan.tenor_36));
                        $('[name="tenor_48"]').val(formatRupiahValue(data.cicilan.tenor_48));
                        $('[name="tenor_60"]').val(formatRupiahValue(data.cicilan.tenor_60));
                        $('[name="kapasitas_mesin"]').val(data.data.kapasitas_mesin);
                        $('[name="bahan_bakar"]').val(data.data.bahan_bakar).change();
                        $('[name="tipe"]').val(data.data.tipe);
                        $('[name="jumlah_muatan"]').val(data.data.jumlah_muatan);
                        $('[name="masa_berlaku_stnk"]').val(data.data.masa_berlaku_stnk);
                        $('[name="jarak_tempuh"]').val(data.data.jarak_tempuh);
                        $('[name="deskripsi"]').val(data.data.deskripsi);
                        $('[name="warna"]').each(function() {
                            if ($(this).val() === data.data.warna) {
                                $(this).prop('checked', true);
                            }
                        });
                        $('[name="fitur_id[]"]').each(function() {
                            if (data.fiturProduk.includes(parseInt($(this).val()))) {
                                $(this).prop('checked', true);
                            } else {
                                $(this).prop('checked', false);
                            }
                        });
                        $('#m_modal_6').modal('show');
                    } else {
                        Swal.fire("Oops", "Gagal mengambil data!", "error");
                    }
                    mApp.unblockPage();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    mApp.unblockPage();
                    Swal.fire("Error", "Gagal mengambil data dari server!", "error");
                }
            });
        }

        function hapus(id) {
            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Anda yakin ingin hapus data ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "<span><i class='flaticon-interface-1'></i><span>Ya, Hapus!</span></span>",
                confirmButtonClass: "btn btn-danger m-btn m-btn--pill m-btn--icon",
                cancelButtonText: "<span><i class='flaticon-close'></i><span>Batal Hapus</span></span>",
                cancelButtonClass: "btn btn-metal m-btn m-btn--pill m-btn--icon",
                customClass: {
                    confirmButton: 'btn btn-danger m-btn m-btn--pill m-btn--icon',
                    cancelButton: 'btn btn-metal m-btn m-btn--pill m-btn--icon'
                }
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('produk') }}/" + id,
                        type: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: "JSON",
                        success: function(data) {
                            if (data.status === true) {
                                Swal.fire({
                                    text: "Data Berhasil Dihapus",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "OK",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(function() {
                                    location.reload();
                                });
                            } else {
                                Swal.fire("Oops", "Data gagal dihapus!", "error");
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            Swal.fire("Oops", "Data gagal dihapus!", "error");
                        }
                    });
                }
            });
        }

        function formatRupiah(element) {
            let value = element.value;
            value = value.replace(/[^0-9]/g, '');
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            element.value = value ? value : '';
        }

        function formatRupiahValue(value) {
            value = value.toString();
            value = value.replace(/[^0-9]/g, '');
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            return value;
        }
    </script>
@endsection
