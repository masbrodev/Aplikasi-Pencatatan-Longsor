@extends('layouts.main')

@section('content_header')
<h1>Kecamatan</h1>
@stop

@section('content')


    <h5 class="mt-3">Data Kecamatan</h5>
    <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="provinsi">Provinsi</label>
            <select name="provinsi" class="form-control provinsi" id="provinsi">

            </select>
        </div>
    </div>
    <br>
    <div class="col-md-6">
        <div class="form-group">
            <label for="my-input">Kabupaten</label>
            <select name="kabupaten" class="form-control kabupaten" id="kabupaten">

            </select>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="my-input">Kecamatan</label>
            <select name="kecamatan" class="form-control kecamatan" id="kecamatan">

            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="my-input">Kelurahan</label>
            <select name="kelurahan" class="form-control kelurahan" id="kelurahan">
            </select>

        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script>
 api_provinsi();

    function api_provinsi() {
        var tag = '';
        // var id = [];
        $.ajax({
            type: "GET",
            url: "http://dev.farizdotid.com/api/daerahindonesia/provinsi",
            dataType: "JSON",
            success: function (data) {
                for (var index = 0; index < data['provinsi'].length; index++) {
                    tag += '<option value="' + data['provinsi'][index].id + '">' + data['provinsi'][index].nama + '</option>';
                    // id += [data['data'][index].id];

                }
                $('.provinsi').html(tag);
            }
        });
        $('.provinsi').click(function () {
            var tag = '';
            id = $('#provinsi').val();
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=" + id,
                dataType: "JSON",
                success: function (data) {
                    for (var index = 0; index < data['kota_kabupaten'].length; index++) {
                        tag += '<option value="' + data['kota_kabupaten'][index].id + '">' + data['kota_kabupaten'][index].nama + data['kota_kabupaten'][index].id +'</option>';
                        // id += [data['data'][index].id];

                    }
                    $('.kabupaten').html(tag);

                }
            });
        });
        $('.kabupaten').click(function () {
            var tag = '';
            id = $('#kabupaten').val();
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=" + id,
                dataType: "JSON",
                success: function (data) {
                    for (var index = 0; index < data['kecamatan'].length; index++) {
                        tag += '<option value="' + data['kecamatan'][index].id + '">' + data['kecamatan'][index].nama + '</option>';
                        // id += [data['data'][index].id];

                    }
                    $('.kecamatan').html(tag);

                }
            });
        });
        $('.kecamatan').click(function () {
            var tag = '';
            id = $('#kecamatan').val();
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=" + id,
                dataType: "JSON",
                success: function (data) {
                    for (var index = 0; index < data['kelurahan'].length; index++) {
                        tag += '<option value="' + data['kelurahan'][index].id + '">' + data['kelurahan'][index].nama + '</option>';
                        // id += [data['data'][index].id];

                    }
                    $('.kelurahan').html(tag);

                }
            });
        })
    }

</script>
@endpush