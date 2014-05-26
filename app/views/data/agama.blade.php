@extends('layout.master')

@section('title')
  Data Agama
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">

  <div class="panel-heading">Data Agama</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada agama -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.agama')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
			<th>kode Agama</th>
            <th>Nama Agama</th>

            <th>Aksi</th>
          </tr>

          @foreach ($data as $agama)
            <tr id="baris-{{ $agama->id}}">
              <td>
                {{{ $agama->kd_agama }}}
              </td>
              <td>
                {{{ $agama->nama }}}
              </td>
			  
              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('agama.edit', array($agama->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
				  
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('agama.index') }}" data-url="{{ route('agama.destroy', array($agama->id)) }}" data-tipe="agama" data-kode="{{ $agama->nama }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>

              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada agama -->
    @else

      <!-- cari agama -->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.agama')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data agama yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua agama -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data agama yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari agama -->

    @endif
    <!-- /data agama -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada agama -->
      @if (count($data))

        <!-- semua agama -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua agama -->

        <div class="btn-group">
          <a href="{{ route('agama.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>
        
      <!-- tidak ada agama -->
      @else

        <a href="{{ route('agama.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop