@extends('layout.master')

@section('title')
  All Absensi
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">Absensi</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada absensi -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.absensi')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Kode Absensi</th>
            <th>Kode Karyawan</th>
            <th>Tanggal</th>
			<th>Cuti</th>
            <th>Ijin</th>
            <th>Sakit</th>
			<th>Alpha</th>
			<th>Aksi</th>
			
		</tr>

          @foreach ($data as $absensi)
            <tr id="baris-{{ $absensi->id}}">
              <td>
                {{{ $absensi->kd_absen }}}
              </td>
              <td>
                {{{ $absensi->kd_karyawan }}}
              </td>
              <td>
                {{{ $absensi->tanggal }}}
              </td>
              <td>
                {{{ $absensi->cuti }}}
              </td>
              <td>
                {{{ $absensi->ijin }}}
              </td>
              <td>
                {{{ $absensi->sakit }}}
              </td>
               <td>
                {{{ $absensi->alpha }}}
              </td>

              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('absensi.edit', array($absensi->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('absensi.index') }}" data-url="{{ route('absensi.destroy', array($absensi->id)) }}" data-tipe="absensi" data-kode="{{ $absensi->id }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>
              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada absensi -->
    @else

      <!-- cari absensi-->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.absensi')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data absensi yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua absensi -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data absensi yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari absensi -->

    @endif
    <!-- /data absensi -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada absensi-->
      @if (count($data))

        <!-- semua absensi -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua absensi -->

        <div class="btn-group">
          <a href="{{ route('absensi.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>

      <!-- tidak ada absensi -->
      @else

        <a href="{{ route('absensi.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop
