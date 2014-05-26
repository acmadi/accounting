@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Marketing' : 'Rubah Marketing' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">

  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah Marketing' : 'Rubah Marketing' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'marketing.store',
        'method' => 'post',
        'files'  => true
      )) }}
    @else
      {{ Form::model($marketing, array(
        'route'  => array('marketing.update', $marketing->id),
        'method' => 'patch',
        'files'  => true
      )) }}
    @endif



      <div class="form-group {{ ($errors->has('kd_marketing') ? 'has-error' : '') }}">
        <label for="kd_jab">Kode Marketing</label>
        
        {{ Form::text('kd_marketing', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode marketing...',
          'id'          => 'kd_marketing',
          'maxlength'   => '10'
        )) }}

        <p class="help-block">{{ $errors->first('kd_marketing') }}</p>
      </div>

	  
      <div class="form-group {{ ($errors->has('nama_depan') ? 'has-error' : '') }}">
        <label for="nama_dep">Nama Depan</label>
        
        {{ Form::text('nama_depan', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan nama depan...',
          'id'          => 'nama_depan',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('nama_depan') }}</p>
      </div>	  
	  
      <div class="form-group {{ ($errors->has('nama_belakang') ? 'has-error' : '') }}">
        <label for="nama_dep">Nama Belakang</label>
        
        {{ Form::text('nama_belakang', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan nama_belakang...',
          'id'          => 'nama_belakang',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('nama_belakang') }}</p>
      </div>		  

      <div class="form-group {{ ($errors->has('username') ? 'has-error' : '') }}">
        <label for="nama_dep">Username</label>
        
        {{ Form::text('username', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan username...',
          'id'          => 'username',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('username') }}</p>
      </div>		  

	  
      <div class="form-group {{ ($errors->has('password') ? 'has-error' : '') }}">
        <label for="password">Password</label>
        
        {{ Form::password('password', array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan password...',
          'id'          => 'password'
        )) }}

        <p class="help-block">{{ $errors->first('password') }}</p>
      </div>	

	  
      <div class="form-group {{ ($errors->has('email') ? 'has-error' : '') }}">
        <label for="nama_dep">Email</label>
        
        {{ Form::text('email', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan email...',
          'id'          => 'email',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('email') }}</p>
      </div>		  
	  

      <div class="form-group {{ ($errors->has('no_hp') ? 'has-error' : '') }}">
        <label for="nama_dep">No Hp</label>
        
        {{ Form::text('no_hp', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan Nomer HP...',
          'id'          => 'no_hp',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('no_hp') }}</p>
      </div>	
	  
	  
      <div class="form-group {{ ($errors->has('alamat') ? 'has-error' : '') }}">
        <label for="nama_dep">Alamat</label>
        
        {{ Form::text('alamat', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan Alamat...',
          'id'          => 'alamat',
          'maxlength'   => '200'
        )) }}

        <p class="help-block">{{ $errors->first('alamat') }}</p>
      </div>
	  
	  
      <div class="form-group {{ ($errors->has('kota') ? 'has-error' : '') }}">
        <label for="nama_dep">Kota</label>
        
        {{ Form::text('kota', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kota...',
          'id'          => 'kota',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('kota') }}</p>
      </div>
	  
	  
      <div class="form-group {{ ($errors->has('propinsi') ? 'has-error' : '') }}">
        <label for="nama_dep">Propinsi</label>
        
        {{ Form::text('propinsi', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan propinsi...',
          'id'          => 'propinsi',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('propinsi') }}</p>
      </div>
	  
	  
      <div class="form-group {{ ($errors->has('kode_pos') ? 'has-error' : '') }}">
        <label for="nama_dep">Kode Pos</label>
        
        {{ Form::text('kode_pos', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode pos...',
          'id'          => 'kode_pos',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('kode_pos') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('marketing.index') }}"> Back to list Marketing</a>
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