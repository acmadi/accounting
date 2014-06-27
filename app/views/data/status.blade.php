@extends('layout.master')

@section('title')
  Data status
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">

  <div class="panel-heading">Data Status</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada status -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.status')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
			<th>Kode Status</th>
            <th>Status</th>
			
            <th>Aksi</th>
          </tr>

          @foreach ($data as $status)
            <tr id="baris-{{ $status->id}}">
              <td>
				{{{ $status->id_status }}}
              </td>
			  <td>
				{{{ $status->status_name }}}
			  </td>
			  
			  
              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('status.edit', array($status->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
				  
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('status.index') }}" data-url="{{ route('status.destroy', array($status->id)) }}" data-tipe="status" data-kode="{{ $status->id_status }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>

              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada status -->
    @else

      <!-- cari status-->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.status')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data status yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua status -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data status yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari status -->

    @endif
    <!-- /data status -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada status -->
      @if (count($data))

        <!-- semua status -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua status -->

        <div class="btn-group">
          <a href="{{ route('status.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>
        
      <!-- tidak ada status -->
      @else

        <a href="{{ route('status.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop