<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form ubah Data User</title>
</head>
<body>
    <form action="{{ route('/user/ubah_simpan',$data->user_id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <label for="">Username</label>
        <input type="text" name="username" value="{{ $data->username }}">
        <br>

        <label for="">Nama</label>
        <input type="text" name="nama" value="{{ $data->nama }}">
        <br>

        <label for="">Level ID</label>
        <input type="number" name="level_id" value="{{ $data->level_id }}">
        <br>

        <input type="submit" value="Ubah" name="btn btn-success">
    </form>
    
</body>
</html>