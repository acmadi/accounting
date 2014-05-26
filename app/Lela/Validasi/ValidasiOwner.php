<?php namespace Lela\Validasi;

class ValidasiOwner extends Validasi {

  /**
   * rules validasi owner
   * 
   * @var array
   */
  protected static $rules = array(

    'kd_karyawan'			=> 'required|max:10',
    'kd_perusahaan'  		=> 'required|max:10',
    'kd_marketing' 			=> 'required|max:10',

    'kd_owner'      		=> 'required|max:10',
	'username'				=> 'required|max:30', 
    'password'      		=> 'required|max:30',
	'nama_depan'			=> 'required|max:30', 
    'nama_belakang'      	=> 'required|max:20',
	'handphone'				=> 'required|max:20', 
    'npwp'      			=> 'required|max:20',
	'alamat'				=> 'required|max:200', 
    'kota'      			=> 'required|max:30',
	'propinsi'				=> 'required|max:30', 
    'kode_pos'      		=> 'required|max:10',
	'email'					=> 'required|max:30', 
	
  );

}