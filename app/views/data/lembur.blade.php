@extends('layout.master')

@section('title')
  All Lembur
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">Lembur</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada lembur -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.lembur')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Kode Tunjangan</th>
            <th>Kode Lembur</th>
            <th>Jumlah Lembur Biasa</th>
			<th>Jumlah Lembur Libur</th>
            <th>Tarif Biasa</th>
            <th>Tarif Libur</th>
			<th>Total</th>
			<th>Aksi</th>
		</tr>

          @foreach ($data as $lembur)
            <tr id="baris-{{ $lembur->id}}">
              <td>
                {{{ $lembur->kd_tunjangan }}}
              </td>
              <td>
                {{{ $lembur->kd_lembur }}}
              </td>
              <td>
                {{{ $lembur->jml_lembur_biasa }}}
              </td>
              <td>
                {{{ $lembur->jml_lembur_libur }}}
              </td>
              <td>
                {{{ $lembur->tarif_biasa }}}
              </td>
              <td>
                {{{ $lembur->tarif_libur }}}
              </td>
              <td>
                {{{ $lembur->total }}}
              </td>
			  
              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('lembur.edit', array($lembur->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('lembur.index') }}" data-url="{{ route('lembur.destroy', array($lembur->id)) }}" data-tipe="lembur" data-kode="{{ $lembur->id }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>
              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada lembur -->
    @else

      <!-- cari lembur-->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.lembur')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data lembur yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua lembur -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data lembur yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari lembur -->

    @endif
    <!-- /data lembur -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada lembur-->
      @if (count($data))

        <!-- semua lembur -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua lembur -->

        <div class="btn-group">
          <a href="{{ route('lembur.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>

      <!-- tidak ada lembur -->
      @else

        <a href="{{ route('lembur.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop
