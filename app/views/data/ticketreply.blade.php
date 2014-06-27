@extends('layout.master')

@section('title')
  All Ticket reply
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">Ticket reply</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada ticket reply -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.ticketreply')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Kode ticket</th>
            <th>Kode reply</th>
            <th>Nama reply</th>
            <th>Keterangan</th>
			<th>Aksi</th>

		</tr>

          @foreach ($data as $ticketreply)
            <tr id="baris-{{ $ticketreply->id}}">
              <td>
                {{{ $ticketreply->kd_ticket }}}
              </td>
              <td>
                {{{ $ticketreply->kd_reply }}}
              </td>
			  <td>
                {{{ $ticketreply->nama_reply }}}
              </td>
              <td>
                {{{ $ticketreply->keterangan }}}
              </td>

              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('ticketreply.edit', array($ticketreply->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
				  				  
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('ticketreply.index') }}" data-url="{{ route('ticketreply.destroy', array($ticketreply->id)) }}" data-tipe="ticketreply" data-kode="{{ $ticketreply->id }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>
              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada ticketreply -->
    @else

      <!-- cari ticketreply-->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.ticketreply')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data ticket reply yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua ticketreply -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data ticket reply yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari ticket reply -->

    @endif
    <!-- /data ticket reply -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada ticket reply -->
      @if (count($data))

        <!-- semua ticket reply -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua ticket reply -->

        <div class="btn-group">
          <a href="{{ route('ticketreply.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>

      <!-- tidak ada ticket reply -->
      @else

        <a href="{{ route('ticketreply.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop