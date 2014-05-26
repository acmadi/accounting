@extends('layout.master')

@section('title')
  Data Pelanggan
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">Data Pelanggan</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada pelanggan -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.pelanggan')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>

          @foreach ($data as $pelanggan)
            <tr id="baris-{{ $pelanggan->id }}">
              <td>
                {{{ $pelanggan->kode }}}
              </td>
              <td>
                {{{ $pelanggan->nama }}}
              </td>
              <td>
                {{{ $pelanggan->telp }}}
              </td>
              <td>
                {{{ $pelanggan->alamat }}}
              </td>
              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('pelanggan.edit', array($pelanggan->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('pelanggan.index') }}" data-url="{{ route('pelanggan.destroy', array($pelanggan->id)) }}" data-tipe="pelanggan" data-kode="{{ $pelanggan->kode }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>
              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada pelanggan -->
    @else

      <!-- cari pelanggan -->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.pelanggan')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data pelanggan yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua pelanggan -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data pelanggan yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari pelanggan -->

    @endif
    <!-- /data pelanggan -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada pelanggan -->
      @if (count($data))

        <!-- semua pelanggan -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua pelanggan -->

        <div class="btn-group">
          <a href="{{ route('excel_pelanggan') }}" class="btn btn-primary ikon" target="_blank" title="Excel">
            <span class="glyphicon glyphicon-th"></span>
          </a>
          <a href="{{ route('pelanggan.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
          <a href="{{ route('pdf_pelanggan') }}" class="btn btn-primary ikon" target="_blank" title="Cetak">
            <span class="glyphicon glyphicon-print"></span>
          </a>
        </div>
        
      <!-- tidak ada pelanggan -->
      @else

        <a href="{{ route('pelanggan.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop