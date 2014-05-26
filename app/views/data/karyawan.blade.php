@extends('layout.master')

@section('title')
  All Karyawan
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">Karyawan</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada karyawan -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.karyawan')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Kode Karyawan</th>
            <th>Kode Agama</th>
            <th>Kode Departemen</th>
            <th>Kode Jabatan</th>
            <th>Kode Golongan</th>
            <th>Kode Status Kawin</th>
            <th>NIK</th>
			<th>Nama Depan</th>
			<th>Aksi</th>

		</tr>

          @foreach ($data as $karyawan)
            <tr id="baris-{{ $karyawan->id}}">
              <td>
                {{{ $karyawan->kd_karyawan }}}
              </td>
              <td>
                {{{ $karyawan->kd_agama }}}
              </td>
              <td>
                {{{ $karyawan->kd_dep }}}
              </td>
              <td>
                {{{ $karyawan->kd_jab }}}
              </td>
              <td>
                {{{ $karyawan->kd_gol }}}
              </td>
              <td>
                {{{ $karyawan->kd_statuskawin }}}
              </td>
              <td>
                {{{ $karyawan->nik }}}
              </td>
              <td>
                {{{ $karyawan->nama_depan }}}
              </td>


              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('karyawan.edit', array($karyawan->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
				  
                <a href="#" class="btn btn-primary ikon foto" title="Foto" data-nama="{{{ $karyawan->kd_karyawan }}}" data-foto="{{{ ($karyawan->foto) ?: 'users.png' }}}">
                    <span class="glyphicon glyphicon-camera"></span>
                </a>
					
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('karyawan.index') }}" data-url="{{ route('karyawan.destroy', array($karyawan->id)) }}" data-tipe="karyawan" data-kode="{{ $karyawan->id }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>
              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada karyawan -->
    @else

      <!-- cari karyawan-->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.karyawan')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data karyawan yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua karyawan -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data karyawan yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari karyawan -->

    @endif
    <!-- /data karyawan -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada karyawan -->
      @if (count($data))

        <!-- semua karyawan -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua karyawan -->

        <div class="btn-group">
          <a href="{{ route('karyawan.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>

      <!-- tidak ada karyawan -->
      @else

        <a href="{{ route('karyawan.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop