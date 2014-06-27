@extends('layout.master')

@section('title')
  All Pph42
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">Pph42</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada pph42 -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.pph42')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Kode perusahaan</th>
            <th>Kode pph42</th>
            <th>jumlah omzet</th>
            <th>bulan</th>
			<th>tahun</th>
			<th>tanggal</th>
			<th>nama_penyetor</th>
			<th>aksi</th>

		</tr>

          @foreach ($data as $pph42)
            <tr id="baris-{{ $pph42->id}}">
              <td>
                {{{ $pph42->kd_perusahaan }}}
              </td>
              <td>
                {{{ $pph42->id_pph42 }}}
              </td>
              <td>
                {{{ $pph42->jumlah_omzet }}}
              </td>
			  <td>
                {{{ $pph42->bulan }}}
              </td>
              <td>
                {{{ $pph42->tahun }}}
              </td>
              <td>
                {{{ $pph42->tanggal }}}
              </td>
              <td>
                {{{ $pph42->nama_penyetor }}}
              </td>
			  

              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('pph42.edit', array($pph42->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
				  				  
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('pph42.index') }}" data-url="{{ route('pph42.destroy', array($pph42->id)) }}" data-tipe="pph42" data-kode="{{ $pph42->id }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>
              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada pph42 -->
    @else

      <!-- cari pph42-->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.pph42')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data pph42 yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua pph42 -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data pph42 yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari pph42 -->

    @endif
    <!-- /data pph42 -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada pph42 -->
      @if (count($data))

        <!-- semua pph42 -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua pph42 -->

        <div class="btn-group">
          <a href="{{ route('pph42.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>

      <!-- tidak ada pph42 -->
      @else

        <a href="{{ route('pph42.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop