<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Posyandu</title>
    <style>

        .table1 {
            font-family: sans-serif;
            color: #444;
            border-collapse: collapse;
            width: 100%;
            border: 2px solid #000000;
        }

        .table1 tr th{
            background: #7f7f7f;
            color: #fff;
            font-weight: normal;
        }

        .table1, th, td {
            padding: 8px 20px;
            text-align: center;
        }

        .table1 tr:hover {
            background-color: #f5f5f5;
        }

        .table1 tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    @include('layouts.kop_surat')    
                <table class="table1" style="margin-left: auto; margin-right:; margin-top: 30px;" border="1">
                <thead>
            <tr>
                <th>RT</th>
                <th>RW</th>
                <th>kelurahan</th>
                <th>kecamatan</th>
                <th>Kabupaten Kota</th>
                <th>Provinsi</th>
                <th>Nama Posyandu</th>
                <th>Pengelola</th>
                <th>Sekretaris</th>
                <th>Jenis Posyandu</th>
                <th>Jumlah Kader</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php($i = 1);
            @foreach ($dataPosyandu as $a)
            <tr>
                <td>{{ $a->rt }}</td>
                <td>{{ $a->rw }}</td>
                <td>{{ $a->kelurahan }}</td>
                <td>{{ $a->kecamatan }}</td>
                <td>{{ $a->kabupaten_kota }}</td>
                <td>{{ $a->provinsi }}</td>
                <td>{{ $a->nama_posyandu }}</td>
                <td>{{ $a->pengelola }}</td>
                <td>{{ $a->sekretaris }}</td>
                <td>{{ $a->jenis_posyandu }}</td>
                <td>{{ $a->jumlah_kader }}</td>
                <td>{{ $a->keterangan }}</td>
            </tr>
            @php($i++);
            @endforeach
        </tbody>
    </table>
</body>
</html>
