@extends('layout.master')

@section('title')
  Data pkp
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">

  <div class="panel-heading">Data Pkp</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada pkp -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.pkp')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
			<th>kode pkp</th>
            <th>batas pkp</th>
			<th>Tarif</th>

            <th>Aksi</th>
          </tr>

          @foreach ($data as $pkp)
            <tr id="baris-{{ $pkp->id}}">
              <td>
                {{{ $pkp->kd_pkp }}}
              </td>
              <td>
                {{{ $pkp->batas_pkp }}}
              </td>
			  <td>
				{{{ $pkp->tarif }}}
			  </td>
              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('pkp.edit', array($pkp->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
				  
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('pkp.index') }}" data-url="{{ route('pkp.destroy', array($pkp->id)) }}" data-tipe="pkp" data-kode="{{ $pkp->kd_pkp }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>

              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada pkp -->
    @else

      <!-- cari pkp -->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.pkp')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data pkp yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua pkp -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data pkp yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari pkp -->

    @endif
    <!-- /data pkp -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada pkp -->
      @if (count($data))

        <!-- semua pkp -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua pkp -->

        <div class="btn-group">
          <a href="{{ route('pkp.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>
        
      <!-- tidak ada pkp -->
      @else

        <a href="{{ route('pkp.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop