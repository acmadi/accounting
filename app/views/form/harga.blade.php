@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Harga' : 'Rubah Harga' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah Harga' : 'Rubah Harga' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'harga.store',
        'method' => 'post',
        'files'  => true
      )) }}
    @else
      {{ Form::model($harga, array(
        'route'  => array('harga.update', $harga->id),
        'method' => 'patch',
        'files'  => true
      )) }}
    @endif



      <div class="form-group {{ ($errors->has('kd_harga') ? 'has-error' : '') }}">
        <label for="nama">Kode Harga</label>
        
        {{ Form::text('kd_harga', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode harga...',
          'id'          => 'kd_harga',
          'maxlength'   => '10'
        )) }}

        <p class="help-block">{{ $errors->first('kd_harga') }}</p>
      </div>	
	
	
      <div class="form-group {{ ($errors->has('nama_harga') ? 'has-error' : '') }}">
        <label for="nama_harga">Nama Harga</label>
        
        {{ Form::text('nama_harga', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan nama harga...',
          'id'          => 'nama_harga',
          'maxlength'   => '100'
        )) }}

        <p class="help-block">{{ $errors->first('nama_harga') }}</p>
      </div>

	  
      <div class="form-group {{ ($errors->has('harga') ? 'has-error' : '') }}">
        <label for="harga">Harga</label>
        
        {{ Form::text('harga', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan harga...',
          'id'          => 'harga',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('harga') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('harga.index') }}"> Back to list Price </a>
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