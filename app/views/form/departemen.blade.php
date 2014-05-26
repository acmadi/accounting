@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Departemen' : 'Rubah Departemen' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah Departemen' : 'Rubah Departemen' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'departemen.store',
        'method' => 'post',
        'files'  => true
      )) }}
    @else
      {{ Form::model($departemen, array(
        'route'  => array('departemen.update', $departemen->id),
        'method' => 'patch',
        'files'  => true
      )) }}
    @endif


      <div class="form-group {{ ($errors->has('kd_dep') ? 'has-error' : '') }}">
        <label for="nama">Kode Departemen</label>
        
        {{ Form::text('kd_dep', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode departemen...',
          'id'          => 'kd_dep',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('kd_dep') }}</p>
      </div>	
	

      <div class="form-group {{ ($errors->has('nama_dep') ? 'has-error' : '') }}">
        <label for="nama">Nama Departemen</label>
        
        {{ Form::text('nama_dep', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan nama departemen...',
          'id'          => 'nama_dep',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('nama_dep') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('departemen.index') }}"> Back to list Departemen </a>
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