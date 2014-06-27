@extends('layout.master')

@section('title')
  All Gaji
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">Gaji</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada gaji -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.gaji')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Kode Tunjangan</th>
            <th>Kode Lembur</th>
            <th>Kode Pph</th>
            <th>Kode Gaji</th>
			<th>tanggal</th>
			<th>tun jabatan</th>
			<th>ttl tunjangan</th>
			<th>pph thr</th>
			
			<th>Aksi</th>

		</tr>

          @foreach ($data as $gaji)
            <tr id="baris-{{ $gaji->id}}">
              <td>
                {{{ $gaji->kd_tunjangan }}}
              </td>
              <td>
                {{{ $gaji->kd_lembur }}}
              </td>
			  <td>
                {{{ $gaji->kd_pph }}}
              </td>
              <td>
                {{{ $gaji->kd_gaji }}}
              </td>
              <td>
                {{{ $gaji->tanggal }}}
              </td>
              <td>
                {{{ $gaji->tun_jab }}}
              </td>
              <td>
                {{{ $gaji->ttl_tunjangan }}}
              </td>
              <td>
                {{{ $gaji->pph_thr }}}
              </td>

              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('gaji.edit', array($gaji->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('gaji.index') }}" data-url="{{ route('gaji.destroy', array($gaji->id)) }}" data-tipe="gaji" data-kode="{{ $gaji->id }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>
              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada gaji -->
    @else

      <!-- cari gaji-->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.gaji')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data gaji yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua gaji -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data gaji yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari gaji -->

    @endif
    <!-- /data gaji -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada gaji -->
      @if (count($data))

        <!-- semua gaji -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua gaji -->

        <div class="btn-group">
          <a href="{{ route('gaji.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>

      <!-- tidak ada gaji -->
      @else

        <a href="{{ route('gaji.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop
