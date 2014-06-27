@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Pph' : 'Rubah Pph' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">


  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah Pph' : 'Rubah Pph' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'pph.store',
        'method' => 'post'
      )) }}
    @else
      {{ Form::model($pph, array(
        'route'  => array('pph.update', $pph->id),
        'method' => 'patch'
      )) }}
    @endif

      <div class="form-group {{ ($errors->has('kd_pkp') ? 'has-error' : '') }}">
        <label for="kd_pkp">Kode Pkp</label>

        <select name="kd_pkp" id="kd_pkp" class="form-control">
          <option value=""></option>
          @foreach ($pkp as $data)
            @if ($tipe == 'buat')
              <option value="{{ $data->kd_pkp }}">{{ $data->kd_pkp }}</option>
            @else
              <option value="{{ $data->kd_pkp }}" {{ ($data->kd_pkp == $pph->kd_pkp ? 'selected' : '') }}>{{ $data->kd_pkp }}</option>
              }
            @endif
          @endforeach
        </select>

        <p class="help-block">{{ $errors->first('kd_pkp') }}</p>
      </div>



      <div class="form-group {{ ($errors->has('kd_lembur') ? 'has-error' : '') }}">
        <label for="kode_lembur">Kode Lembur</label>

        <select name="kd_lembur" id="kd_lembur" class="form-control">
          <option value=""></option>
          @foreach ($lembur as $data)
            @if ($tipe == 'buat')
              <option value="{{ $data->kd_lembur }}">{{ $data->kd_lembur }}</option>
            @else
              <option value="{{ $data->kd_lembur }}" {{ ($data->kd_lembur == $pph->kd_lembur ? 'selected' : '') }}>{{ $data->kd_lembur }}</option>
            @endif

          @endforeach
        </select>

        <p class="help-block">{{ $errors->first('kd_lembur') }}</p>
      </div>

	  
	  	  

      <div class="form-group {{ ($errors->has('kd_pph') ? 'has-error' : '') }}">
        <label for="kd_pph">Kode Pph</label>

        {{ Form::text('kd_pph', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode pph...',
          'id'          => 'kd_pph',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('kd_pph') }}</p>
      </div>	  
	  
	  

      <div class="form-group {{ ($errors->has('pph_thr') ? 'has-error' : '') }}">
        <label for="pph_thr">Pph THR</label>

        {{ Form::text('pph_thr', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan pph thr...',
          'id'          => 'pph_thr',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('pph_thr') }}</p>
      </div>


      <div class="form-group {{ ($errors->has('pph_gaji_sebulan') ? 'has-error' : '') }}">
        <label for="pph_gaji_sebulan">Pph Gaji Sebulan</label>

        {{ Form::text('pph_gaji_sebulan', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan pph gaji sebulan...',
          'id'          => 'pph_gaji_sebulan',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('pph_gaji_sebulan') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('pph.index') }}"> Back to list Pph </a>
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