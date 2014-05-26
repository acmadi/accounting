@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Pengguna' : 'Rubah Super User' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah Super User' : 'Rubah Super User' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'pengguna.store',
        'method' => 'post',
        'files'  => true
      )) }}
    @else
      {{ Form::model($pengguna, array(
        'route'  => array('pengguna.update', $pengguna->id),
        'method' => 'patch',
        'files'  => true
      )) }}
    @endif

      <div class="form-group {{ ($errors->has('foto') ? 'has-error' : '') }}">
        <label for="foto">Foto</label>
        <input type="file" class="form-control" name="foto" id="foto" placeholder="Masukkan foto anda...">
        <p class="help-block">{{ $errors->first('foto') }}</p>
      </div>

      <div class="form-group {{ ($errors->has('nama') ? 'has-error' : '') }}">
        <label for="nama">Nama Depan</label>
        
        {{ Form::text('nama', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan nama depan...',
          'id'          => 'nama',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('nama') }}</p>
      </div>

      <div class="form-group {{ ($errors->has('nama_belakang') ? 'has-error' : '') }}">
        <label for="nama">Nama Belakang</label>
        
        {{ Form::text('nama_belakang', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan nama belakang...',
          'id'          => 'nama_belakang',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('nama_belakang') }}</p>
      </div>	  
	  
      <div class="form-group {{ ($errors->has('email') ? 'has-error' : '') }}">
        <label for="email">Email</label>
        
        {{ Form::text('email', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan email pengguna...',
          'id'          => 'email',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('email') }}</p>
      </div>

      <div class="form-group {{ ($errors->has('jabatan') ? 'has-error' : '') }}">
        <label for="jabatan">Jabatan</label>

        @if ($tipe == 'buat')
          {{ Form::select('jabatan', array(
            '' => 'Pilih jabatan pengguna',
            '3' => 'Direktur',
            '2' => 'Manajer',
            '1' => 'Karyawan'
            ), '', array(
            'class'       => 'form-control',
            'placeholder' => 'Masukkan jabatan pengguna...',
            'id'          => 'jabatan'
          )) }}
        @else
          {{ Form::select('jabatan', array(
            '' => 'Pilih jabatan pengguna',
            '3' => 'Direktur',
            '2' => 'Manajer',
            '1' => 'Karyawan'
            ), $pengguna->akses, array(
            'class'       => 'form-control',
            'placeholder' => 'Masukkan jabatan pengguna...',
            'id'          => 'jabatan'
          )) }}
        @endif

        <p class="help-block">{{ $errors->first('jabatan') }}</p>
      </div>

      <div class="form-group {{ ($errors->has('username') ? 'has-error' : '') }}">
        <label for="username">Username</label>
        
        {{ Form::text('username', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan username pengguna...',
          'id'          => 'username',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('username') }}</p>
      </div>

      <div class="form-group {{ ($errors->has('password') ? 'has-error' : '') }}">
        <label for="password">Password</label>
        
        {{ Form::password('password', array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan password pengguna...',
          'id'          => 'password'
        )) }}

        <p class="help-block">{{ $errors->first('password') }}</p>
      </div>

      <div class="form-group {{ ($errors->has('alamat') ? 'has-error' : '') }}">
        <label for="alamat">Alamat</label>

        {{ Form::textarea('alamat', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan alamat pengguna...',
          'id'          => 'alamat',
          'maxlength'   => '100',
          'rows'        => '4'
        )) }}

        <p class="help-block">{{ $errors->first('alamat') }}</p>
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