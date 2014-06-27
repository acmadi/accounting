@extends('layout.master')

@section('title')
  All Detail gaji
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">Detail gaji</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada detail gaji -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.detailgaji')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Nomor Detail Gaji</th>
            <th>Kode Potongan</th>
            <th>Jumlah</th>
			<th>Aksi</th>

		</tr>

          @foreach ($data as $detailgaji)
            <tr id="baris-{{ $detailgaji->id}}">
              <td>
                {{{ $detailgaji->nomor }}}
              </td>
              <td>
                {{{ $detailgaji->kd_potongan }}}
              </td>
              <td>
                {{{ $detailgaji->jumlah }}}
              </td>
 
              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('detailgaji.edit', array($detailgaji->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('detailgaji.index') }}" data-url="{{ route('detailgaji.destroy', array($detailgaji->id)) }}" data-tipe="detailgaji" data-kode="{{ $detailgaji->id }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>
              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada detail gaji -->
    @else

      <!-- cari detail gaji-->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.detailgaji')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data detail gaji yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua detailgaji -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data detail gaji yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari detailgaji -->

    @endif
    <!-- /data detail gaji -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada detail gaji-->
      @if (count($data))

        <!-- semua detail gaji -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua detail gaji -->

        <div class="btn-group">
          <a href="{{ route('detailgaji.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>

      <!-- tidak ada detail gaji -->
      @else

        <a href="{{ route('detailgaji.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop