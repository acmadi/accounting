@extends('layout.master')

@section('title')
  All Ppn
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">Ppn</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada ppn -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.ppn')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Kode perusahaan</th>
            <th>Kode ppn</th>
            <th>Ppn Pembelian</th>
            <th>Ppn Penjualan</th>
			<th>Bulan</th>
			<th>Tahun</th>
			<th>Biaya Membangun Sendiri</th>
			<th>Penomoran Faktur</th>
			<th>Penjualan Tanpa Faktur</th>
			
			<th>Aksi</th>

		</tr>

          @foreach ($data as $ppn)
            <tr id="baris-{{ $ppn->id}}">
              <td>
                {{{ $ppn->kd_perusahaan }}}
              </td>
              <td>
                {{{ $ppn->kd_ppn }}}
              </td>
			  <td>
                {{{ $ppn->ppn_pembelian }}}
              </td>
              <td>
                {{{ $ppn->ppn_penjalan }}}
              </td>
              <td>
                {{{ $ppn->bulan }}}
              </td>
              <td>
                {{{ $ppn->tahun }}}
              </td>
              <td>
                {{{ $ppn->biaya_membangun_sendiri }}}
              </td>
              <td>
                {{{ $ppn->penomoran_faktur }}}
              </td>
              <td>
                {{{ $ppn->penjualan_tanpa_faktur }}}
              </td>
			  

              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('ppn.edit', array($ppn->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
				  				  
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('ppn.index') }}" data-url="{{ route('ppn.destroy', array($ppn->id)) }}" data-tipe="ppn" data-kode="{{ $ppn->id }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>
              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada ppn -->
    @else

      <!-- cari ppn-->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.ppn')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data ppn yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua ppn -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data ppn yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari ppn -->

    @endif
    <!-- /data ppn -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada ppn -->
      @if (count($data))

        <!-- semua ppn -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua ppn -->

        <div class="btn-group">
          <a href="{{ route('ppn.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>

      <!-- tidak ada ppn -->
      @else

        <a href="{{ route('ppn.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop
