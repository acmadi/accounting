@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Status' : 'Rubah Status' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah Status' : 'Rubah Status' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'status.store',
        'method' => 'post',
        'files'  => true
      )) }}
    @else
      {{ Form::model($status, array(
        'route'  => array('status.update', $status->id),
        'method' => 'patch',
        'files'  => true
      )) }}
    @endif


      <div class="form-group {{ ($errors->has('id_status') ? 'has-error' : '') }}">
        <label for="id_status">kode status</label>
        
        {{ Form::text('id_status', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode status...',
          'id'          => 'id_status',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('id_status') }}</p>
      </div>	
	

      <div class="form-group {{ ($errors->has('status_name') ? 'has-error' : '') }}">
        <label for="status_name">Status</label>
        
        {{ Form::text('status_name', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan status...',
          'id'          => 'status_name',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('status_name') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('status.index') }}"> Back to list status</a>
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