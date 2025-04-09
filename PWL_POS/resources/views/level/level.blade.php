<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Level User</title>
</head>
<body>
    <h1>Data level user</h1>
    <a href="{{ route('/level/tambah') }}">Tambah level</a>
    <table border="1" cellpading="2" cellspancing="0">
        <tr>
            <th>Level ID</th>
            <th>Kode Level</th>
            <th>Nama Level</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{ $d->level_id}}</td>
            <td>{{ $d->level_kode }}</td>
            <td>{{ $d->level_nama }}</td>
            <td><a href={{ route('/level/ubah',$d->level_) }}>Ubah</a> | <a href={{ route('/level/hapus',$d->user_id) }}>hapus</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>