@extends('layout.master')

@section('title')
  All Penilaian
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">Penilaian</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada penilaian -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.penilaian')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Kode Absen</th>
            <th>Kode Penilaian</th>
            <th>Kinerja</th>
			<th>Aksi</th>
		</tr>

          @foreach ($data as $penilaian)
            <tr id="baris-{{ $penilaian->id}}">
              <td>
                {{{ $penilaian->kd_absen }}}
              </td>
              <td>
                {{{ $penilaian->kd_penilaian }}}
              </td>
              <td>
                {{{ $penilaian->kinerja }}}
              </td>
 			  
              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('penilaian.edit', array($penilaian->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('penilaian.index') }}" data-url="{{ route('penilaian.destroy', array($penilaian->id)) }}" data-tipe="penilaian" data-kode="{{ $penilaian->id }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>
              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada penilaian -->
    @else

      <!-- cari penilaian-->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.penilaian')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data penilaian yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua penilaian -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data penilaian yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari penilaian -->

    @endif
    <!-- /data penilaian -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada penilaian-->
      @if (count($data))

        <!-- semua penilaian -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua penilaian -->

        <div class="btn-group">
          <a href="{{ route('penilaian.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>

      <!-- tidak ada penilaian -->
      @else

        <a href="{{ route('penilaian.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop
