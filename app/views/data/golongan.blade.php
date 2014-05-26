@extends('layout.master')

@section('title')
  Data Jabatan
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">

  <div class="panel-heading">Data Golongan</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada golongan -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.golongan')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
			<th>Kode Golongan</th>
            <th>Golongan Pokok</th>
			<th> Tunjangan Jabatan  </th>
            <th>Aksi</th>
          </tr>

          @foreach ($data as $golongan)
            <tr id="baris-{{ $golongan->id}}">
              <td>
				{{{ $golongan->kd_gol }}}
              </td>
			  <td>
				{{{ $golongan->gol_pok }}}
			  </td>
			  
			  <td>
				{{{ $golongan->tun_jab }}}
			  </td>

			  
              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('golongan.edit', array($golongan->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
				  
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('golongan.index') }}" data-url="{{ route('golongan.destroy', array($golongan->id)) }}" data-tipe="golongan" data-kode="{{ $golongan->kd_gol }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>

              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada golongan -->
    @else

      <!-- cari golongan-->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.golongan')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data golongan yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua golongan -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data golongan yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari golongan -->

    @endif
    <!-- /data golongan -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada golongan -->
      @if (count($data))

        <!-- semua golongan -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua golongan -->

        <div class="btn-group">
          <a href="{{ route('golongan.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>
        
      <!-- tidak ada golongan -->
      @else

        <a href="{{ route('golongan.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop