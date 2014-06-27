@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Absensi' : 'Rubah Absensi' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">


  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah Absensi' : 'Rubah Absensi' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'absensi.store',
        'method' => 'post'
      )) }}
    @else
      {{ Form::model($absensi, array(
        'route'  => array('absensi.update', $absensi->id),
        'method' => 'patch'
      )) }}
    @endif

      <div class="form-group {{ ($errors->has('kd_karyawan') ? 'has-error' : '') }}">
        <label for="kd_potongan">Kode Karyawan</label>

        <select name="kd_karyawan" id="kd_karyawan" class="form-control">
          <option value=""></option>
          @foreach ($karyawan as $data)
            @if ($tipe == 'buat')
              <option value="{{ $data->kd_karyawan }}">{{ $data->kd_karyawan}}</option>
            @else
              <option value="{{ $data->kd_karyawan }}" {{ ($data->kd_karyawan == $absensi->kd_karyawan ? 'selected' : '') }}>{{ $data->kd_karyawan }}</option>
              }
            @endif
          @endforeach
        </select>

        <p class="help-block">{{ $errors->first('kd_karyawan') }}</p>
      </div>

	  	  

      <div class="form-group {{ ($errors->has('kd_absen') ? 'has-error' : '') }}">
        <label for="nomor">Nomor Absen</label>

        {{ Form::text('kd_absen', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode absensi...',
          'id'          => 'kd_absen',
          'maxlength'   => '10'
        )) }}

        <p class="help-block">{{ $errors->first('kd_absen') }}</p>
      </div>	  
	  
	  

      <div class="form-group {{ ($errors->has('tanggal') ? 'has-error' : '') }}">
        <label for="tanggal">Tanggal</label>

        {{ Form::text('tanggal', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan tanggal..',
          'id'          => 'tanggal',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('tanggal') }}</p>
      </div>
	  

      <div class="form-group {{ ($errors->has('cuti') ? 'has-error' : '') }}">
        <label for="cuti">Cuti</label>

        @if ($tipe == 'buat')
          {{ Form::select('cuti', array(
            '' => 'Pilih status',
            'N' => 'N',
            'Y' => 'Y'
            ), '', array(
            'class'       => 'form-control',
            'placeholder' => 'pilih status...',
            'id'          => 'cuti'
          )) }}
        @else
          {{ Form::select('cuti', array(
            '' => 'Pilih Status',
            'N' => 'N',
            'Y' => 'Y'
             ), $absensi->cuti, array(
            'class'       => 'form-control',
            'placeholder' => 'pilih status...',
            'id'          => 'cuti'
          )) }}
        @endif

        <p class="help-block">{{ $errors->first('cuti') }}</p>
      </div>
	  


      <div class="form-group {{ ($errors->has('ijin') ? 'has-error' : '') }}">
        <label for="cuti">Ijin</label>

        @if ($tipe == 'buat')
          {{ Form::select('ijin', array(
            '' => 'Pilih status',
            'N' => 'N',
            'Y' => 'Y'
            ), '', array(
            'class'       => 'form-control',
            'placeholder' => 'pilih status...',
            'id'          => 'ijin'
          )) }}
        @else
          {{ Form::select('ijin', array(
            '' => 'Pilih Status',
            'N' => 'N',
            'Y' => 'Y'
             ), $absensi->ijin, array(
            'class'       => 'form-control',
            'placeholder' => 'pilih status...',
            'id'          => 'ijin'
          )) }}
        @endif

        <p class="help-block">{{ $errors->first('ijin') }}</p>
      </div>
	  
	  
	  
      <div class="form-group {{ ($errors->has('sakit') ? 'has-error' : '') }}">
        <label for="cuti">Sakit</label>

        @if ($tipe == 'buat')
          {{ Form::select('sakit', array(
            '' => 'Pilih status',
            'N' => 'N',
            'Y' => 'Y'
            ), '', array(
            'class'       => 'form-control',
            'placeholder' => 'pilih status...',
            'id'          => 'sakit'
          )) }}
        @else
          {{ Form::select('sakit', array(
            '' => 'Pilih Status',
            'N' => 'N',
            'Y' => 'Y'
             ), $absensi->sakit, array(
            'class'       => 'form-control',
            'placeholder' => 'pilih status...',
            'id'          => 'sakit'
          )) }}
        @endif

        <p class="help-block">{{ $errors->first('sakit') }}</p>
      </div>
	  

	  
      <div class="form-group {{ ($errors->has('alpha') ? 'has-error' : '') }}">
        <label for="cuti">Alpha</label>

        @if ($tipe == 'buat')
          {{ Form::select('alpha', array(
            '' => 'Pilih status',
            'N' => 'N',
            'Y' => 'Y'
            ), '', array(
            'class'       => 'form-control',
            'placeholder' => 'pilih status...',
            'id'          => 'alpha'
          )) }}
        @else
          {{ Form::select('alpha', array(
            '' => 'Pilih Status',
            'N' => 'N',
            'Y' => 'Y'
             ), $absensi->alpha, array(
            'class'       => 'form-control',
            'placeholder' => 'pilih status...',
            'id'          => 'alpha'
          )) }}
        @endif

        <p class="help-block">{{ $errors->first('alpha') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('absensi.index') }}"> Back to list Absensi </a>
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