@extends('layouts.main')

@section('content_header')
<h1>Longsor</h1>
@stop

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Longsor</h3>

            <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                    <button type="button" class="btn btn-block bg-gradient-primary" data-toggle="modal" data-target="#tambah-longsor-modal">Tambah</button>
                </ul>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Desa</th>
                        <th>Kecamatan</th>
                        <th>Jumlah Kejadian</th>
                        <th>Tahun</th>
                        <th style="width: 200px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $u = 1;
                    @endphp
                    @foreach($longsor as $r)
                    <tr>
                        <td>{{$u}}</td>
                        <td>{{ $r->desa }}</td>
                        <td>{{ $r->kecamatan }}</td>
                        <td>{{ $r->jumlah_kejadian }}</td>
                        <td>{{ $r->tahun }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-longsor-modal{{ $u }}">Edit</button>
                                <a href="{{ URL::to('longsor/hapus/'.$r->id) }}" class="btn btn-danger">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    @php $u++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>
<!-- /.card -->

<div class="modal fade" id="tambah-longsor-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Longsor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('longsor/tambah')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label>Desa</label>
                        <input type="text" class="form-control" placeholder="Masukkan Desa" name="desa">
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <input type="text" class="form-control" placeholder="Masukkan Kecamatan" name="kec">
                    </div>
                    <div class="form-group">
                        <label>Jumha Kejadian</label>
                        <input type="text" class="form-control" placeholder="Masukkan Jumha Kejadian" name="jumk">
                    </div>
                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="text" class="form-control" placeholder="Masukkan Tahun" name="thn">
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@php
$u = 1;
@endphp
@foreach($longsor as $r)
<div class="modal fade" id="edit-longsor-modal{{$u}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Longsor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('longsor/edit/'.$r->id)}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label>Desa</label>
                        <input type="text" class="form-control" placeholder="Masukkan Desa" name="desa" value="{{ $r->desa }}">
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <input type="text" class="form-control" placeholder="Masukkan Kecamatan" name="kec" value="{{ $r->kecamatan }}">
                    </div>
                    <div class="form-group">
                        <label>Jumha Kejadian</label>
                        <input type="text" class="form-control" placeholder="Masukkan Jumha Kejadian" name="jumk" value="{{ $r->jumlah_kejadian }}">
                    </div>
                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="text" class="form-control" placeholder="Masukkan Tahun" name="thn" value="{{ $r->tahun }}">
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@php $u++; @endphp
@endforeach

@endsection