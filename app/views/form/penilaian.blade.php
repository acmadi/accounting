@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Penilaian' : 'Rubah Penilaian' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">


  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah Penilaian' : 'Rubah Penilaian' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'penilaian.store',
        'method' => 'post'
      )) }}
    @else
      {{ Form::model($penilaian, array(
        'route'  => array('penilaian.update', $penilaian->id),
        'method' => 'patch'
      )) }}
    @endif

      <div class="form-group {{ ($errors->has('kd_absen') ? 'has-error' : '') }}">
        <label for="kd_absen">Kode Absen</label>

        <select name="kd_absen" id="kd_absen" class="form-control">
          <option value=""></option>
          @foreach ($absensi as $data)
            @if ($tipe == 'buat')
              <option value="{{ $data->kd_absen }}">{{ $data->kd_absen}}</option>
            @else
              <option value="{{ $data->kd_absen }}" {{ ($data->kd_absen == $penilaian->kd_absen ? 'selected' : '') }}>{{ $data->kd_absen }}</option>
              }
            @endif
          @endforeach
        </select>

        <p class="help-block">{{ $errors->first('kd_absen') }}</p>
      </div>

	  	  

      <div class="form-group {{ ($errors->has('kd_penilaian') ? 'has-error' : '') }}">
        <label for="kd_penilaian">Kode Penilaian</label>

        {{ Form::text('kd_penilaian', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode penilaian...',
          'id'          => 'kd_penilaian',
          'maxlength'   => '10'
        )) }}

        <p class="help-block">{{ $errors->first('kd_penilaian') }}</p>
      </div>	  
	  
	  

      <div class="form-group {{ ($errors->has('kinerja') ? 'has-error' : '') }}">
        <label for="kinerja">Kinerja</label>

        {{ Form::text('kinerja', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan Kinerja..',
          'id'          => 'kinerja',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('kinerja') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('penilaian.index') }}"> Back to list penilaian </a>
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