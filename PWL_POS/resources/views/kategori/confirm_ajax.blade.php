@if($kategori)  <!-- Memeriksa apakah kategori ada -->
    <!-- Modal konfirmasi penghapusan kategori -->
    <form action="{{ url('/kategori/' . $kategori->kategori_id . '/delete_ajax') }}" method="POST" id="form-delete">
        @csrf
        @method('DELETE') <!-- Menambahkan method DELETE karena form HTML tidak mendukung DELETE langsung -->
        <div id="modal-master" class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <h5><i class="icon fas fa-ban"></i> Konfirmasi !!!</h5>
                        Apakah Anda ingin menghapus data seperti di bawah ini?
                    </div>
                    <table class="table table-sm table-bordered table-striped">
                        <tr>
                            <th class="text-right col-3">Kode Kategori :</th>
                            <td class="col-9">{{ $kategori->kategori_kode }}</td>
                        </tr>
                        <tr>
                            <th class="text-right col-3">Nama Kategori :</th>
                            <td class="col-9">{{ $kategori->kategori_nama }}</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                    <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                </div>
            </div>
        </div>
    </form>
@else  <!-- Jika kategori tidak ada, tampilkan pesan kesalahan -->
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                    Data yang Anda cari tidak ditemukan
                </div>
                <a href="{{ url('/kategori') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@endif

<script>
    $(document).ready(function () {
        // Validasi form sebelum dikirim
        $("#form-delete").validate({
            rules: {},
            submitHandler: function (form) {
                // Mengirim permintaan DELETE menggunakan AJAX
                $.ajax({
                    url: form.action,  // URL penghapusan
                    type: form.method,  // Menggunakan metode DELETE
                    data: $(form).serialize(),  // Mengirimkan data dari form
                    success: function (response) {
                        if (response.status) {
                            // Menyembunyikan modal jika berhasil
                            $('#myModal').modal('hide');
                            // Menampilkan pesan sukses menggunakan SweetAlert
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            });
                            // Reload data kategori
                            dataKategori.ajax.reload();
                        } else {
                            // Menampilkan pesan error jika terjadi kesalahan
                            $('.error-text').text('');
                            $.each(response.msgField, function (prefix, val) {
                                $('#error-' + prefix).text(val[0]);
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: response.message
                            });
                        }
                    }
                });
                return false;  // Mencegah pengiriman form secara default
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
