@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Detail Gaji' : 'Rubah Detail Gaji' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">


  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah Detail Gaji' : 'Rubah detail gaji' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'detailgaji.store',
        'method' => 'post'
      )) }}
    @else
      {{ Form::model($detailgaji, array(
        'route'  => array('detailgaji.update', $detailgaji->id),
        'method' => 'patch'
      )) }}
    @endif

      <div class="form-group {{ ($errors->has('kd_potongan') ? 'has-error' : '') }}">
        <label for="kd_potongan">Kode Potongan</label>

        <select name="kd_potongan" id="kd_potongan" class="form-control">
          <option value=""></option>
          @foreach ($potongan as $data)
            @if ($tipe == 'buat')
              <option value="{{ $data->kd_potongan }}">{{ $data->kd_potongan}}</option>
            @else
              <option value="{{ $data->kd_potongan }}" {{ ($data->kd_potongan == $detailgaji->kd_potongan ? 'selected' : '') }}>{{ $data->kd_potongan }}</option>
              }
            @endif
          @endforeach
        </select>

        <p class="help-block">{{ $errors->first('kd_potongan') }}</p>
      </div>

	  	  

      <div class="form-group {{ ($errors->has('nomor') ? 'has-error' : '') }}">
        <label for="nomor">Nomor Detail Gaji</label>

        {{ Form::text('nomor', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan nomor...',
          'id'          => 'nomor',
          'maxlength'   => '10'
        )) }}

        <p class="help-block">{{ $errors->first('nomor') }}</p>
      </div>	  
	  
	  

      <div class="form-group {{ ($errors->has('jumlah') ? 'has-error' : '') }}">
        <label for="jumlah">Jumlah</label>

        {{ Form::text('jumlah', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan jumlah..',
          'id'          => 'jumlah',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('jumlah') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('detailgaji.index') }}"> Back to list Detail Gaji </a>
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