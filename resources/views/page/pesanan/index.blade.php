@extends('page.main')
@section('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Histori Pesanan</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('home') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('pesanan') }}">Pesanan</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    @if (Auth::check())
        @if ($pemesanan)
            <section class="cart_area">
                <div class="container col-lg-10">
                    <div class="cart_inner">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Jenis Pembayaran</th>
                                        <th scope="col">Bukti Pembayaran</th>
                                        <th scope="col">Status Pembayaran</th>
                                        <th scope="col">Status Pemesanan</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pemesanan as $item)
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <img src="{{ Storage::url($item->produk->foto) }}" alt=""
                                                            width="150px" height="100px">
                                                    </div>
                                                    <div class="media-body">
                                                        <p>{{ $item->produk->nama }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5> {{ isset($item->produk->harga) ? 'Rp ' . number_format($item->produk->harga, 0, ',', '.') : 'Rp 0' }}
                                                </h5>
                                            </td>
                                            <td>
                                                @if ($item->jenis_pembayaran == 'Tunai')
                                                    <h5 class="text-info">Tunai</h5>
                                                @else
                                                    <h5 class="text-warning">Kredit</h5>
                                                @endif
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
                                                @if ($item->jenis_pembayaran == 'kredit' && $item->status_pembayaran != 'Lunas')
                                                    <h5>Cicilan</h5>
                                                @else
                                                    @if ($item->status_pembayaran == 'Pending')
                                                        <h5 class="text-warning">{{ $item->status_pembayaran }}</h5>
                                                    @elseif($item->status_pembayaran == 'Lunas')
                                                        <h5 class="text-success">{{ $item->status_pembayaran }}</h5>
                                                    @else
                                                        <h5 class="text-danger">{{ $item->status_pembayaran }}</h5>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->status_pemesanan == 'Proses')
                                                    <h5 class="text-info">{{ $item->status_pemesanan }}</h5>
                                                @elseif($item->status_pemesanan == 'Diterima')
                                                    <h5 class="text-success">{{ $item->status_pemesanan }}</h5>
                                                @elseif($item->status_pemesanan == 'Selesai')
                                                    <h5 class="text-success">{{ $item->status_pemesanan }}</h5><br>
                                                    Download Bukti Kwitansi:
                                                    <a href="{{ url('pemesanan/kwitansi') . '/' . Crypt::encryptString($item->id) }}"
                                                        class="btn btn-primary btn-sm" title="Download Kwitansi">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                @else
                                                    <h5 class="text-danger">{{ $item->status_pemesanan }}</h5>
                                                @endif
                                            </td>
                                            <td>
                                                <h5>{{ $item->tanggal }}</h5>
                                            </td>
                                            <td>
                                                @if ($item->jenis_pembayaran == 'Tunai' && $item->status_pemesanan != 'Selesai')
                                                    <a class="btn btn-danger btn-sm" href="#"
                                                        onclick="pembayaran('{{ $item->id }}')">Bayar</a>
                                                @endif
                                                @if (
                                                    $item->jenis_pembayaran == 'kredit' &&
                                                        ($item->status_pemesanan == 'Diterima' || $item->status_pemesanan == 'Selesai'))
                                                    <a class="btn btn-danger btn-sm"
                                                        href="{{ url('roditri-mobil/detail_cicilan/' . Crypt::encryptString($item->id)) }}">Detail</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section class="features-area section_gap">
                <div class="container">
                    <div class="row features-inner">
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div class="single-features">
                                <h6>Maaf, saat ini anda belum ada melakukan transaksi pembelian produk kami</h6>
                                <p>Silahkan lakukan pemesan!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @else
        <section class="features-area section_gap">
            <div class="container">
                <div class="row features-inner">
                    <div class="col-lg-12 col-md-6 col-sm-6">
                        <div class="single-features">
                            <h6>Silahkan <a href="{{ route('login') }}" style="text-decoration: none; color: red;"> login </a>terlebih dahulu untuk melihat riwayat pesanan anda</h6>
                            <p>Terima Kasih!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <div class="modal fade" id="bayarModal" tabindex="-1" aria-labelledby="bayarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bayarModalLabel">Upload Pembayaran</h5>
                </div>
                <div class="modal-body">
                    <form class="form" action="" method="POST" id="formPembayaran" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="">
                        <div class="mb-3">
                            <label for="bukti_tf" class="form-label">Bukti Pembayaran</label>
                            <input type="file" class="form-control" name="bukti_pembayaran" required>
                        </div>
                        <div class="mt-5">
                            <button type="button" class="btn btn-light me-3 btn-sm" data-bs-dismiss="modal">Close</button>
                            <a href="#" onclick="save()" class="btn btn-danger btn-sm">
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
            $('#formPembayaran')[0].reset();
        }

        function pembayaran(id) {
            resetForm();
            $('[name="id"]').val(id);
            $('#bayarModal').modal('show');
        }

        function save() {

            const formData = new FormData($('#formPembayaran')[0]);
            const csrfToken = $('meta[name="csrf-token"]').attr('content');
            formData.append('_token', csrfToken);

            $.ajax({
                url: "{{ route('pemesanan.bukti_pembayaran') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(data) {
                    if (data.status) {
                        $('#bayarModal').modal('hide');
                        location.reload();
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
