@extends('layout.master')

@section('title')
  All Owner
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">Owner</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada owner -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.owner')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Kode Owner</th>
            <th>Kode Karyawan</th>
            <th>Kode Perusahaan</th>
            <th>Kode Marketing</th>
			<th>Nama Marketing</th>
            <th>Nama Depan</th>
            <th>Nama Belakang</th>
            <th>Handphone</th>
			<th>Npwp</th>
			<th>Status</th>
			
			<th>Aksi</th>

		</tr>

          @foreach ($data as $owner)
            <tr id="baris-{{ $owner->id}}">
              <td>
                {{{ $owner->kd_owner }}}
              </td>
              <td>
                {{{ $owner->kd_karyawan }}}
              </td>
              <td>
                {{{ $owner->kd_perusahaan }}}
              </td>
              <td>
                {{{ $owner->kd_marketing }}}
              </td>
              <td>
                {{{ $owner->nama_depanmarketing }}}
              </td>

              <td>
                {{{ $owner->nama_depan }}}
              </td>
              <td>
                {{{ $owner->nama_belakang }}}
              </td>
              <td>
                {{{ $owner->handphone }}}
              </td>
              <td>
                {{{ $owner->npwp }}}
              </td>
              <td>
                {{{ $owner->status_name }}}
              </td>

              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('owner.edit', array($owner->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('owner.index') }}" data-url="{{ route('owner.destroy', array($owner->id)) }}" data-tipe="owner" data-kode="{{ $owner->id }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>
              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada owner -->
    @else

      <!-- cari owner-->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.owner')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data owner yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua owner -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data owner yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari owner -->

    @endif
    <!-- /data owner -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada owner -->
      @if (count($data))

        <!-- semua owner -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua owner -->

        <div class="btn-group">
          <a href="{{ route('owner.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>

      <!-- tidak ada owner -->
      @else

        <a href="{{ route('owner.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop