@extends('layout.master')

@section('title')
  All Tunjangan
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">Tunjangan</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada tunjangan -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.tunjangan')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Kode Absensi</th>
            <th>Kode Tunjangan</th>
            <th>Tot. Tunjangan Kesehatan</th>
			<th>Tot. Tunjangan Makan</th>
            <th>Tot. Tunjangan Transport</th>
            <th>Tot. Tunjangan</th>
			<th>Aksi</th>
		</tr>

          @foreach ($data as $tunjangan)
            <tr id="baris-{{ $tunjangan->id}}">
              <td>
                {{{ $tunjangan->kd_absen }}}
              </td>
              <td>
                {{{ $tunjangan->kd_tunjangan }}}
              </td>
              <td>
                {{{ $tunjangan->ttl_tun_kes }}}
              </td>
              <td>
                {{{ $tunjangan->ttl_tun_makan }}}
              </td>
              <td>
                {{{ $tunjangan->ttl_tun_transport }}}
              </td>
              <td>
                {{{ $tunjangan->ttl_tun }}}
              </td>

              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('tunjangan.edit', array($tunjangan->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('tunjangan.index') }}" data-url="{{ route('tunjangan.destroy', array($tunjangan->id)) }}" data-tipe="tunjangan" data-kode="{{ $tunjangan->id }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>
              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada tunjangan -->
    @else

      <!-- cari tunjangan-->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.tunjangan')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data tunjangan yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua tunjangan -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data tunjangan yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari tunjangan -->

    @endif
    <!-- /data tunjangan -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada tunjangan-->
      @if (count($data))

        <!-- semua tunjangan -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua tunjangan -->

        <div class="btn-group">
          <a href="{{ route('tunjangan.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>

      <!-- tidak ada tunjangan -->
      @else

        <a href="{{ route('tunjangan.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop
