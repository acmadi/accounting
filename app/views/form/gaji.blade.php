@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Gaji' : 'Rubah Gaji' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">


  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah Gaji' : 'Rubah Gaji' }}
  </div>

 
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'gaji.store',
        'method' => 'post',
        'files'  => true
      )) }}
    @else
      {{ Form::model($gaji, array(
        'route'  => array('gaji.update', $gaji->id),
        'method' => 'patch',
        'files'  => true
      )) }}
    @endif

	
      <div class="form-group {{ ($errors->has('kd_tunjangan') ? 'has-error' : '') }}">
        <label for="kd_tunjangan">Kode Tunjangan</label>

        <select name="kd_tunjangan" id="kd_tunjangan" class="form-control">
          <option value=""></option>
          @foreach ($tunjangan as $data)
            @if ($tipe == 'buat')
              <option value="{{ $data->kd_tunjangan }}">{{ $data->kd_tunjangan }}</option>
            @else
              <option value="{{ $data->kd_tunjangan }}" {{ ($data->kd_tunjangan == $gaji->kd_tunjangan ? 'selected' : '') }}>{{ $data->kd_tunjangan }}</option>
              }
            @endif
          @endforeach
        </select>

        <p class="help-block">{{ $errors->first('kd_tunjangan') }}</p>
      </div>



      <div class="form-group {{ ($errors->has('kd_lembur') ? 'has-error' : '') }}">
        <label for="kd_lembur">Kode Lembur</label>

        <select name="kd_lembur" id="kd_lembur" class="form-control">
          <option value=""></option>
          @foreach ($lembur as $data)
            @if ($tipe == 'buat')
              <option value="{{ $data->kd_lembur }}">{{ $data->kd_lembur }}</option>
            @else
              <option value="{{ $data->kd_lembur }}" {{ ($data->kd_lembur == $gaji->kd_lembur ? 'selected' : '') }}>{{ $data->kd_lembur }}</option>
            @endif

          @endforeach
        </select>

        <p class="help-block">{{ $errors->first('kd_lembur') }}</p>
      </div>

	  
	  
      <div class="form-group {{ ($errors->has('kd_pph') ? 'has-error' : '') }}">
        <label for="kd_pph">Kode Pph</label>

        <select name="kd_pph" id="kd_pph" class="form-control">
          <option value=""></option>
          @foreach ($pph as $data)
            @if ($tipe == 'buat')
              <option value="{{ $data->kd_pph }}">{{ $data->kd_pph }}</option>
            @else
              <option value="{{ $data->kd_pph }}" {{ ($data->kd_pph == $gaji->kd_pph ? 'selected' : '') }}>{{ $data->kd_pph }}</option>
            @endif

          @endforeach
        </select>

        <p class="help-block">{{ $errors->first('kd_pph') }}</p>
      </div>
	  
	  
	  
      <div class="form-group {{ ($errors->has('kd_gaji') ? 'has-error' : '') }}">
        <label for="kd_gaji">kode gaji</label>

        {{ Form::text('kd_gaji', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode gaji...',
          'id'          => 'kd_gaji',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('kd_gaji') }}</p>
      </div>

	  

      <div class="form-group {{ ($errors->has('tanggal') ? 'has-error' : '') }}">
        <label for="tanggal">tanggal</label>

        {{ Form::text('tanggal', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan tanggal...',
          'id'          => 'tanggal',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('tanggal') }}</p>
      </div>

	  

      <div class="form-group {{ ($errors->has('tun_jab') ? 'has-error' : '') }}">
        <label for="tun_jab">tunjangan jabatan</label>

        {{ Form::text('tun_jab', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan tunjangan jabatan...',
          'id'          => 'tun_jab',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('tun_jab') }}</p>
      </div>


	 
      <div class="form-group {{ ($errors->has('ttl_tunjangan') ? 'has-error' : '') }}">
        <label for="ttl_tunjangan">total tunjangan</label>

        {{ Form::text('ttl_tunjangan', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan tunjangan...',
          'id'          => 'ttl_tunjangan',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('ttl_tunjangan') }}</p>
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
	  


      <div class="form-group {{ ($errors->has('jml_potongan') ? 'has-error' : '') }}">
        <label for="jml_potongan">Jumlah potongan</label>

        {{ Form::text('jml_potongan', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan potongan...',
          'id'          => 'jml_potongan',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('jml_potongan') }}</p>
      </div>  



      <div class="form-group {{ ($errors->has('ttl_lembur') ? 'has-error' : '') }}">
        <label for="ttl_lembur">Total Lembur</label>

        {{ Form::text('ttl_lembur', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan total lembur...',
          'id'          => 'ttl_lembur',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('ttl_lembur') }}</p>
      </div>  



      <div class="form-group {{ ($errors->has('gaji_pokok') ? 'has-error' : '') }}">
        <label for="gaji_pokok">Gaji pokok</label>

        {{ Form::text('gaji_pokok', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan gaji pokok...',
          'id'          => 'gaji_pokok',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('gaji_pokok') }}</p>
      </div>  


	  
      <div class="form-group {{ ($errors->has('gaji_bruto') ? 'has-error' : '') }}">
        <label for="gaji_bruto">Gaji Broto</label>

        {{ Form::text('gaji_bruto', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan gaji bruto...',
          'id'          => 'gaji_bruto',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('gaji_bruto') }}</p>
      </div>  
	  
	  

      <div class="form-group {{ ($errors->has('gaji_bersih') ? 'has-error' : '') }}">
        <label for="gaji_bersih">Gaji Bersih</label>

        {{ Form::text('gaji_bersih', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan gaji bersih...',
          'id'          => 'gaji_bersih',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('gaji_bersih') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('gaji.index') }}"> Back to list gaji </a>
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