@extends('layout.master')

@section('title')
  Data Perusahaan
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">

  <div class="panel-heading">Data Perusahaan</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada perusahaan -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.perusahaan1')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
			<th>Kode Perusahaan</th>
            <th>Nama Perusahaan</th>
			<th>Alamat</th>
			<th>Kota</th>
			<th>Propinsi</th>
			<th>Kode Pos</th>
			<th>Handphone</th>
			<th>Telephone</th>
			<th>Email</th>
            <th>Aksi</th>
          </tr>

          @foreach ($data as $perusahaan1)
            <tr id="baris-{{ $perusahaan1->id}}">
              <td>
				{{{ $perusahaan1->kd_perusahaan }}}
              </td>
			  <td>
				{{{ $perusahaan1->nama_perusahaan }}}
			  </td>
			  <td>
				{{{ $perusahaan1->alamat }}}
			  </td>
			  <td>
				{{{ $perusahaan1->kota }}}
			  </td>
			  <td>
				{{{ $perusahaan1->propinsi }}}
			  </td>
			  <td>
				{{{ $perusahaan1->kode_pos }}}
			  </td>
			  <td>
				{{{ $perusahaan1->handphone }}}
			  </td>
			  <td>
				{{{ $perusahaan1->telephone }}}
			  </td>
			  <td>
				{{{ $perusahaan1->email }}}
			  </td>

			  
              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('perusahaan1.edit', array($perusahaan1->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
				  
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('perusahaan1.index') }}" data-url="{{ route('perusahaan1.destroy', array($perusahaan1->id)) }}" data-tipe="perusahaan1" data-kode="{{ $perusahaan1->kd_perusahaan }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>

              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada perusahaan1 -->
    @else

      <!-- cari perusahaan1-->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.perusahaan1')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data perusahaan yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua golongan -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data perusahaan yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari perusahaan -->

    @endif
    <!-- /data perusahaan -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada perusahaan -->
      @if (count($data))

        <!-- semua perusahaan -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua perusahaan -->

        <div class="btn-group">
          <a href="{{ route('perusahaan1.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>
        
      <!-- tidak ada perusahaan -->
      @else

        <a href="{{ route('perusahaan1.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop