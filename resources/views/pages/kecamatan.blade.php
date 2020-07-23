@extends('layouts.main')

@section('content_header')
<h1>Kecamatan</h1>
@stop

@section('content')


            <h5 class="mt-3">Data Kecamatan & Kelurahan Kabupaten Probolonggo</h5>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="my-input">Kecamatan</label>
                        <select name="kecamatan" class="form-control kecamatan" id="kecamatan">

                        </select>
                    </div>
                </div>
            </div>  

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kelurahan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nama Kelurahan</th>
                    </tr>
                  </thead>
                 <tbody id="kelurahan" name="kelurahan" class="kelurahan" >
                </tbody>
            </table>
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
            url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=3513",
            dataType: "JSON",
            success: function (data) {
                for (var index = 0; index < data['kecamatan'].length; index++) {
                    tag += '<option value="' + data['kecamatan'][index].id + '" myTag= "'+data['kecamatan'][index].id+'">' + data['kecamatan'][index].nama + '</option>';


                }
                $('.kecamatan').html(tag);
            }
        });
       
        $('.kecamatan').click(function () {
            var tag = '';
            id = $('#kecamatan').val();
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=" + id,
                dataType: "JSON",
                success: function (data) {
                    // tag +='<h1>qwertyuio</h1>'
                    for (var index = 0; index < data['kelurahan'].length; index++) {
                    num = 1 + index;

                        // tag += '<option value="' + data['kelurahan'][index].id + '">' + data['kelurahan'][index].nama + '</option>';
                        tag += '<tr><td>' + num + '</td><td>' + data['kelurahan'][index].nama + '</td></tr>';
                        // id += [data['data'][index].id];

                    }
                    $('.kelurahan').html(tag);

                }
            });
        })
    }

</script>
@endpush