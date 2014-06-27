@extends('layout.master')

@section('title')
  All Support ticket
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">Support ticket</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada support ticket -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.supportticket')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Kode ticket</th>
            <th>Kode marketing</th>
            <th>Nama Ticket</th>
            <th>Keterangan</th>
			<th>Jenis Ticket</th>
			<th>Status Ticket</th>
			<th>Aksi</th>

		</tr>

          @foreach ($data as $supportticket)
            <tr id="baris-{{ $supportticket->id}}">
              <td>
                {{{ $supportticket->kd_ticket }}}
              </td>
              <td>
                {{{ $supportticket->kd_marketing }}}
              </td>
			  <td>
                {{{ $supportticket->nama_ticket }}}
              </td>
              <td>
                {{{ $supportticket->keterangan }}}
              </td>

              <td>
                {{{ $supportticket->jenis_ticket }}}
              </td>
              <td>
                {{{ $supportticket->status_ticket }}}
              </td>

              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('supportticket.edit', array($supportticket->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
				  
				  
				<a href="#" class="btn btn-primary ikon foto" title="Lampiran" data-nama="{{{ $supportticket->kd_ticket }}}" data-foto="{{{ ($supportticket->lampiran) ?: 'users.png' }}}">
                    <span class="glyphicon glyphicon-camera"></span>
                </a>				  
				  
				  
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('supportticket.index') }}" data-url="{{ route('supportticket.destroy', array($supportticket->id)) }}" data-tipe="supportticket" data-kode="{{ $supportticket->id }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>
              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada support ticket -->
    @else

      <!-- cari support ticket-->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.supportticket')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data support ticket yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua support ticket -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data support ticket yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari support ticket -->

    @endif
    <!-- /data support ticket -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada support ticket -->
      @if (count($data))

        <!-- semua support ticket -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua support ticket -->

        <div class="btn-group">
          <a href="{{ route('supportticket.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>

      <!-- tidak ada support ticket -->
      @else

        <a href="{{ route('supportticket.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop