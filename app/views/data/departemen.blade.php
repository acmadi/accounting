@extends('layout.master')

@section('title')
  Data Departemen
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">

  <div class="panel-heading">Data Departemen</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada departemen -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.departemen')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
			<th>Kode Departemen</th>
            <th>Nama Departemen</th>

            <th>Aksi</th>
          </tr>

          @foreach ($data as $departemen)
            <tr id="baris-{{ $departemen->id}}">
              <td>
				{{{ $departemen->kd_dep }}}
              </td>
			  <td>
				{{{ $departemen->nama_dep }}}
			  </td>

			  
              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('departemen.edit', array($departemen->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
				  
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('departemen.index') }}" data-url="{{ route('departemen.destroy', array($departemen->id)) }}" data-tipe="departemen" data-kode="{{ $departemen->nama_dep }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>

              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada departemen -->
    @else

      <!-- cari departemen-->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.departemen')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data departemen yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua departemen -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data departemen yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari departemen -->

    @endif
    <!-- /data departemen -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada departemen -->
      @if (count($data))

        <!-- semua departemen -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua departemen -->

        <div class="btn-group">
          <a href="{{ route('departemen.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>
        
      <!-- tidak ada departemen -->
      @else

        <a href="{{ route('departemen.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop