@extends('layout.master')

@section('title')
  Data potongan
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">

  <div class="panel-heading">Data Potongan</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada potongan -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.potongan')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
			<th>kode potongan</th>
            <th>Nama potongan</th>

            <th>Aksi</th>
          </tr>

          @foreach ($data as $potongan)
            <tr id="baris-{{ $potongan->id}}">
              <td>
                {{{ $potongan->kd_potongan }}}
              </td>
              <td>
                {{{ $potongan->nama_potongan }}}
              </td>

              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('potongan.edit', array($potongan->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
				  
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('potongan.index') }}" data-url="{{ route('potongan.destroy', array($potongan->id)) }}" data-tipe="harga" data-kode="{{ $potongan->kd_potongan }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>

              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada potongan -->
    @else

      <!-- cari potongan -->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.potongan')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data potongan yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua potongan -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data potongan yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari potongan -->

    @endif
    <!-- /data potongan -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada harga -->
      @if (count($data))

        <!-- semua harga -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua potongan -->

        <div class="btn-group">
          <a href="{{ route('potongan.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>
        
      <!-- tidak ada harga -->
      @else

        <a href="{{ route('potongan.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop