@extends('layout.master')

@section('title')
  Data harga
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">

  <div class="panel-heading">Data Harga</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada harga -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.harga')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
			<th>kode harga</th>
            <th>Nama harga</th>
			<th>Harga</th>

            <th>Aksi</th>
          </tr>

          @foreach ($data as $harga)
            <tr id="baris-{{ $harga->id}}">
              <td>
                {{{ $harga->kd_harga }}}
              </td>
              <td>
                {{{ $harga->nama_harga }}}
              </td>
			  <td>
				{{{ $harga->harga }}}
			  </td>
              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('harga.edit', array($harga->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
				  
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('harga.index') }}" data-url="{{ route('harga.destroy', array($harga->id)) }}" data-tipe="harga" data-kode="{{ $harga->kd_harga }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>

              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada harga -->
    @else

      <!-- cari harga -->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.harga')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data harga yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua harga -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data harga yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari harga -->

    @endif
    <!-- /data harga -->

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
        <!-- /semua harga -->

        <div class="btn-group">
          <a href="{{ route('harga.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>
        
      <!-- tidak ada harga -->
      @else

        <a href="{{ route('harga.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop