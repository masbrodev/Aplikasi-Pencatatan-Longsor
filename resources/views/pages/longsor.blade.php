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
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
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
                        <td>{{ $r->kecamatan }}</td>
                        <td>{{ $r->desa }}</td>
                        <td>{{ $r->jumlah_kejadian }}</td>
                        <td>{{ $r->tahun }}</td>
                        <td>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#lihat-longsor-modal{{ $u }}">Lihat</button>
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
                        <label for="my-input">Kecamatan</label>
                        <select name="kec" class="form-control kecamatan" id="kecamatan">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kelurahan</label>
                        <select name="desa" class="form-control kelurahan" id="kelurahan">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Kejadian</label>
                        <input type="text" class="form-control" placeholder="Masukkan Jumlah Kejadian" name="jumk">
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
                        <label for="my-input">Kecamatan</label>
                        <select name="kec" class="form-control kecamatanEdit" id="kecamatanEdit">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kelurahan</label>
                        <select name="desa" class="form-control kelurahanEdit" id="kelurahanEdit">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Kejadian</label>
                        <input type="text" class="form-control" placeholder="Masukkan Jumlah Kejadian" name="jumk" value="{{ $r->jumlah_kejadian }}">
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

@php
$u = 1;
@endphp
@foreach($longsor as $r)
<div class="modal fade" id="lihat-longsor-modal{{$u}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Data Longsor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('longsor/edit/'.$r->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="my-input">Kecamatan</label>
                        <select class="form-control" disabled="disabled">
                            <option>{{ $r->kecamatan}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kelurahan</label>
                        <select class="form-control" disabled="disabled">
                            <option>{{ $r->desa}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Kejadian</label>
                        <input type="text" class="form-control" value="{{ $r->jumlah_kejadian }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="text" class="form-control" value="{{ $r->tahun }}" disabled>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-dismiss="modal" data-toggle="modal" data-target="#edit-longsor-modal{{ $u }}">Edit</button>
                            <a href="{{ URL::to('longsor/hapus/'.$r->id) }}" class="btn btn-danger">Hapus</a>
                        </div>

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

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script>
    api_provinsi();

    function api_provinsi() {
        var tag = '';
        // var id = [];
        $.ajax({
            type: "GET",
            url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=3513",
            dataType: "JSON",
            success: function(data) {
                for (var index = 0; index < data['kecamatan'].length; index++) {
                    tag += '<option value="' + data['kecamatan'][index].nama + '" myTag= "' + data['kecamatan'][index].id + '">' + data['kecamatan'][index].nama + '</option>';
                    // id += [data['kecamatan'][index].id];

                    // console.log(id);

                }
                $('.kecamatan').html(tag);
            }
        });
        $('.kecamatan').click(function() {
            var tag = '';
            id = $('#kecamatan option:selected').attr("myTag");
            // id = $('#kecamatan').val();

            // console.log(n);

            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=" + id,
                dataType: "JSON",
                success: function(data) {
                    for (var index = 0; index < data['kelurahan'].length; index++) {
                        tag += '<option value="' + data['kelurahan'][index].nama + '">' + data['kelurahan'][index].nama + '</option>';
                        // id += [data['data'][index].id];

                    }
                    $('.kelurahan').html(tag);

                }
            });
        })
    }

    api_provinsiEdit();

    function api_provinsiEdit() {
        var tag = '';
        // var id = [];
        $.ajax({
            type: "GET",
            url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=3513",
            dataType: "JSON",
            success: function(data) {
                for (var index = 0; index < data['kecamatan'].length; index++) {
                    tag += '<option value="' + data['kecamatan'][index].nama + '" myTagE= "' + data['kecamatan'][index].id + '">' + data['kecamatan'][index].nama + '</option>';
                    // id += [data['kecamatan'][index].id];

                    // console.log(id);

                }
                $('.kecamatanEdit').html(tag);
            }
        });
        $('.kecamatanEdit').click(function() {
            var tag = '';
            id = $('#kecamatanEdit option:selected').attr("myTagE");
            // bug = $('#kecamatanEdit').val();

            // console.log(bug);

            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=" + id,
                dataType: "JSON",
                success: function(data) {
                    for (var index = 0; index < data['kelurahan'].length; index++) {
                        tag += '<option value="' + data['kelurahan'][index].nama + '">' + data['kelurahan'][index].nama + '</option>';
                        // id += [data['data'][index].id];

                    }
                    $('.kelurahanEdit').html(tag);

                }
            });
        })
    }
</script>
@endpush