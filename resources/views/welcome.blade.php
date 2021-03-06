<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Webgis Pemetaan Longsor Kabupaten Probolinggo</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('vendor/welcome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

<style>
    #mapid { min-height: 300px; }

    .jumbotron {
  position: relative;
  overflow: hidden;
  background-color:black;
}
.jumbotron .img {
  position: absolute;
  z-index: 1;
  top: 0;
  width:100%;
  height:100%;
  /*  object-fit is not supported on IE  */
  object-fit: cover;
  opacity:0.5;
}

.jumbotron .img2 {
  position: relative;
  z-index: 2;
  top: 50%;
  width:200px;
  height:200px;
}
.jumbotron .container {
  z-index: 2;
  position: relative;
}

</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    WebGIS
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            
                    </ul>
                </div>
            </div>
        </nav>

<div class="jumbotron jumbotron-fluid">

<img class="img"src="https://images.pexels.com/photos/2291648/pexels-photo-2291648.jpeg?cs=srgb&dl=alam-asap-awan-berbayang-2291648.jpg&fm=jpg" alt="">
<center>
<img class="img2" src="{{ asset('logo.png')}}" alt="">
</center>
  <div class="container text-white ">

    <h1 class="display-4">Aplikasi Webgis Pemetaan Longsor Kabupaten Probolinggo</h1>
    <p class="lead">Hidup Bersinergi dengan Semesta Alam Kenali Bahayanya Kurangi Resikonya Probolinggo Tangguh Bencana Alam.</p>
 </div>
 <br>
 <br>
  <!-- /.container -->
</div>
<!-- /.jumbotron -->
        <main class="py-4 container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                <center>
                  Peta Sebaran Bencana Alam Kabupaten Probolinggo
                </center>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="card-body" id="mapid"></div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          </div>
        </main>
    </div>
    <!-- Scripts -->
   

</body>
</html>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<!-- <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> -->
<!-- <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script> -->

<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>

function deferVideo() {

    //defer html5 video loading
  $("video source").each(function() {
    var sourceFile = $(this).attr("data-src");
    $(this).attr("src", sourceFile);
    var video = this.parentElement;
    video.load();
    // uncomment if video is not autoplay
    video.play(); 
  });

}
window.onload = deferVideo;



    var map = L.map('mapid').setView([{{ config('leaflet.map_center_latitude') }}, {{ config('leaflet.map_center_longitude') }}], {{ config('leaflet.zoom_level') }});
    var baseUrl = "{{ url('/') }}";

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    axios.get('{{ route('api.outlets.index') }}')
    .then(function (response) {
        console.log(response.data);
        L.geoJSON(response.data, {
            pointToLayer: function(geoJsonPoint, latlng) {
                return L.marker(latlng);
            }
        })
        .bindPopup(function (layer) {
            return layer.feature.properties.map_popup_content;
        }).addTo(map);
    })
    .catch(function (error) {
        console.log(error);
    });

    @can('create', new App\Outlet)
    var theMarker;

    map.on('click', function(e) {
        var xmlhttp = new XMLHttpRequest();

        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);



        if (theMarker != undefined) {
            map.removeLayer(theMarker);
        };

        var popupContent = "Your location : " + latitude + ", " + longitude + ".";
        popupContent += '<br><a href="{{ route('outlets.create') }}?latitude=' + latitude + '&longitude=' + longitude + '">Add new outlet here</a>';

        theMarker = L.marker([latitude, longitude]).addTo(map);
        theMarker.bindPopup(popupContent)
        .openPopup();
    });
    @endcan
</script>