@extends('layout.master')

@section('title')
  Pengaturan Perusahaan
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">Pengaturan Perusahaan</div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    <form role="form" action="{{ route('perusahaan') }}" method="post" enctype="multipart/form-data">

      <div class="form-group {{ ($errors->has('logo') ? 'has-error' : '') }}">
        <label for="logo">Logo</label>
        <input type="file" class="form-control" name="logo" id="logo">
        <p class="help-block">{{ $errors->first('logo') }}</p>
      </div>

      <div class="form-group {{ ($errors->has('nama') ? 'has-error' : '') }}">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama perusahaan..." value="{{ $data->nama }}">
        <p class="help-block">{{ $errors->first('nama') }}</p>
      </div>

      <div class="form-group {{ ($errors->has('alamat') ? 'has-error' : '') }}">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" name="alamat" id="alamat" rows="4" placeholder="Masukkan alamat perusahaan...">{{ $data->alamat }}</textarea>
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