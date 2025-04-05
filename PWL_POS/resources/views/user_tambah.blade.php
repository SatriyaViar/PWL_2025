<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Tambah Data</title>
</head>
<body>
    <h1>Form Tambah Data</h1>
    <a href="{{ route('/user') }}">Kembali</a>
    <form action="{{ route('/user/tambah_simpan') }}" method="post">
        {{ csrf_field() }}
        <label>Username</label>
        <input type="text" name="username" placeholder="Masukkan Username">
        <br>
        <label>Nama</label>
        <input type="text" name="nama" placeholder="Masukan Nama">
        <br>
        <label>Password</label>
        <input type="password" name="password" placeholder="Masukkan Password">
        <br>
        <label>Level ID</label>
        <input type="number" name="level_id">
        <br>
        <input type="submit" name="btn btn-success" value="Simpan">
    </form>
</body>
</html>