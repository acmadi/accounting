@extends('layout.master')

@section('title')
  Data Marketing
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">

  <div class="panel-heading">Data Marketing</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <!-- ada marketing -->
    @if (count($data))

      <!-- form inline -->
      @include ('inline.marketing')

      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Kode Marketing</th>
			<th>Nama Depan</th>
			<th>Nama Belakang</th>
			<th>Username</th>
			<th>Email</th>
			<th>No HP</th>
			<th>Alamat</th>
			<th>Kota</th>
			<th>Propinsi</th>
			<th>Kode Pos</th>
            <th>Aksi</th>
          </tr>

          @foreach ($data as $marketing)
            <tr id="baris-{{ $marketing->id}}">
              <td>
                {{{ $marketing->kd_marketing }}}	
              </td>
			  <td>
				{{{ $marketing->nama_depan }}}
			  </td>
			  <td>
				{{{ $marketing->nama_belakang }}}
			  </td>
			  <td>
				{{{ $marketing->username }}}
			  </td>
			  <td>
				{{{ $marketing->email }}}
			  </td>
			  <td>
				{{{ $marketing->no_hp }}}
			  </td>
			  <td>
				{{{ $marketing->alamat }}}
			  </td>
			  <td>
				{{{ $marketing->kota }}}
			  </td>
			  <td>
				{{{ $marketing->propinsi }}}
			  </td>			  
			  <td>
				{{{ $marketing->kode_pos }}}
			  </td>

			  
              <td>
                <div class="btn-group btn-group-xs">
                  <a href="{{ route('marketing.edit', array($marketing->id)) }}" class="btn btn-primary ikon" title="Rubah">
                    <span class="glyphicon glyphicon-pencil"></span>
                  </a>
				  
                  <a class="btn btn-primary ikon tombol-modal" title="Hapus" data-back="{{ route('marketing.index') }}" data-url="{{ route('marketing.destroy', array($marketing->id)) }}" data-tipe="marketing" data-kode="{{ $marketing->kd_marketing }}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </div>

              </td>
            </tr>
          @endforeach
        </table>
      </div>

    <!-- tidak ada marketing -->
    @else

      <!-- cari marketing -->
      @if ($tipe == 'cari')

        <!-- form inline -->
        @include ('inline.marketing')

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Tidak ada data marketing yang cocok dengan pencarian anda.
          </p>
        </div>

      <!-- semua marketing -->
      @else

        <div class="alert alert-warning">
          <p>
            <strong>Peringatan!</strong>
            Belum ada data marketing yang tersimpan di basis data.
          </p>
        </div>

      @endif
      <!-- /cari marketing -->

    @endif
    <!-- /data marketing -->

  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

    <div class="center-block text-center">
      <!-- ada marketing -->
      @if (count($data))

        <!-- semua marketing -->
        @if ($tipe == 'semua')

          {{ $data->links() }}
          
        @endif
        <!-- /semua marketing -->

        <div class="btn-group">
          <a href="{{ route('marketing.create') }}" class="btn btn-primary ikon" title="Tambah">
            <span class="glyphicon glyphicon-plus"></span>
          </a>
        </div>
        
      <!-- tidak ada marketing -->
      @else

        <a href="{{ route('marketing.create') }}" class="btn btn-primary ikon" title="Tambah">
          <span class="glyphicon glyphicon-plus"></span>
        </a>

      @endif
    </div>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop