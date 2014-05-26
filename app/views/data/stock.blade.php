@extends('layout.master')

@section('title')
  Data Stock
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">Data Stock</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada stock -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.stock')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Satuan</th>
            <th>Jumlah</th>
            <th>Dibuat</th>
            <th>Dirubah</th>
          </tr>

          @foreach ($data as $pemasukan)
            <tr>
              <td>
                {{{ $pemasukan->barang }}}
              </td>
              <td>
                {{{ $pemasukan->nama }}}
              </td>
              <td>
                {{{ $pemasukan->satuan }}}
              </td>
              <td>
                {{{ number_format($pemasukan->jumlah, null, ',', '.') }}}
              </td>
              <td>
                {{{ date('d-m-Y', strtotime($pemasukan->created_at)) }}}
              </td>
              <td>
                {{{ date('d-m-Y', strtotime($pemasukan->updated_at)) }}}
              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada stock -->
    @else

      <!-- cari stock -->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.stock')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data stock yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua stock -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data stock yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari stock -->

    @endif
    <!-- /data stock -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada stock -->
      @if (count($data))

        <!-- semua stock -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua stock -->

        <div class="btn-group">
          <a href="{{ route('excel_stock') }}" class="btn btn-primary ikon" target="_blank" title="Excel">
            <span class="glyphicon glyphicon-th"></span>
          </a>
          <a href="{{ route('pdf_stock') }}" class="btn btn-primary ikon" target="_blank" title="Cetak">
            <span class="glyphicon glyphicon-print"></span>
          </a>
        </div>
        
      <!-- tidak ada stock -->
      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop