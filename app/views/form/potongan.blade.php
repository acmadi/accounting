@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Harga' : 'Rubah potongan' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah Potongan' : 'Rubah potongan' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'potongan.store',
        'method' => 'post',
        'files'  => true
      )) }}
    @else
      {{ Form::model($potongan, array(
        'route'  => array('potongan.update', $potongan->id),
        'method' => 'patch',
        'files'  => true
      )) }}
    @endif



      <div class="form-group {{ ($errors->has('kd_potongan') ? 'has-error' : '') }}">
        <label for="nama_potongan">Kode Potongan</label>
        
        {{ Form::text('kd_potongan', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode potongan...',
          'id'          => 'kd_potongan',
          'maxlength'   => '10'
        )) }}

        <p class="help-block">{{ $errors->first('kd_potongan') }}</p>
      </div>	
	
	
      <div class="form-group {{ ($errors->has('nama_potongan') ? 'has-error' : '') }}">
        <label for="nama_potongan">Nama Potongan</label>
        
        {{ Form::text('nama_potongan', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan nama potongan...',
          'id'          => 'nama_potongan',
          'maxlength'   => '100'
        )) }}

        <p class="help-block">{{ $errors->first('nama_potongan') }}</p>
      </div>

	  


  </div>
  <!-- /.panel-body -->
  
  <!-- .panel-footer -->
  <div class="panel-footer">

      <!-- pesan sukses / gagal -->
      @if (Session::has('status'))
        <div class="alert alert-{{ Session::get('status') == 'gagal' ? 'danger' : 'info'}}">
          <p>
            <strong>{{ ucwords(Session::get('status')) }}!</strong>
            {{ Session::get('pesan') }}
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('potongan.index') }}"> Back to list Potongan </a>
          </p>
        </div>
      @endif
      <!-- /pesan sukses / gagal -->

      <div class="text-right">
        <button type="submit" class="btn btn-primary">
          <span class="glyphicon glyphicon-ok"></span> Simpan
        </button>
        <button type="reset" class="btn btn-default">
          <span class="glyphicon glyphicon-remove"></span> Batal
        </button>
      </div>

    </form>

  </div>
  <!-- /.panel-footer -->

</div>
<!-- /.panel -->
@stop