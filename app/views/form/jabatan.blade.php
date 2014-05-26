@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Jabatan' : 'Rubah Jabatan' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">

  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah Jabatan' : 'Rubah Jabatan' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'jabatan.store',
        'method' => 'post',
        'files'  => true
      )) }}
    @else
      {{ Form::model($jabatan, array(
        'route'  => array('jabatan.update', $jabatan->id),
        'method' => 'patch',
        'files'  => true
      )) }}
    @endif



      <div class="form-group {{ ($errors->has('kd_jab') ? 'has-error' : '') }}">
        <label for="kd_jab">Kode Jabatan</label>
        
        {{ Form::text('kd_jab', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode jabatan...',
          'id'          => 'kd_jab',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('kd_jab') }}</p>
      </div>

	  
      <div class="form-group {{ ($errors->has('nama_jabatan') ? 'has-error' : '') }}">
        <label for="nama_dep">Nama Jabatan</label>
        
        {{ Form::text('nama_jabatan', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan nama jabatan...',
          'id'          => 'nama_jabatan',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('nama_jabatan') }}</p>
      </div>	  
	  
      <div class="form-group {{ ($errors->has('tun_kes') ? 'has-error' : '') }}">
        <label for="nama_dep">Tunjangan Kesehatan</label>
        
        {{ Form::text('tun_kes', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan besar tunjangan kesehatan...',
          'id'          => 'tun_kes',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('tun_kes') }}</p>
      </div>		  

      <div class="form-group {{ ($errors->has('tun_mkn') ? 'has-error' : '') }}">
        <label for="nama_dep">Tunjangan Makan</label>
        
        {{ Form::text('tun_mkn', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan besar tunjangan makan...',
          'id'          => 'tun_mkn',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('tun_mkn') }}</p>
      </div>		  

	  
      <div class="form-group {{ ($errors->has('tun_transport') ? 'has-error' : '') }}">
        <label for="nama_dep">Tunjangan Transport</label>
        
        {{ Form::text('tun_transport', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan besar tunjangan transport...',
          'id'          => 'tun_transport',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('tun_transport') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('jabatan.index') }}"> Back to list Jabatan</a>
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