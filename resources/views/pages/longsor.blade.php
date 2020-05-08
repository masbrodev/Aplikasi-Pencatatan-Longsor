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
@endsection