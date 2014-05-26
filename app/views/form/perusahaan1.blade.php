@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Perusahaan' : 'Rubah Perusahaan' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah Perusahaan' : 'Rubah Perusahaan' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'perusahaan1.store',
        'method' => 'post',
        'files'  => true
      )) }}
    @else
      {{ Form::model($perusahaan1, array(
        'route'  => array('perusahaan1.update', $perusahaan1->id),
        'method' => 'patch',
        'files'  => true
      )) }}
    @endif


      <div class="form-group {{ ($errors->has('kd_perusahaan') ? 'has-error' : '') }}">
        <label for="nama">Kode Perusahaan</label>
        
        {{ Form::text('kd_perusahaan', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode perusahaan...',
          'id'          => 'kd_perusahaan',
          'maxlength'   => '10'
        )) }}

        <p class="help-block">{{ $errors->first('kd_perusahaan') }}</p>
      </div>	
	

      <div class="form-group {{ ($errors->has('nama_perusahaan') ? 'has-error' : '') }}">
        <label for="nama">Nama Perusahaan</label>
        
        {{ Form::text('nama_perusahaan', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan nama perusahaan...',
          'id'          => 'nama_perusahaan',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('nama_perusahaan') }}</p>
      </div>

	  
      <div class="form-group {{ ($errors->has('alamat') ? 'has-error' : '') }}">
        <label for="nama">Alamat</label>
        
        {{ Form::text('alamat', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan alamat...',
          'id'          => 'alamat',
          'maxlength'   => '200'
        )) }}

        <p class="help-block">{{ $errors->first('alamat') }}</p>
      </div>	  
	  
	  
      <div class="form-group {{ ($errors->has('kota') ? 'has-error' : '') }}">
        <label for="nama">Kota</label>
        
        {{ Form::text('kota', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kota...',
          'id'          => 'kota',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('kota') }}</p>
      </div>	 
	  

      <div class="form-group {{ ($errors->has('propinsi') ? 'has-error' : '') }}">
        <label for="nama">Propinsi</label>
        
        {{ Form::text('propinsi', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan propinsi...',
          'id'          => 'propinsi',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('propinsi') }}</p>
      </div>	 
	  
	  
      <div class="form-group {{ ($errors->has('kode_pos') ? 'has-error' : '') }}">
        <label for="nama">Kode Pos</label>
        
        {{ Form::text('kode_pos', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan Kode pos...',
          'id'          => 'kode_pos',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('kode_pos') }}</p>
      </div>	 
	  
	  
      <div class="form-group {{ ($errors->has('handphone') ? 'has-error' : '') }}">
        <label for="nama">Handphone</label>
        
        {{ Form::text('handphone', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan handphone...',
          'id'          => 'handphone',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('handphone') }}</p>
      </div>	 


      <div class="form-group {{ ($errors->has('telephone') ? 'has-error' : '') }}">
        <label for="nama">telephone</label>
        
        {{ Form::text('telephone', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan telephone...',
          'id'          => 'telephone',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('telephone') }}</p>
      </div>


      <div class="form-group {{ ($errors->has('fax') ? 'has-error' : '') }}">
        <label for="nama">fax</label>
        
        {{ Form::text('fax', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan fax...',
          'id'          => 'fax',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('fax') }}</p>
      </div>	  


	    <div class="form-group {{ ($errors->has('email') ? 'has-error' : '') }}">
        <label for="nama">email</label>
        
        {{ Form::text('email', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan email...',
          'id'          => 'email',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('email') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('perusahaan1.index') }}"> Back to list Perusahaan</a>
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