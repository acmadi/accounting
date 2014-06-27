@extends('layout.master')

@section('title')
  {{ ($tipe == 'buat') ? 'Tambah Tunjangan' : 'Rubah Tunjangan' }}
@stop

@section('konten')
<!-- .panel -->
<div class="panel panel-primary">


  <div class="panel-heading">
    {{ ($tipe == 'buat') ? 'Tambah Tunjangan' : 'Rubah Tunjangan' }}
  </div>
  
  <!-- .panel-body -->
  <div class="panel-body">

    @if ($tipe == 'buat')
      {{ Form::open(array(
        'route'  => 'tunjangan.store',
        'method' => 'post'
      )) }}
    @else
      {{ Form::model($tunjangan, array(
        'route'  => array('tunjangan.update', $tunjangan->id),
        'method' => 'patch'
      )) }}
    @endif

      <div class="form-group {{ ($errors->has('kd_absen') ? 'has-error' : '') }}">
        <label for="kd_absen">Kode Absen</label>

        <select name="kd_absen" id="kd_absen" class="form-control">
          <option value=""></option>
          @foreach ($absensi as $data)
            @if ($tipe == 'buat')
              <option value="{{ $data->kd_absen }}">{{ $data->kd_absen}}</option>
            @else
              <option value="{{ $data->kd_absen }}" {{ ($data->kd_absen == $tunjangan->kd_absen ? 'selected' : '') }}>{{ $data->kd_absen }}</option>
              }
            @endif
          @endforeach
        </select>

        <p class="help-block">{{ $errors->first('kd_absen') }}</p>
      </div>

	  	  

      <div class="form-group {{ ($errors->has('kd_tunjangan') ? 'has-error' : '') }}">
        <label for="kd_tunjangan">Kode Tunjangan</label>

        {{ Form::text('kd_tunjangan', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan kode tunjangan...',
          'id'          => 'kd_tunjangan',
          'maxlength'   => '10'
        )) }}

        <p class="help-block">{{ $errors->first('kd_tunjangan') }}</p>
      </div>	  
	  
	  

      <div class="form-group {{ ($errors->has('ttl_tun_kes') ? 'has-error' : '') }}">
        <label for="ttl_tun_kes">Total Tunjangan Kesehatan</label>

        {{ Form::text('ttl_tun_kes', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan Total Tunjangan Kesehatan..',
          'id'          => 'ttl_tun_kes',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('ttl_tun_kes') }}</p>
      </div>
	  

      <div class="form-group {{ ($errors->has('ttl_tun_makan') ? 'has-error' : '') }}">
        <label for="ttl_tun_makan">Total Tunjangan Makan</label>

        {{ Form::text('ttl_tun_makan', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan Total Tunjangan Makan..',
          'id'          => 'ttl_tun_makan',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('ttl_tun_makan') }}</p>
      </div>


      <div class="form-group {{ ($errors->has('ttl_tun_transport') ? 'has-error' : '') }}">
        <label for="ttl_tun_transport">Total Tunjangan Transport</label>

        {{ Form::text('ttl_tun_transport', null, array(
          'class'       => 'form-control',
          'placeholder' => 'Masukkan Total Tunjangan Transport..',
          'id'          => 'ttl_tun_transport',
          'maxlength'   => '11'
        )) }}

        <p class="help-block">{{ $errors->first('ttl_tun_transport') }}</p>
      </div>
	  
	  
	  

      <div class="form-group {{ ($errors->has('ttl_tun') ? 'has-error' : '') }}">
        <label for="ttl_tun">Total Tunjangan</label>

        @if ($tipe == 'buat')

          {{ Form::text('ttl_tun', null, array(
            'class'       => 'form-control',
            'placeholder' => 'Masukkan total tunjangan...',
            'id'          => 'ttl_tun',
            'maxlength'   => '10',
            'readonly'    => true
          )) }}

        @else

          {{ Form::text('ttl_tun', ($tunjangan->ttl_tun_kes + $tunjangan->ttl_tun_makan + $tunjangan->ttl_tun_transport), array(
            'class'       => 'form-control',
            'placeholder' => 'Masukkan total tunjangan...',
            'id'          => 'ttl_tun',
            'maxlength'   => '10',
            'readonly'    => true
          )) }}

        @endif

        <p class="help-block">{{ $errors->first('ttl_tun') }}</p>
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
			
			<img src="{{ asset('foto/back3.png') }}" align="absmiddle" width=20 height=20> <a href="{{ route('tunjangan.index') }}"> Back to list Tunjangan </a>
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