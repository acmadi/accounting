@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Golongan' : 'Rubah Golongan' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah Golongan' : 'Rubah Golongan' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'golongan.store',
        'method' => 'post',
        'files'  => true
      )) }}
    @else
      {{ Form::model($golongan, array(
        'route'  => array('golongan.update', $golongan->id),
        'method' => 'patch',
        'files'  => true
      )) }}
    @endif


      <div class="form-group {{ ($errors->has('kd_gol') ? 'has-error' : '') }}">
        <label for="nama">Kode Golongan</label>
        
        {{ Form::text('kd_gol', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode golongan...',
          'id'          => 'kd_gol',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('kd_gol') }}</p>
      </div>	
	

      <div class="form-group {{ ($errors->has('gol_pok') ? 'has-error' : '') }}">
        <label for="nama">Nama Golongan</label>
        
        {{ Form::text('gol_pok', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan golongan pokok...',
          'id'          => 'gol_pok',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('gol_pok') }}</p>
      </div>

	  
      <div class="form-group {{ ($errors->has('tun_jab') ? 'has-error' : '') }}">
        <label for="nama">Tunjangan Jabatan</label>
        
        {{ Form::text('tun_jab', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan tunjangan jabatan...',
          'id'          => 'tun_jab',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('tun_jab') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('golongan.index') }}"> Back to list Golongan</a>
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