@extends('layout') 
@section('content') 
  <div class="container"> <h2>Register Owner</h2> 

  @if(Session::has('pesan'))
  <div class="alert alert-success">{{ Session::get('pesan') }}</div>
  @endif

  {{Form::open(array('action' => 'RegisterownerController@store')) }} 
  
  {{Form::label('nama_depan', 'First Name') }} 
  {{Form::text('nama_depan', '', array('class' => 'form-control'))}} 

  {{Form::label('nama_belakang', 'Last Name') }} 
  {{Form::text('nama_belakang', '', array('class' => 'form-control'))}} 
   
  {{Form::label('email', 'Email') }} 
  {{Form::text('email', '', array('class' => 'form-control'))}} 

  {{Form::label('username', 'Username') }} 
  {{Form::text('username', '', array('class' => 'form-control'))}} 

  {{Form::label('password', 'Password') }} 
  {{Form::password('password', array('class' => 'form-control'))}} 

  {{Form::label('handphone', 'Handphone') }} 
  {{Form::text('handphone', '', array('class' => 'form-control'))}} 

  {{Form::label('npwp', 'Npwp') }} 
  {{Form::text('npwp', '', array('class' => 'form-control'))}} 

  {{Form::label('alamat', 'Alamat') }} 
  {{Form::text('alamat', '', array('class' => 'form-control'))}} 

  {{Form::label('kota', 'Kota') }} 
  {{Form::text('kota', '', array('class' => 'form-control'))}} 

  {{Form::label('propinsi', 'Propinsi') }} 
  {{Form::text('propinsi', '', array('class' => 'form-control'))}} 

  {{Form::label('kode_pos', 'Kode Pos') }} 
  {{Form::text('kode_pos', '', array('class' => 'form-control'))}} 
  

  <br>    
  {{Form::submit('Make Register', array('class' => 'btn btn-primary')) }} 
  <br>
 {{ Form::close() }} </div> <br><br> @stop