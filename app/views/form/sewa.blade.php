@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Sewa' : 'Rubah Sewa' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">


  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah sewa' : 'Rubah sewa' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'sewa.store',
        'method' => 'post',
		'files'  => true
      )) }}
    @else
      {{ Form::model($sewa, array(
        'route'  => array('sewa.update', $sewa->id),
        'method' => 'patch',
		'files'  => true
      )) }}
    @endif

      <div class="form-group {{ ($errors->has('kd_harga') ? 'has-error' : '') }}">
        <label for="kd_harga">kode harga</label>

        <select name="kd_harga" id="kd_harga" class="form-control">
          <option value=""></option>
          @foreach ($harga as $data)
            @if ($tipe == 'buat')
              <option value="{{ $data->kd_harga }}">{{ $data->kd_harga }}</option>
            @else
              <option value="{{ $data->kd_harga }}" {{ ($data->kd_harga == $sewa->kd_harga ? 'selected' : '') }}>{{ $data->kd_harga }}</option>
              }
            @endif
          @endforeach
        </select>

        <p class="help-block">{{ $errors->first('kd_harga') }}</p>
      </div>
	  


      <div class="form-group {{ ($errors->has('kd_sewa') ? 'has-error' : '') }}">
        <label for="kd_sewa">Kode Sewa</label>

        {{ Form::text('kd_sewa', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode sewa...',
          'id'          => 'kd_sewa',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('kd_sewa') }}</p>
      </div>	  
	  
	  

      <div class="form-group {{ ($errors->has('nama_sewa') ? 'has-error' : '') }}">
        <label for="nama_sewa">Nama Sewa</label>

        {{ Form::text('nama_sewa', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan nama sewa...',
          'id'          => 'nama_sewa',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('nama_sewa') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('sewa.index') }}"> Back to list sewa </a>
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