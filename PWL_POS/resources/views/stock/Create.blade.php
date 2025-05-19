@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
        </div>
        <div class="card-body">
            <!-- Menampilkan pesan sukses atau error -->
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- Form untuk menambahkan stok baru -->
            <form action="{{ url('stock') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="user_id">Nama User</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        <option value="">-- Pilih Nama User --</option>
                        @foreach ($user as $u)
                            <option value="{{ $u->id }}">{{ $u->nama }}</option> <!-- Ambil nama user -->
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="barang_id">Barang</label>
                    <select name="barang_id" id="barang_id" class="form-control" required>
                        <option value="">-- Pilih Barang --</option>
                        @foreach ($barang as $b)
                            <option value="{{ $b->barang_id }}">{{ $b->barang_nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="stok_jumlah">Jumlah Stok</label>
                    <input type="number" name="stok_jumlah" id="stok_jumlah" class="form-control" min="1" required>
                </div>
                <div class="form-group">
                    <label for="stok_tanggal">Tanggal Stok</label>
                    <input type="date" name="stok_tanggal" id="stok_tanggal" class="form-control" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Tambah Stok</button>
                </div>
            </form>
        </div>
    </div>
@endsection
