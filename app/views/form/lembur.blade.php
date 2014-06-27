@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Lembur' : 'Rubah Lembur' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">


  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah Lembur' : 'Rubah Lembur' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'lembur.store',
        'method' => 'post'
      )) }}
    @else
      {{ Form::model($lembur, array(
        'route'  => array('lembur.update', $lembur->id),
        'method' => 'patch'
      )) }}
    @endif

      <div class="form-group {{ ($errors->has('kd_tunjangan') ? 'has-error' : '') }}">
        <label for="kd_tunjangan">Kode Tunjangan</label>

        <select name="kd_tunjangan" id="kd_tunjangan" class="form-control">
          <option value=""></option>
          @foreach ($tunjangan as $data)
            @if ($tipe == 'buat')
              <option value="{{ $data->kd_tunjangan }}">{{ $data->kd_tunjangan}}</option>
            @else
              <option value="{{ $data->kd_tunjangan }}" {{ ($data->kd_tunjangan == $lembur->kd_tunjangan ? 'selected' : '') }}>{{ $data->kd_tunjangan }}</option>
              }
            @endif
          @endforeach
        </select>

        <p class="help-block">{{ $errors->first('kd_tunjangan') }}</p>
      </div>

	  	  

      <div class="form-group {{ ($errors->has('kd_lembur') ? 'has-error' : '') }}">
        <label for="kd_absen">Kode Lembur</label>

        {{ Form::text('kd_lembur', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode lembur...',
          'id'          => 'kd_lembur',
          'maxlength'   => '10'
        )) }}

        <p class="help-block">{{ $errors->first('kd_lembur') }}</p>
      </div>	  
	  
	  

      <div class="form-group {{ ($errors->has('jml_lembur_biasa') ? 'has-error' : '') }}">
        <label for="jml_lembur_biasa">Jumlah Lembur Biasa</label>

        {{ Form::text('jml_lembur_biasa', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan Jumlah Lembur Biasa..',
          'id'          => 'jml_lembur_biasa',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('jml_lembur_biasa') }}</p>
      </div>
	  

      <div class="form-group {{ ($errors->has('jml_lembur_libur') ? 'has-error' : '') }}">
        <label for="jml_lembur_libur">Jumlah Lembur Libur</label>

        {{ Form::text('jml_lembur_libur', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan Jumlah Lembur Libur..',
          'id'          => 'jml_lembur_libur',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('jml_lembur_libur') }}</p>
      </div>


      <div class="form-group {{ ($errors->has('tarif_biasa') ? 'has-error' : '') }}">
        <label for="tarif_biasa">Tarif Biasa</label>

        {{ Form::text('tarif_biasa', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan Tarif Biasa..',
          'id'          => 'tarif_biasa',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('tarif_biasa') }}</p>
      </div>
	  

	  
      <div class="form-group {{ ($errors->has('tarif_libur') ? 'has-error' : '') }}">
        <label for="tarif_libur">Tarif Libur</label>

        {{ Form::text('tarif_libur', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan Tarif Libur..',
          'id'          => 'tarif_libur',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('tarif_libur') }}</p>
      </div>
	  

	  
	  
      <div class="form-group {{ ($errors->has('total') ? 'has-error' : '') }}">
        <label for="total">Total</label>

        {{ Form::text('total', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan total..',
          'id'          => 'total',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('total') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('lembur.index') }}"> Back to list Lembur </a>
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