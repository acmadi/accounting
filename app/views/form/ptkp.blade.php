@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Ptkp' : 'Rubah Ptkp' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">
  
  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah Ptkp' : 'Rubah Ptkp' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'ptkp.store',
        'method' => 'post',
        'files'  => true
      )) }}
    @else
      {{ Form::model($ptkp, array(
        'route'  => array('ptkp.update', $ptkp->id),
        'method' => 'patch',
        'files'  => true
      )) }}
    @endif


      <div class="form-group {{ ($errors->has('kd_statuskawin') ? 'has-error' : '') }}">
        <label for="nama">Kode PTKP</label>
        
        {{ Form::text('kd_statuskawin', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode ptkp...',
          'id'          => 'kd_statuskawin',
          'maxlength'   => '10'
        )) }}

        <p class="help-block">{{ $errors->first('kd_statuskawin') }}</p>
      </div>	
	

      <div class="form-group {{ ($errors->has('jumlah_ptkp') ? 'has-error' : '') }}">
        <label for="nama">Jumlah PTKP</label>
        
        {{ Form::text('jumlah_ptkp', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan jumlah ptkp...',
          'id'          => 'jumlah_ptkp',
          'maxlength'   => '20'
        )) }}

        <p class="help-block">{{ $errors->first('jumlah_ptkp') }}</p>
      </div>

	  
      <div class="form-group {{ ($errors->has('status_kawin') ? 'has-error' : '') }}">
        <label for="nama">Status Kawin</label>
        
        {{ Form::text('status_kawin', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan status kawin...',
          'id'          => 'status_kawin',
          'maxlength'   => '50'
        )) }}

        <p class="help-block">{{ $errors->first('status_kawin') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('ptkp.index') }}"> Back to list Ptkp </a>
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