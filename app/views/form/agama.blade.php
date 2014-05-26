@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Agama' : 'Rubah Agama' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah Agama' : 'Rubah Agama' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'agama.store',
        'method' => 'post',
        'files'  => true
      )) }}
    @else
      {{ Form::model($agama, array(
        'route'  => array('agama.update', $agama->id),
        'method' => 'patch',
        'files'  => true
      )) }}
    @endif



      <div class="form-group {{ ($errors->has('kd_agama') ? 'has-error' : '') }}">
        <label for="nama">Kode Agama</label>
        
        {{ Form::text('kd_agama', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode agama...',
          'id'          => 'kd_agama',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('kd_agama') }}</p>
      </div>	
	
	
      <div class="form-group {{ ($errors->has('nama') ? 'has-error' : '') }}">
        <label for="nama">Nama Agama</label>
        
        {{ Form::text('nama', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan nama agama...',
          'id'          => 'nama',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('nama') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('agama.index') }}"> Back to list religion </a>
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