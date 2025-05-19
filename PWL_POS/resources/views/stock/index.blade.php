@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('stock/create') }}">Tambah Stock</a>
                <button onclick="modalAction('{{ url('stock/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah Stock Ajax</button>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="row">
                <div class="col-md-4">
                    <label for="barang_id">Filter Barang</label>
                    <select class="form-control" id="barang_id" name="barang_id">
                        <option value="">- Semua -</option>
                        @foreach ($barang as $b)
                            <option value="{{ $b->barang_id }}">{{ $b->barang_nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <table class="table table-bordered table-striped table-hover table-sm mt-3" id="table_stock">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Stock</th>
                        <th>Tanggal Stock</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" data-width="75%" aria-hidden="true"></div>
@endsection

@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function () {
                $('#myModal').modal('show');
            });
        }

        var datastock;
        $(document).ready(function () {
            datastock = $('#table_stock').DataTable({
                serverSide: true,
                ajax: {
                    url: "{{ url('stock/list') }}",
                    type: "POST",
                    data: function (d) {
                        d.barang_id = $('#barang_id').val();
                    }
                },
                columns: [
                    {
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },{
                        data: "user.nama",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "barang.barang_nama",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "stok_jumlah",
                        orderable: true,
                        searchable: false
                    },
                    {
                        data: "stok_tanggal",
                        orderable: true,
                        searchable: false
                    },
                    {
                        data: "action",
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $('#barang_id').on('change', function () {
                datastock.ajax.reload();
            });
        });
    </script>
@endpush
