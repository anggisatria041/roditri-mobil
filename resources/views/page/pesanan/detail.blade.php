@extends('page.main')
@section('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Detail Cicilan</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('home') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('pesanan') }}">Pesanan<span class="lnr lnr-arrow-right"></span></a>
                        <a href="">Detail Cicilan</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Total Bayar</th>
                                <th>Cicilan</th>
                                <th>Tanggal Jatuh Tempo</th>
                                <th>Bukti Pembayaran</th>
                                <th>Tanggal Bayar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cicilan as $item)
                                <tr>
                                    <td>
                                        <h5>{{ $loop->iteration + ($cicilan->currentPage() - 1) * $cicilan->perPage() }}
                                        </h5>
                                    </td>
                                    <td>
                                        <h5>{{ isset($item->total_bayar) ? 'Rp ' . number_format($item->total_bayar, 0, ',', '.') : 'Rp 0' }}
                                        </h5>
                                    </td>
                                    <td>
                                        <h5>{{ $item->cicilan }}</h5>
                                    </td>
                                    <td>
                                        <h5>{{ $item->tanggal_jatuh_tempo }}</h5>
                                    </td>
                                    <td>
                                        @if ($item->bukti_pembayaran)
                                            <h5><a href="{{ Storage::url($item->bukti_pembayaran) }}" class="text-primary"
                                                    target="_blank">File</a></h5>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <h5>{{ $item->tanggal_bayar ?? '-' }}</h5>
                                    </td>
                                    <td>
                                        @if ($item->status == 'pending')
                                            <h5 class="text-warning">Pending</h5>
                                        @elseif($item->status == 'Lunas')
                                            <h5 class="text-success">{{ $item->status }}</h5>
                                        @else
                                            <h5 class="text-danger">{{ $item->status }}</h5>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status != 'Lunas')
                                            <a class="btn btn-danger btn-sm" href="#"
                                                onclick="pembayaran('{{ $item->id }}')">Bayar</a>
                                        @endif
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
    </section>
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
                url: "{{ route('pemesanan.pembayaran_cicilan') }}",
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
