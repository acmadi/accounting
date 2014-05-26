@extends('layout.master')

@section('title')
  Data Ptkp
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">

  <div class="panel-heading">Data Ptkp</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada ptkp -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.ptkp')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
			<th>Kode PTKP</th>
            <th>Jumlah PTKP</th>
			<th>Status Kawin  </th>
            <th>Aksi</th>
          </tr>

          @foreach ($data as $ptkp)
            <tr id="baris-{{ $ptkp->id}}">
              <td>
				{{{ $ptkp->kd_statuskawin }}}
              </td>
			  <td>
				{{{ $ptkp->jumlah_ptkp }}}
			  </td>
			  
			  <td>
				{{{ $ptkp->status_kawin }}}
			  </td>

			  
              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('ptkp.edit', array($ptkp->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
				  
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('ptkp.index') }}" data-url="{{ route('ptkp.destroy', array($ptkp->id)) }}" data-tipe="ptkp" data-kode="{{ $ptkp->kd_statuskawin }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>

              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada ptkp -->
    @else

      <!-- cari ptkp-->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.ptkp')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data ptkp yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua ptkp -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data ptkp yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari ptkp -->

    @endif
    <!-- /data ptkp -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada ptkp -->
      @if (count($data))

        <!-- semua ptkp -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua ptkp -->

        <div class="btn-group">
          <a href="{{ route('ptkp.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>
        
      <!-- tidak ada golongan -->
      @else

        <a href="{{ route('ptkp.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop