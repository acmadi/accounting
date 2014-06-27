@extends('layout.master')

@section('title')
  All Pph
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">Pph</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada pph -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.pph')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Kode Pph</th>
            <th>Kode Pkp</th>
            <th>Kode Lembur</th>
            <th>pph thr</th>
			<th>pph_gaji_sebulan</th>
			<th>Aksi</th>

		</tr>

          @foreach ($data as $pph)
            <tr id="baris-{{ $pph->id}}">
              <td>
                {{{ $pph->kd_pph }}}
              </td>
              <td>
                {{{ $pph->kd_pkp }}}
              </td>
			  <td>
                {{{ $pph->kd_lembur }}}
              </td>
              <td>
                {{{ $pph->pph_thr }}}
              </td>
              <td>
                {{{ $pph->pph_gaji_sebulan }}}
              </td>

              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('pph.edit', array($pph->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('pph.index') }}" data-url="{{ route('pph.destroy', array($pph->id)) }}" data-tipe="pph" data-kode="{{ $pph->id }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>
              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada pph -->
    @else

      <!-- cari pph-->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.pph')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data pph yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua pph -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data pph yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari pph -->

    @endif
    <!-- /data pph -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada pph -->
      @if (count($data))

        <!-- semua pph -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua pph -->

        <div class="btn-group">
          <a href="{{ route('pph.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>

      <!-- tidak ada pph -->
      @else

        <a href="{{ route('pph.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop