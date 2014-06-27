@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Pph42' : 'Rubah Pph42' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">


  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah Pph42' : 'Rubah Pph42' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'pph42.store',
        'method' => 'post',
		'files'  => true
      )) }}
    @else
      {{ Form::model($pph42, array(
        'route'  => array('pph42.update', $pph42->id),
        'method' => 'patch',
		'files'  => true
      )) }}
    @endif

      <div class="form-group {{ ($errors->has('kd_perusahaan') ? 'has-error' : '') }}">
        <label for="kd_perusahaan">kode perusahaan</label>

        <select name="kd_perusahaan" id="kd_perusahaan" class="form-control">
          <option value=""></option>
          @foreach ($perusahaan1 as $data)
            @if ($tipe == 'buat')
              <option value="{{ $data->kd_perusahaan }}">{{ $data->kd_perusahaan }}</option>
            @else
              <option value="{{ $data->kd_perusahaan }}" {{ ($data->kd_perusahaan == $pph42->kd_perusahaan ? 'selected' : '') }}>{{ $data->kd_perusahaan }}</option>
              }
            @endif
          @endforeach
        </select>

        <p class="help-block">{{ $errors->first('kd_perusahaan') }}</p>
      </div>
	  


      <div class="form-group {{ ($errors->has('id_pph42') ? 'has-error' : '') }}">
        <label for="id_pph42">Kode pph42</label>

        {{ Form::text('id_pph42', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode pph42...',
          'id'          => 'id_pph42',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('id_pph42') }}</p>
      </div>	  
	  


      <div class="form-group {{ ($errors->has('jumlah_omzet') ? 'has-error' : '') }}">
        <label for="jumlah_omzet">Jumlah omzet</label>

        {{ Form::text('jumlah_omzet', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan jumlah omzet...',
          'id'          => 'jumlah_omzet',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('jumlah_omzet') }}</p>
      </div>


	  
      <div class="form-group {{ ($errors->has('bulan') ? 'has-error' : '') }}">
        <label for="bulan">bulan</label>

        {{ Form::text('bulan', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan bulan...',
          'id'          => 'bulan',
          'maxlength'   => '200'
        )) }}

        <p class="help-block">{{ $errors->first('bulan') }}</p>
      </div>  
	  



      <div class="form-group {{ ($errors->has('tahun') ? 'has-error' : '') }}">
        <label for="tahun">tahun</label>

        {{ Form::text('tahun', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan tahun...',
          'id'          => 'tahun',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('tahun') }}</p>
      </div>  



      <div class="form-group {{ ($errors->has('tanggal') ? 'has-error' : '') }}">
        <label for="tanggal">tanggal</label>

        {{ Form::text('tanggal', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan tanggal...',
          'id'          => 'tanggal',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('tanggal') }}</p>
      </div>  
	  
	  


      <div class="form-group {{ ($errors->has('nama_penyetor') ? 'has-error' : '') }}">
        <label for="nama_penyetor">nama_penyetor</label>

        {{ Form::text('nama_penyetor', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan nama penyetor...',
          'id'          => 'nama_penyetor',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('nama_penyetor') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('pph42.index') }}"> Back to list pph42 </a>
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