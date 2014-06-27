@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Agenda' : 'Rubah Agenda' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">


  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah agenda' : 'Rubah agenda' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'agenda.store',
        'method' => 'post',
		'files'  => true
      )) }}
    @else
      {{ Form::model($agenda, array(
        'route'  => array('agenda.update', $agenda->id),
        'method' => 'patch',
		'files'  => true
      )) }}
    @endif

      <div class="form-group {{ ($errors->has('kd_marketing') ? 'has-error' : '') }}">
        <label for="kd_marketing">kode marketing</label>

        <select name="kd_marketing" id="kd_marketing" class="form-control">
          <option value=""></option>
          @foreach ($marketing as $data)
            @if ($tipe == 'buat')
              <option value="{{ $data->kd_marketing }}">{{ $data->kd_marketing }}</option>
            @else
              <option value="{{ $data->kd_marketing }}" {{ ($data->kd_marketing == $agenda->kd_marketing ? 'selected' : '') }}>{{ $data->kd_marketing }}</option>
              }
            @endif
          @endforeach
        </select>

        <p class="help-block">{{ $errors->first('kd_marketing') }}</p>
      </div>
	  


      <div class="form-group {{ ($errors->has('kd_agenda') ? 'has-error' : '') }}">
        <label for="kd_agenda">Kode Agenda</label>

        {{ Form::text('kd_agenda', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode agenda...',
          'id'          => 'kd_agenda',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('kd_agenda') }}</p>
      </div>	  
	  
	  

      <div class="form-group {{ ($errors->has('nama_agenda') ? 'has-error' : '') }}">
        <label for="nama_agenda">Nama Agenda</label>

        {{ Form::text('nama_agenda', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan nama agenda...',
          'id'          => 'nama_agenda',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('nama_agenda') }}</p>
      </div>


	  
      <div class="form-group {{ ($errors->has('keterangan') ? 'has-error' : '') }}">
        <label for="keterangan">Keterangan</label>

        {{ Form::text('keterangan', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan keterangan...',
          'id'          => 'keterangan',
          'maxlength'   => '200'
        )) }}

        <p class="help-block">{{ $errors->first('keterangan') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('agenda.index') }}"> Back to list agenda </a>
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