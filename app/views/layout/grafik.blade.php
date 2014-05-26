<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" media="screen">
  </head>
  <body>
    @include('includes.navbar')

    <!-- .container -->
    <div class="container-fluid">

      <!-- .row -->
      <div class="row">

        <!-- #menu -->
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="menu">
          @include('includes.menu')
        </div>
        <!-- /#menu -->

        <!-- #konten -->
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9" id="konten">
          @yield('konten')
        </div>
        <!-- /#konten -->

      </div>
      <!-- /.row -->

    </div>
    <!-- .container -->

    <!-- modal -->
    @include('includes.modal')

    <!-- url -->
    @include('includes.url')

    <script>
      var nama_corp = "{{ $corp->nama }}";
      var data      = {{ $data }};
      var jumlah    = [];
      var bulan     = [];
      var tipe      = "{{ $tipe }}";
    </script>

    <!-- JavaScript -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/highcharts.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
  </body>
</html>