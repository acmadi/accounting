@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Ppn' : 'Rubah Ppn' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">


  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah ppn' : 'Rubah ppn' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'ppn.store',
        'method' => 'post',
		'files'  => true
      )) }}
    @else
      {{ Form::model($ppn, array(
        'route'  => array('ppn.update', $ppn->id),
        'method' => 'patch',
		'files'  => true
      )) }}
    @endif

      <div class="form-group {{ ($errors->has('kd_perusahaan') ? 'has-error' : '') }}">
        <label for="kd_perusahaan">kode perusahaan</label>

        <select name="kd_perusahaan" id="kd_marketing" class="form-control">
          <option value=""></option>
          @foreach ($perusahaan1 as $data)
            @if ($tipe == 'buat')
              <option value="{{ $data->kd_perusahaan }}">{{ $data->kd_perusahaan }}</option>
            @else
              <option value="{{ $data->kd_perusahaan }}" {{ ($data->kd_perusahaan == $ppn->kd_perusahaan ? 'selected' : '') }}>{{ $data->kd_perusahaan }}</option>
              }
            @endif
          @endforeach
        </select>

        <p class="help-block">{{ $errors->first('kd_perusahaan') }}</p>
      </div>
	  


      <div class="form-group {{ ($errors->has('kd_ppn') ? 'has-error' : '') }}">
        <label for="kd_ppn">Kode Ppn</label>

        {{ Form::text('kd_ppn', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode ppn...',
          'id'          => 'kd_ppn',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('kd_ppn') }}</p>
      </div>	  
	  
	  

      <div class="form-group {{ ($errors->has('ppn_pembelian') ? 'has-error' : '') }}">
        <label for="ppn_pembelian">Ppn Pembelian</label>

        {{ Form::text('ppn_pembelian', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan ppn pembelian...',
          'id'          => 'ppn_pembelian',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('ppn_pembelian') }}</p>
      </div>


	  
      <div class="form-group {{ ($errors->has('ppn_penjalan') ? 'has-error' : '') }}">
        <label for="ppn_penjalan">Ppn Penjualan</label>

        {{ Form::text('ppn_penjalan', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan ppn penjualan...',
          'id'          => 'ppn_penjalan',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('ppn_penjalan') }}</p>
      </div>  



      <div class="form-group {{ ($errors->has('bulan') ? 'has-error' : '') }}">
        <label for="bulan"> Bulan</label>

        {{ Form::text('bulan', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan bulan...',
          'id'          => 'bulan',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('bulan') }}</p>
      </div> 	  



      <div class="form-group {{ ($errors->has('tahun') ? 'has-error' : '') }}">
        <label for="tahun"> tahun</label>

        {{ Form::text('tahun', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan tahun...',
          'id'          => 'tahun',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('tahun') }}</p>
      </div> 




      <div class="form-group {{ ($errors->has('biaya_membangun_sendiri') ? 'has-error' : '') }}">
        <label for="biaya_membangun_sendiri"> biaya membangun sendiri</label>

        {{ Form::text('biaya_membangun_sendiri', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan biaya membangun sendiri...',
          'id'          => 'biaya_membangun_sendiri',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('biaya_membangun_sendiri') }}</p>
      </div> 



      <div class="form-group {{ ($errors->has('penomoran_faktur') ? 'has-error' : '') }}">
        <label for="penomoran_faktur"> penomoran faktur</label>

        {{ Form::text('penomoran_faktur', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan penomoran faktur...',
          'id'          => 'penomoran_faktur',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('penomoran_faktur') }}</p>
      </div> 

	  
	  
      <div class="form-group {{ ($errors->has('penjualan_tanpa_faktur') ? 'has-error' : '') }}">
        <label for="penjualan_tanpa_faktur"> penjualan tanpa faktur</label>

        {{ Form::text('penjualan_tanpa_faktur', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan penjualan tanpa faktur...',
          'id'          => 'penjualan_tanpa_faktur',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('penjualan_tanpa_faktur') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('ppn.index') }}"> Back to list ppn </a>
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