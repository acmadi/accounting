@extends('layout.master')

@section('title')
  All Agenda
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">Agenda</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada agenda -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.agenda')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Kode marketing</th>
            <th>Kode agenda</th>
            <th>Nama agenda</th>
            <th>Keterangan</th>
			<th>Aksi</th>

		</tr>

          @foreach ($data as $agenda)
            <tr id="baris-{{ $agenda->id}}">
              <td>
                {{{ $agenda->kd_marketing }}}
              </td>
              <td>
                {{{ $agenda->kd_agenda }}}
              </td>
			  <td>
                {{{ $agenda->nama_agenda }}}
              </td>
              <td>
                {{{ $agenda->keterangan }}}
              </td>

              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('agenda.edit', array($agenda->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
				  				  
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('agenda.index') }}" data-url="{{ route('agenda.destroy', array($agenda->id)) }}" data-tipe="agenda" data-kode="{{ $agenda->id }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>
              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada agenda -->
    @else

      <!-- cari agenda-->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.agenda')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data agenda yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua agenda -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data agenda yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari agenda -->

    @endif
    <!-- /data agenda -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada agenda -->
      @if (count($data))

        <!-- semua agenda -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua agenda -->

        <div class="btn-group">
          <a href="{{ route('agenda.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>

      <!-- tidak ada agenda -->
      @else

        <a href="{{ route('agenda.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop