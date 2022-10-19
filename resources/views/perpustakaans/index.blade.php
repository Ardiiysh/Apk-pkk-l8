@extends('layouts.layout')
 @section('title','perpustakaan')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">

            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

<!-- Example split danger button -->
<div class="btn-group">
    <button type="button" class="btn btn-info">Unduh</button>
    <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-expanded="false">
      <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="/perpustakaan">Excel</a>
      <a class="dropdown-item" href="#">PDF</a>
      <a class="dropdown-item" href="#">Word</a>
    </div>
  </div>

        {{-- <a href="/perpustakaan" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a> --}}




            <!-- Button trigger modal -->
            <button type="button"  href="{{ route('perpustakaans.create') }}" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                +
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">perpustakaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="{{ route('perpustakaans.store') }}" method="POST">
                        @csrf
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>ID Dasawisma:</strong>
                                <input type="number" min="0" name="id_dasawisma" class="form-control" placeholder="id_dasawisma">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>RT:</strong>
                                <input type="number" min="0" name="rt" class="form-control" placeholder="rt">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>RW:</strong>
                                <input type="number" name="rw" class="form-control" placeholder="rw">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>kelurahan:</strong>
                                <input type="text" name="kelurahan" class="form-control" placeholder="kelurahan">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>kecamatan:</strong>
                                <input type="text" name="kecamatan" class="form-control" placeholder="kecamatan">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>kabupaten/kota:</strong>
                                <input type="text" name="kabupaten_kota" class="form-control" placeholder="kabupaten_kota">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>provinsi:</strong>
                                <input type="text" name="provinsi" class="form-control" placeholder="provinsi">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>nama_perpustakaan:</strong>
                                <input type="text" name="nama_perpustakaan" class="form-control" placeholder="nama_perpustakaan">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>pengelola:</strong>
                                <input type="text" name="pengelola" class="form-control" placeholder="pengelola">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Jumlah Buku:</strong>
                                <input type="number" min="0" name="jumlah_buku" class="form-control" placeholder="jumlah_buku">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Keterangan:</strong>
                                <input type="text" name="keterangan" class="form-control" placeholder="keterangan">
                            </div>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
   <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <br>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>ID Perpus</th>
                <th>id_dasawisma</th>
                <th>rt</th>
                <th>rw</th>
                <th>kelurahan</th>
                <th>kecamatan</th>
                <th>kabupaten_kota</th>
                <th>provinsi</th>
                <th>nama_perpustakaan</th>
                <th>pengelola</th>
                <th>jumlah_buku</th>
                <th>keterangan</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
    </table>

    @section('table')
        <script type="text/javascript">

             $(function () {

                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('perpustakaans.index') }}",
                    scrollX: 200,
                    deferRender: true,
                    scroller: true,
                    columns: [
                        {data: 'id_perpustakaan', name: 'id_perpustakaan'},
                        {data: 'id_dasawisma', name: 'id_dasawisma'},
                        {data: 'rt', name: 'rt'},
                        {data: 'rw', name: 'rw'},
                        {data: 'kelurahan', name: 'kelurahan'},
                        {data: 'kecamatan', name: 'kecamatan'},
                        {data: 'kabupaten_kota', name: 'kabupaten_kota'},
                        {data: 'provinsi', name: 'provinsi'},
                        {data: 'nama_perpustakaan', name: 'nama_perpustakaan'},
                        {data: 'pengelola', name: 'pengelola'},
                        {data: 'jumlah_buku', name: 'jumlah_buku'},
                        {data: 'keterangan', name: 'keterangan'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });

            });
        </script>
    @endsection

@endsection