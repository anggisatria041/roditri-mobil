@extends('page.main')
@section('content')
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Detail Produk</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('home') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="{{ route('produk') }}">Produk<span class="lnr lnr-arrow-right"></span></a>
                    <a href="">Detail Produk</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_Product_carousel">
                    <div class="single-prd-item">
                        <img class="img-fluid" img src="{{ Storage::url($produk->foto1) }}" alt="">
                    </div>
                    <div class="single-prd-item">
                        <img class="img-fluid" img src="{{ Storage::url($produk->foto2) }}" alt="">
                    </div>
                    <div class="single-prd-item">
                        <img class="img-fluid" img src="{{ Storage::url($produk->foto3) }}" alt="">
                    </div>
                    <div class="single-prd-item">
                        <img class="img-fluid" img src="{{ Storage::url($produk->foto4) }}" alt="">
                    </div>
                    <div class="single-prd-item">
                        @if($produk->tour_id)
                        <iframe src="https://koala360.com/tour?id={{ $produk->tour_id }}&preview=true"
                            width="100%"
                            height="500"
                            frameborder="0"
                            allowfullscreen>
                        </iframe>
                        @else
                        <p>Tidak ada preview 360° untuk produk ini.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{ $produk->nama }} {{ $produk->tahun }}</h3>
                    <h2>{{ isset($produk->harga) ? 'Rp ' . number_format($produk->harga, 0, ',', '.') : 'Rp 0' }}</h2>
                    <ul class="list">
                        <li><span>Tahun</span> : {{ $produk->tahun }}</a></li>
                        <li><span>Warna</span> : {{ $produk->warna }}</a></li>
                    </ul>
                    <p>{{ $produk->deskripsi }}</p>

                    <div class="card_area d-flex align-items-center">
                        <a class="btn btn-success mr-3"
                            href="https://wa.me/6281383435007?text=Halo%20saya%20ingin%20bertanya%20tentang%20mobil"
                            target="_blank">WhatsApp</a>
                        <a class="btn btn-danger" href="#" onclick="add_cicilan()">Cicilan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                    aria-controls="profile" aria-selected="false">Spesifikasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                    aria-controls="review" aria-selected="false">Fitur</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h5>Kapasitas Mesin</h5>
                                </td>
                                <td>
                                    <h5>{{ $produk->kapasitas_mesin }} cc</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Bahan Bakar</h5>
                                </td>
                                <td>
                                    <h5>{{ $produk->bahan_bakar }}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Tipe</h5>
                                </td>
                                <td>
                                    <h5>{{ $produk->tipe }}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Jumlah Muatan</h5>
                                </td>
                                <td>
                                    <h5>{{ $produk->jumlah_muatan }} Orang</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Masa Berlaku STNK</h5>
                                </td>
                                <td>
                                    <h5>{{ $produk->masa_berlaku_stnk }}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Jarak Tempuh</h5>
                                </td>
                                <td>
                                    <h5>{{ $produk->jarak_tempuh }} Km</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row total_rate">
                            <div class="col-6">
                                <div class="box_total">
                                    <h4>{{ $produk->nama }} {{ $produk->tahun }}</h4>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="rating_list">
                                    <h3>Fitur</h3>
                                    <ul class="list">
                                        @foreach ($fitur as $item)
                                        <li><i class="fa fa-car"></i> {{ $item->fitur }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Cicilan -->
<div class="modal fade" id="cicilanModal" tabindex="-1" aria-labelledby="cicilanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cicilanModalLabel">Form Pengajuan Cicilan</h5>
            </div>
            <div class="modal-body">
                <form class="form" action="" method="POST" id="formCicilan" enctype="multipart/form-data">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id ?? '' }}">
                    <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                    <input type="hidden" name="jenis_pembayaran" value="kredit">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama"
                            value="{{ Auth::user()->nama ?? '' }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email"
                            value="{{ Auth::user()->email ?? '' }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="KTP" class="form-label">KTP</label>
                        <input type="file" class="form-control" name="ktp" required>
                    </div>
                    <div class="mb-3">
                        <label for="slip_gaji" class="form-label">Slip Gaji</label>
                        <input type="file" class="form-control" name="slip_gaji" required>
                    </div>
                    <div class="mb-3">
                        <label for="tenor" class="form-label">Tenor (bulan)</label>
                        <select class="form-select" name="tenor" required>
                            <option value="" disabled selected>Pilih tenor</option>
                            <option value="12">12 bulan
                                ({{ isset($cicilan->tenor_12) ? 'Rp ' . number_format($cicilan->tenor_12, 0, ',', '.') : 'Rp 0' }}
                                / Bln)</option>
                            <option value="24">24 bulan
                                ({{ isset($cicilan->tenor_24) ? 'Rp ' . number_format($cicilan->tenor_24, 0, ',', '.') : 'Rp 0' }}
                                / Bln)</option>
                            <option value="36">36 bulan
                                ({{ isset($cicilan->tenor_36) ? 'Rp ' . number_format($cicilan->tenor_36, 0, ',', '.') : 'Rp 0' }}
                                / Bln)</option>
                            <option value="48">48 bulan
                                ({{ isset($cicilan->tenor_48) ? 'Rp ' . number_format($cicilan->tenor_48, 0, ',', '.') : 'Rp 0' }}
                                / Bln)</option>
                            <option value="60">60 bulan
                                ({{ isset($cicilan->tenor_60) ? 'Rp ' . number_format($cicilan->tenor_60, 0, ',', '.') : 'Rp 0' }}
                                / Bln)</option>
                        </select>
                    </div>
                    <div class="mt-5">
                        <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Close</button>
                        <a href="#" onclick="save()" class="btn btn-danger ">
                            Ajukan
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
        $('#formCicilan')[0].reset();
    }

    function add_cicilan() {
        if (!@json(auth()->check())) {
            window.location.href = "{{ route('login') }}";
        } else {
            resetForm();
            $('#cicilanModal').modal('show');
        }
    }

    function save() {

        const formData = new FormData($('#formCicilan')[0]);
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        formData.append('_token', csrfToken);

        $.ajax({
            url: "{{ route('pemesanan.store') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(data) {
                if (data.status) {
                    $('#cicilanModal').modal('hide');
                    window.location.href = "{{ route('pesanan') }}";
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
</script>
@endsection