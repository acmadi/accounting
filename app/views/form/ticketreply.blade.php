@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Support ticket' : 'Rubah Ticket reply' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">


  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah ticket reply' : 'Rubah ticket reply' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'ticketreply.store',
        'method' => 'post',
		'files'  => true
      )) }}
    @else
      {{ Form::model($ticketreply, array(
        'route'  => array('ticketreply.update', $ticketreply->id),
        'method' => 'patch',
		'files'  => true
      )) }}
    @endif

      <div class="form-group {{ ($errors->has('kd_ticket') ? 'has-error' : '') }}">
        <label for="kd_ticket">kode ticket</label>

        <select name="kd_ticket" id="kd_ticket" class="form-control">
          <option value=""></option>
          @foreach ($supportticket as $data)
            @if ($tipe == 'buat')
              <option value="{{ $data->kd_ticket }}">{{ $data->kd_ticket }}</option>
            @else
              <option value="{{ $data->kd_ticket }}" {{ ($data->kd_ticket == $ticketreply->kd_ticket ? 'selected' : '') }}>{{ $data->kd_ticket }}</option>
              }
            @endif
          @endforeach
        </select>

        <p class="help-block">{{ $errors->first('kd_ticket') }}</p>
      </div>
	  


      <div class="form-group {{ ($errors->has('kd_reply') ? 'has-error' : '') }}">
        <label for="kd_reply">Kode Reply</label>

        {{ Form::text('kd_reply', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode ticket...',
          'id'          => 'kd_reply',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('kd_reply') }}</p>
      </div>	  
	  
	  

      <div class="form-group {{ ($errors->has('nama_reply') ? 'has-error' : '') }}">
        <label for="nama_reply">Nama Reply</label>

        {{ Form::text('nama_reply', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan nama reply...',
          'id'          => 'nama_reply',
          'maxlength'   => '30'
        )) }}

        <p class="help-block">{{ $errors->first('nama_reply') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('ticketreply.index') }}"> Back to list ticket reply </a>
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