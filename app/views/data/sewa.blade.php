@extends('layout.master')

@section('title')
  All Sewa
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">Sewa</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada sewa -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.sewa')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Kode harga</th>
            <th>Kode sewa</th>
            <th>Nama sewa</th>
			<th>Aksi</th>

		</tr>

          @foreach ($data as $sewa)
            <tr id="baris-{{ $sewa->id}}">
              <td>
                {{{ $sewa->kd_harga }}}
              </td>
              <td>
                {{{ $sewa->kd_sewa }}}
              </td>
			  <td>
                {{{ $sewa->nama_sewa }}}
              </td>

              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('sewa.edit', array($sewa->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
				  				  
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('sewa.index') }}" data-url="{{ route('sewa.destroy', array($sewa->id)) }}" data-tipe="sewa" data-kode="{{ $sewa->id }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>
              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada sewa -->
    @else

      <!-- cari sewa-->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.sewa')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data sewa yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua sewa -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data sewa yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari sewa -->

    @endif
    <!-- /data sewa -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada sewa -->
      @if (count($data))

        <!-- semua sewa -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua sewa -->

        <div class="btn-group">
          <a href="{{ route('sewa.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>

      <!-- tidak ada sewa -->
      @else

        <a href="{{ route('sewa.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop
