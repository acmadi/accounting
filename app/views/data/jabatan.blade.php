@extends('layout.master')

@section('title')
  Data Jabatan
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">

  <div class="panel-heading">Data Jabatan</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada jabatan -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.jabatan')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Kode Jabatan</th>
			<th>Nama Jabatan</th>
			<th>Tunjangan Kesehatan</th>
			<th>Tunjangan Makan</th>
			<th>Tunjangan Transport</th>
            <th>Aksi</th>
          </tr>

          @foreach ($data as $jabatan)
            <tr id="baris-{{ $jabatan->id}}">
              <td>
                {{{ $jabatan->kd_jab }}}	
              </td>
			  <td>
				{{{ $jabatan->nama_jabatan }}}
			  </td>
			  <td>
				{{{ $jabatan->tun_kes }}}
			  </td>
			  <td>
				{{{ $jabatan->tun_mkn }}}
			  </td>
			  <td>
				{{{ $jabatan->tun_transport }}}
			  </td>

			  
              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('jabatan.edit', array($jabatan->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
				  
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('jabatan.index') }}" data-url="{{ route('jabatan.destroy', array($jabatan->id)) }}" data-tipe="jabatan" data-kode="{{ $jabatan->nama_jabatan }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>

              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada jabatan -->
    @else

      <!-- cari jabatan -->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.jabatan')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data jabatan yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua jabatan -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data jabatan yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari jabatan -->

    @endif
    <!-- /data jabatan -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada jabatan -->
      @if (count($data))

        <!-- semua jabatan -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua jabatan -->

        <div class="btn-group">
          <a href="{{ route('jabatan.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>
        
      <!-- tidak ada jabatan -->
      @else

        <a href="{{ route('jabatan.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop