@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Pkp' : 'Rubah Pkp' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah Pkp' : 'Rubah Pkp' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'pkp.store',
        'method' => 'post',
        'files'  => true
      )) }}
    @else
      {{ Form::model($pkp, array(
        'route'  => array('pkp.update', $pkp->id),
        'method' => 'patch',
        'files'  => true
      )) }}
    @endif



      <div class="form-group {{ ($errors->has('kd_pkp') ? 'has-error' : '') }}">
        <label for="kd_pkp">Kode Pkp</label>
        
        {{ Form::text('kd_pkp', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode pkp...',
          'id'          => 'kd_pkp',
          'maxlength'   => '10'
        )) }}

        <p class="help-block">{{ $errors->first('kd_pkp') }}</p>
      </div>	
	
	
      <div class="form-group {{ ($errors->has('batas_pkp') ? 'has-error' : '') }}">
        <label for="batas_pkp">Batas Pkp</label>
        
        {{ Form::text('batas_pkp', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan batas pkp...',
          'id'          => 'batas_pkp',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('batas_pkp') }}</p>
      </div>

	  
      <div class="form-group {{ ($errors->has('tarif') ? 'has-error' : '') }}">
        <label for="tarif">Tarif</label>
        
        {{ Form::text('tarif', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan tarif...',
          'id'          => 'tarif',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('tarif') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('pkp.index') }}"> Back to list Price </a>
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