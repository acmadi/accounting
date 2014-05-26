@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Owner' : 'Rubah Owner' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">


  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah owner' : 'Rubah owner' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'owner.store',
        'method' => 'post'
      )) }}
    @else
      {{ Form::model($owner, array(
        'route'  => array('owner.update', $owner->id),
        'method' => 'patch'
      )) }}
    @endif

      <div class="form-group {{ ($errors->has('kd_karyawan') ? 'has-error' : '') }}">
        <label for="kd_agama">Kode Karyawan</label>

        <select name="kd_karyawan" id="kd_karyawan" class="form-control">
          <option value=""></option>
          @foreach ($karyawan as $data)
            @if ($tipe == 'buat')
              <option value="{{ $data->kd_karyawan }}">{{ $data->kd_karyawan }}</option>
            @else
              <option value="{{ $data->kd_karyawan }}" {{ ($data->kd_karyawan == $owner->kd_karyawan ? 'selected' : '') }}>{{ $data->kd_karyawan }}</option>
              }
            @endif
          @endforeach
        </select>

        <p class="help-block">{{ $errors->first('kd_karyawan') }}</p>
      </div>



      <div class="form-group {{ ($errors->has('kd_perusahaan') ? 'has-error' : '') }}">
        <label for="kode_perusahaan">Kode Perusahaan</label>

        <select name="kd_perusahaan" id="kd_perusahaan" class="form-control">
          <option value=""></option>
          @foreach ($perusahaan1 as $data)
            @if ($tipe == 'buat')
              <option value="{{ $data->kd_perusahaan }}">{{ $data->kd_perusahaan }}</option>
            @else
              <option value="{{ $data->kd_perusahaan }}" {{ ($data->kd_perusahaan == $owner->kd_perusahaan ? 'selected' : '') }}>{{ $data->kd_perusahaan }}</option>
            @endif

          @endforeach
        </select>

        <p class="help-block">{{ $errors->first('kd_perusahaan') }}</p>
      </div>

	  
      <div class="form-group {{ ($errors->has('kd_marketing') ? 'has-error' : '') }}">
        <label for="kd_marketing">Kode Marketing</label>

        <select name="kd_marketing" id="kd_marketing" class="form-control">
          <option value=""></option>

          @foreach ($marketing as $data)

            @if ($tipe == 'buat')
              <option value="{{ $data->kd_marketing }}">{{ $data->kd_marketing }}</option>
            @else
              <option value="{{ $data->kd_marketing }}" {{ ($data->kd_marketing == $owner->kd_marketing ? 'selected' : '') }}>{{ $data->kd_marketing }}</option>
            @endif
          @endforeach

        </select>

        <p class="help-block">{{ $errors->first('kd_marketing') }}</p>
      </div>

	  	  

      <div class="form-group {{ ($errors->has('kd_owner') ? 'has-error' : '') }}">
        <label for="kd_owner">Kode Owner</label>

        {{ Form::text('kd_owner', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode owner...',
          'id'          => 'kd_owner',
          'maxlength'   => '10'
        )) }}

        <p class="help-block">{{ $errors->first('kd_owner') }}</p>
      </div>	  
	  
	  

      <div class="form-group {{ ($errors->has('username') ? 'has-error' : '') }}">
        <label for="username">Username</label>

        {{ Form::text('username', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan username...',
          'id'          => 'username',
          'maxlength'   => '30'
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
	  

	  
      <div class="form-group {{ ($errors->has('nama_depan') ? 'has-error' : '') }}">
        <label for="nama_depan">Nama Depan</label>

        {{ Form::text('nama_depan', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan nama depan...',
          'id'          => 'nama_depan',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('nama_depan') }}</p>
      </div>	  
	  
	  
	  
      <div class="form-group {{ ($errors->has('nama_belakang') ? 'has-error' : '') }}">
        <label for="nama_belakang">Nama Belakang</label>

        {{ Form::text('nama_belakang', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan nama belakang...',
          'id'          => 'nama_belakang',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('nama_belakang') }}</p>
      </div>	  
	  

      <div class="form-group {{ ($errors->has('handphone') ? 'has-error' : '') }}">
        <label for="handphone">Handphone</label>

        {{ Form::text('handphone', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan handphone...',
          'id'          => 'handphone',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('handphone') }}</p>
      </div>	  


      <div class="form-group {{ ($errors->has('npwp') ? 'has-error' : '') }}">
        <label for="npwp">NPWP</label>

        {{ Form::text('npwp', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan NPWP...',
          'id'          => 'npwp',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('npwp') }}</p>
      </div>	  

	  
      <div class="form-group {{ ($errors->has('alamat') ? 'has-error' : '') }}">
        <label for="alamat">Alamat</label>

        {{ Form::text('alamat', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan alamat...',
          'id'          => 'alamat',
          'maxlength'   => '200'
        )) }}

        <p class="help-block">{{ $errors->first('alamat') }}</p>
      </div>	  


      <div class="form-group {{ ($errors->has('Kota') ? 'has-error' : '') }}">
        <label for="kota">Kota</label>

        {{ Form::text('kota', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kota...',
          'id'          => 'kota',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('kota') }}</p>
      </div>	  

	  
      <div class="form-group {{ ($errors->has('propinsi') ? 'has-error' : '') }}">
        <label for="Propinsi">Propinsi</label>

        {{ Form::text('propinsi', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan propinsi...',
          'id'          => 'propinsi',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('propinsi') }}</p>
      </div>		  

	  
      <div class="form-group {{ ($errors->has('kode_pos') ? 'has-error' : '') }}">
        <label for="kode_pos">kode pos</label>

        {{ Form::text('kode_pos', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode_pos...',
          'id'          => 'kode_pos',
          'maxlength'   => '10'
        )) }}

        <p class="help-block">{{ $errors->first('kode_pos') }}</p>
      </div>

	  
      <div class="form-group {{ ($errors->has('email') ? 'has-error' : '') }}">
        <label for="email">email</label>

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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('owner.index') }}"> Back to list Owner </a>
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