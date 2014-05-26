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

    @if ($tipe == 'tampil')
      {{ Form::open(array(
        'route'  => 'tampil',
        'method' => 'post',
        'files'  => true
      )) }}
	@endif
  
  
    <!-- ada pengguna -->

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


            <tr>
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
                {{{ $pengguna->alamat }}}
              </td>
              <td>
                {{{ $pengguna->username }}}
              </td>
			  
              <td>

              </td>
            </tr>
         
        </table>
      </div>


  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">


  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop