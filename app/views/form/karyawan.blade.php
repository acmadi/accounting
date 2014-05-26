@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Karyawan' : 'Rubah karyawan' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">


  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah karyawan' : 'Rubah karyawan' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'karyawan.store',
        'method' => 'post'
      )) }}
    @else
      {{ Form::model($karyawan, array(
        'route'  => array('karyawan.update', $karyawan->id),
        'method' => 'patch'
      )) }}
    @endif

	
      <div class="form-group {{ ($errors->has('kd_agama') ? 'has-error' : '') }}">
        <label for="kd_agama">Kode Agama</label>

        <select name="kd_agama" id="kd_agama" class="form-control">
          <option value=""></option>
          @foreach ($agama as $data)
            @if ($tipe == 'buat')
              <option value="{{ $data->kd_agama }}">{{ $data->kd_agama }}</option>
            @else
              <option value="{{ $data->kd_agama }}" {{ ($data->kd_agama == $karyawan->kd_agama ? 'selected' : '') }}>{{ $data->kd_agama }}</option>
              }
            @endif
          @endforeach
        </select>

        <p class="help-block">{{ $errors->first('kd_agama') }}</p>
      </div>



      <div class="form-group {{ ($errors->has('kd_dep') ? 'has-error' : '') }}">
        <label for="kode_barang">Kode Departemen</label>

        <select name="kd_dep" id="kd_dep" class="form-control">
          <option value=""></option>
          @foreach ($departemen as $data)
            @if ($tipe == 'buat')
              <option value="{{ $data->kd_dep }}">{{ $data->kd_dep }}</option>
            @else
              <option value="{{ $data->kd_dep }}" {{ ($data->kd_dep == $karyawan->kd_dep ? 'selected' : '') }}>{{ $data->kd_dep }}</option>
            @endif

          @endforeach
        </select>

        <p class="help-block">{{ $errors->first('kd_dep') }}</p>
      </div>

	  
      <div class="form-group {{ ($errors->has('kd_jab') ? 'has-error' : '') }}">
        <label for="kd_jab">Kode Jabatan</label>

        <select name="kd_jab" id="kd_jab" class="form-control">
          <option value=""></option>

          @foreach ($jabatan as $data)

            @if ($tipe == 'buat')
              <option value="{{ $data->kd_jab }}">{{ $data->kd_jab }}</option>
            @else
              <option value="{{ $data->kd_jab }}" {{ ($data->kd_jab == $karyawan->kd_jab ? 'selected' : '') }}>{{ $data->kd_jab }}</option>
            @endif
          @endforeach

        </select>

        <p class="help-block">{{ $errors->first('kd_jab') }}</p>
      </div>


      <div class="form-group {{ ($errors->has('kd_gol') ? 'has-error' : '') }}">
        <label for="kd_gol">Kode Golongan</label>

        <select name="kd_gol" id="kd_gol" class="form-control">
          <option value=""></option>
          @foreach ($golongan as $data)
            @if ($tipe == 'buat')
              <option value="{{ $data->kd_gol }}">{{ $data->kd_gol }}</option>
            @else
              <option value="{{ $data->kd_gol }}" {{ ($data->kd_gol == $karyawan->kd_gol ? 'selected' : '') }}>{{ $data->kd_gol }}</option>
            @endif
          @endforeach
        </select>

        <p class="help-block">{{ $errors->first('kd_gol') }}</p>
      </div>
	  


      <div class="form-group {{ ($errors->has('kd_statuskawin') ? 'has-error' : '') }}">
        <label for="kd_statuskawin">Kode Status Kawin</label>
        <select name="kd_statuskawin" id="kd_statuskawin" class="form-control">
          <option value=""></option>
          @foreach ($ptkp as $data)
            @if ($tipe == 'buat')
              <option value="{{ $data->kd_statuskawin }}">{{ $data->kd_statuskawin }}</option>
            @else
              <option value="{{ $data->kd_statuskawin }}" {{ ($data->kd_statuskawin == $karyawan->kd_statuskawin ? 'selected' : '') }}>{{ $data->kd_statuskawin }}</option>
            @endif
          @endforeach
        </select>

        <p class="help-block">{{ $errors->first('kd_statuskawin') }}</p>
      </div>
	  

      <div class="form-group {{ ($errors->has('kd_karyawan') ? 'has-error' : '') }}">
        <label for="kd_karyawan">Kode Karyawan</label>

        {{ Form::text('kd_karyawan', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode karyawan...',
          'id'          => 'kd_karyawan',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('kd_karyawan') }}</p>
      </div>	  
	  
	  

      <div class="form-group {{ ($errors->has('nik') ? 'has-error' : '') }}">
        <label for="jumlah">NIK</label>

        {{ Form::text('nik', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan nik...',
          'id'          => 'nik',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('nik') }}</p>
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
	  

      <div class="form-group {{ ($errors->has('jen_kel') ? 'has-error' : '') }}">
        <label for="jen_kel">Jenis Kelamin</label>

        {{ Form::text('jen_kel', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan jenis kelamin...',
          'id'          => 'jen_kel',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('jen_kel') }}</p>
      </div>	  


      <div class="form-group {{ ($errors->has('tempat_lahir') ? 'has-error' : '') }}">
        <label for="tempat_lahir">tempat lahir</label>

        {{ Form::text('tempat_lahir', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan tempat lahir...',
          'id'          => 'tempat_lahir',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('tempat_lahir') }}</p>
      </div>	  

	  
      <div class="form-group {{ ($errors->has('tgl_lahir') ? 'has-error' : '') }}">
        <label for="tgl_lahir">tanggal lahir</label>

        {{ Form::text('tgl_lahir', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan tgl lahir...',
          'id'          => 'tgl_lahir',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('tgl_lahir') }}</p>
      </div>	  


      <div class="form-group {{ ($errors->has('pendidikan') ? 'has-error' : '') }}">
        <label for="pendidikan">pendidikan</label>

        {{ Form::text('pendidikan', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan pendidikan...',
          'id'          => 'pendidikan',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('pendidikan') }}</p>
      </div>	  

	  
      <div class="form-group {{ ($errors->has('tgl_masuk') ? 'has-error' : '') }}">
        <label for="tgl_masuk">tgl masuk</label>

        {{ Form::text('tgl_masuk', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan tgl masuk...',
          'id'          => 'tgl_masuk',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('tgl_masuk') }}</p>
      </div>		  

	  
      <div class="form-group {{ ($errors->has('tgl_keluar') ? 'has-error' : '') }}">
        <label for="tgl_keluar">tgl keluar</label>

        {{ Form::text('tgl_keluar', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan tgl keluar...',
          'id'          => 'tgl_keluar',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('tgl_keluar') }}</p>
      </div>

	  
      <div class="form-group {{ ($errors->has('alamat') ? 'has-error' : '') }}">
        <label for="alamat">alamat</label>

        {{ Form::text('alamat', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan alamat...',
          'id'          => 'alamat',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('alamat') }}</p>
      </div>
	  
	  
      <div class="form-group {{ ($errors->has('desa') ? 'has-error' : '') }}">
        <label for="desa">desa</label>

        {{ Form::text('desa', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan desa...',
          'id'          => 'desa',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('desa') }}</p>
      </div>	  
	  

      <div class="form-group {{ ($errors->has('kota') ? 'has-error' : '') }}">
        <label for="kota">kota</label>

        {{ Form::text('kota', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kota...',
          'id'          => 'kota',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('kota') }}</p>
      </div>

	  
      <div class="form-group {{ ($errors->has('propinsi') ? 'has-error' : '') }}">
        <label for="propinsi">propinsi</label>

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
          'placeholder' => 'Masukkan kode pos...',
          'id'          => 'kode_pos',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('kode_pos') }}</p>
      </div>	  
	
	
      <div class="form-group {{ ($errors->has('no_telephone') ? 'has-error' : '') }}">
        <label for="no_telephone">no telephone</label>

        {{ Form::text('no_telephone', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan no telephone...',
          'id'          => 'no_telephone',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('no_telephone') }}</p>
      </div>

	  
      <div class="form-group {{ ($errors->has('no_handphone') ? 'has-error' : '') }}">
        <label for="no_handphone">no handphone</label>

        {{ Form::text('no_handphone', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan no handphone...',
          'id'          => 'no_handphone',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('no_handphone') }}</p>
      </div>


      <div class="form-group {{ ($errors->has('email') ? 'has-error' : '') }}">
        <label for="email">email </label>

        {{ Form::text('email', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan email...',
          'id'          => 'email',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('email') }}</p>
      </div>

	  
      <div class="form-group {{ ($errors->has('npwp') ? 'has-error' : '') }}">
        <label for="npwp">npwp </label>

        {{ Form::text('npwp', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan npwp...',
          'id'          => 'npwp',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('npwp') }}</p>
      </div>
	
      <div class="form-group {{ ($errors->has('foto') ? 'has-error' : '') }}">
        <label for="foto">Foto</label>
        <input type="file" class="form-control" name="foto" id="foto" placeholder="Masukkan foto anda...">
        <p class="help-block">{{ $errors->first('foto') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('karyawan.index') }}"> Back to list karyawan </a>
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