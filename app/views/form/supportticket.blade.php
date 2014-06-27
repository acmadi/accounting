@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Support ticket' : 'Rubah Support ticket' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">


  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah Support ticket' : 'Rubah Support ticket' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'supportticket.store',
        'method' => 'post',
		'files'  => true
      )) }}
    @else
      {{ Form::model($supportticket, array(
        'route'  => array('supportticket.update', $supportticket->id),
        'method' => 'patch',
		'files'  => true
      )) }}
    @endif

      <div class="form-group {{ ($errors->has('kd_marketing') ? 'has-error' : '') }}">
        <label for="kd_marketing">Kode Marketing</label>

        <select name="kd_marketing" id="kd_marketing" class="form-control">
          <option value=""></option>
          @foreach ($marketing as $data)
            @if ($tipe == 'buat')
              <option value="{{ $data->kd_marketing }}">{{ $data->kd_marketing }}</option>
            @else
              <option value="{{ $data->kd_marketing }}" {{ ($data->kd_marketing == $supportticket->kd_marketing ? 'selected' : '') }}>{{ $data->kd_marketing }}</option>
              }
            @endif
          @endforeach
        </select>

        <p class="help-block">{{ $errors->first('kd_marketing') }}</p>
      </div>
	  


      <div class="form-group {{ ($errors->has('kd_ticket') ? 'has-error' : '') }}">
        <label for="kd_ticket">Kode ticket</label>

        {{ Form::text('kd_ticket', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode ticket...',
          'id'          => 'kd_ticket',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('kd_ticket') }}</p>
      </div>	  
	  
	  

      <div class="form-group {{ ($errors->has('nama_ticket') ? 'has-error' : '') }}">
        <label for="nama_ticket">Nama Ticket</label>

        {{ Form::text('nama_ticket', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan nama ticket...',
          'id'          => 'nama_ticket',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('nama_ticket') }}</p>
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
	  


      <div class="form-group {{ ($errors->has('lampiran') ? 'has-error' : '') }}">
        <label for="lampiran">Lampiran</label>
        <input type="file" class="form-control" name="lampiran" id="lampiran" placeholder="Masukkan lampiran anda...">
        <p class="help-block">{{ $errors->first('lampiran') }}</p>
      </div>	

	  

      <div class="form-group {{ ($errors->has('jenis_ticket') ? 'has-error' : '') }}">
        <label for="jenis_ticket">jenis ticket</label>

        @if ($tipe == 'buat')
          {{ Form::select('jenis_ticket', array(
            '' => 'Pilih status',
            'Low' => 'low',
            'Normal' => 'Normal',
			'Urgent' => 'Urgent'
            ), '', array(
            'class'       => 'form-control',
            'placeholder' => 'pilih status...',
            'id'          => 'jenis_ticket'
          )) }}
        @else
          {{ Form::select('jenis_ticket', array(
            '' => 'Pilih Status',
            'Low' => 'low',
            'Normal' => 'Normal',
			'Urgent' => 'Urgent'
             ), $supportticket->jenis_ticket, array(
            'class'       => 'form-control',
            'placeholder' => 'pilih status...',
            'id'          => 'jenis_ticket'
          )) }}
        @endif

        <p class="help-block">{{ $errors->first('jenis_ticket') }}</p>
      </div>	  
	  


      <div class="form-group {{ ($errors->has('status_ticket') ? 'has-error' : '') }}">
        <label for="status_ticket">jenis ticket</label>

        @if ($tipe == 'buat')
          {{ Form::select('status_ticket', array(
            '' => 'Pilih status',
            'Replay' => 'Replay',
            'Closed' => 'Closed'
            ), '', array(
            'class'       => 'form-control',
            'placeholder' => 'pilih status...',
            'id'          => 'status_ticket'
          )) }}
        @else
          {{ Form::select('status_ticket', array(
            '' => 'Pilih Status',
            'Replay' => 'Replay',
            'Closed' => 'Closed'
             ), $supportticket->status_ticket, array(
            'class'       => 'form-control',
            'placeholder' => 'pilih status...',
            'id'          => 'status_ticket'
          )) }}
        @endif

        <p class="help-block">{{ $errors->first('status_ticket') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('supportticket.index') }}"> Back to list support ticket </a>
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