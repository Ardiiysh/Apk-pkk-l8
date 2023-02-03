<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kejar</title>
    <style>

        .table1 {
            font-family: sans-serif;
            color: #444;
            border-collapse: collapse;
            width: 50%;
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
    


    <table class="table1" style="margin-left: auto; margin-right:auto; margin-top: 30px;" border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>id data kejar</th>
                <th>id data kelompok belajar</th>
                <th>id kelompok belajar</th>
                <th>jumlah siswa laki laki</th>
                <th>jumlah siswa perempuan</th>
                <th>jumlah pengajar laki laki</th>
                <th>jumlah pengajar perempuan</th>
            </tr>
        </thead>
        <tbody>
            @php($i = 1);
            @foreach ($dataKejar as $b)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$b->id_data_kejar}}</td>
                    <td>{{$b->id_data_kelompok_belajar}}</td>
                    <td>{{$b->id_kelompok_belajar}}</td>
                    <td>{{$b->jumlah_siswa_laki_laki}}</td>
                    <td>{{$b->jumlah_siswa_perempuan}}</td>
                    <td>{{$b->jumlah_pengajar_laki_laki}}</td>
                    <td>{{$b->jumlah_pengajar_perempuan}}</td>
                </tr>
                @php($i++);
            @endforeach
        </tbody>
    </table>
    {{-- <script>
        window.print();
    </script> --}}
</body>
</html>
