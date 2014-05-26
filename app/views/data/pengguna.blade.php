@extends('layout.master')

@section('title')
  Data Pengguna
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">

  <div class="panel-heading">Data Super User</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada pengguna -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.pengguna')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Nama Depan</th>
			<th>Nama Belakang</th>
            <th>Email</th>
            <th>Jabatan</th>
            <th>Alamat</th>
            <th>Username</th>
            <th>Aksi</th>
          </tr>

          @foreach ($data as $pengguna)
            <tr id="baris-{{ $pengguna->id }}">
              <td>
                {{{ $pengguna->nama }}}
              </td>
			  <td>
				{{{ $pengguna->nama_belakang }}}
			  </td>
              <td>
                {{{ $pengguna->email }}}
              </td>
              <td>
                @if ($pengguna->akses == 3)
                  Direktur
                @elseif ($pengguna->akses == 2)
                  Manajer
                @else
                  Karyawan
                @endif
              </td>
              <td>
                {{{ $pengguna->alamat }}}
              </td>
              <td>
                {{{ $pengguna->username }}}
              </td>
			  
              <td>
                <div class="btn-group btn-group-xs">
                  @if ($pengguna->id != Auth::user()->id && strtolower(Auth::user()->akses) >= 2)
                    <a href="{{ route('pengguna.edit', array($pengguna->id)) }}" class="btn btn-primary ikon" title="Rubah">
                      <span class="glyphicon glyphicon-pencil"></span>
                    </a>
					
                    <a href="#" class="btn btn-primary ikon foto" title="Foto" data-nama="{{{ $pengguna->nama }}}" data-foto="{{{ ($pengguna->foto) ?: 'users.png' }}}">
                      <span class="glyphicon glyphicon-camera"></span>
                    </a>
				
					
                    <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('pengguna.index') }}" data-url="{{ route('pengguna.destroy', array($pengguna->id)) }}" data-tipe="pengguna" data-kode="{{ $pengguna->username }}">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  @else
                    -
                  @endif
                </div>
              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada pengguna -->
    @else

      <!-- cari pengguna -->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.pengguna')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data pengguna yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua pengguna -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data pengguna yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari pengguna -->

    @endif
    <!-- /data pengguna -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada pengguna -->
      @if (count($data))

        <!-- semua pengguna -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua pengguna -->

        <div class="btn-group">
          <a href="{{ route('pengguna.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>
     
	
      <!-- tidak ada pengguna -->
      @else

        <a href="{{ route('pengguna.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop