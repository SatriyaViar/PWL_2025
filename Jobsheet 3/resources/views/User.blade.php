<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data User</title>
    <style>
        .container {
            width: 200px;
            padding: 10px;
            border: 1px solid black;
            text-align: center;
            margin: 50px auto;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.3); /* Efek bayangan */
            border-radius: 5px; /* Sudut sedikit membulat */
            background-color: white;
        }
        h2 {
            margin: 0;
            padding-bottom: 10px;
            font-size: 20px;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 5px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Data User</h2>
    <table>
        <tr>
            <th>Jumlah Pengguna</th>
        </tr>
        <tr>
            <td>{{ $data }}</td>
        </tr>
    </table>
</div>

</body>
</html>
