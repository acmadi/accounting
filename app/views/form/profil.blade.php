@extends('layout.master')

@section('title')
  Pengaturan Profil
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">Pengaturan Profil</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <form role="form" action="{{ route('profil') }}" method="post" enctype="multipart/form-data">

      <!-- info profil -->
      <fieldset class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <legend>Info Profil</legend>

        <div class="form-group {{ ($errors->has('foto') ? 'has-error' : '') }}">
          <label for="foto">Foto</label>
          <input type="file" class="form-control" name="foto" id="foto" placeholder="Masukkan foto anda...">
          <p class="help-block">{{ $errors->first('foto') }}</p>
        </div>

        <div class="form-group {{ ($errors->has('nama') ? 'has-error' : '') }}">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama anda..." value="{{ Auth::user()->nama }}">
          <p class="help-block">{{ $errors->first('nama') }}</p>
        </div>

        <div class="form-group {{ ($errors->has('email') ? 'has-error' : '') }}">
          <label for="email">Email</label>
          <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan email anda..." value="{{ Auth::user()->email }}">
          <p class="help-block">{{ $errors->first('email') }}</p>
        </div>

        <div class="form-group {{ ($errors->has('jabatan') ? 'has-error' : '') }}">
          <label for="jabatan">Jabatan</label>
          <select class="form-control" id="jabatan" name="jabatan">
            <option value="">Pilih jabatan pengguna</option>
            <option value="3" {{ (Auth::user()->akses == 3 ? 'selected' : '') }}>Direktur</option>
            <option value="2" {{ (Auth::user()->akses == 2 ? 'selected' : '') }}>Manajer</option>
            <option value="1" {{ (Auth::user()->akses == 1 ? 'selected' : '') }}>Karyawan</option>
          </select>
          <p class="help-block">{{ $errors->first('jabatan') }}</p>
        </div>

        <div class="form-group {{ ($errors->has('alamat') ? 'has-error' : '') }}">
          <label for="alamat">Alamat</label>
          <textarea class="form-control" name="alamat" id="alamat" rows="4" placeholder="Masukkan alamat anda...">{{ Auth::user()->alamat }}</textarea>
          <p class="help-block">{{ $errors->first('alamat') }}</p>
        </div>
      </fieldset>
      <!-- /info profil -->

      <!-- info login -->
      <fieldset class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <legend>Info Login</legend>

        <div class="form-group {{ ($errors->has('username') ? 'has-error' : '') }}">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username anda...">
          <p class="help-block">{{ $errors->first('username') }}</p>
        </div>

        <div class="form-group {{ ($errors->has('password') ? 'has-error' : '') }}">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password anda...">
          <p class="help-block">{{ $errors->first('password') }}</p>
        </div>
      </fieldset>
      <!-- /info login -->

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