<?php namespace Lela\Validasi;

class ValidasiMarketing extends Validasi {

  /**
   * rules validasi form marketing
   * 
   * @var array
   */
  protected static $rules = array(
    'kd_marketing'   		=> 'required|max:10',
    'nama_depan'  			=> 'required|max:30',
    'nama_belakang'   		=> 'required|max:30',
    'username' 				=> 'required|max:20',
	'password' 				=> 'required|max:20',
	'email' 				=> 'required|max:20',
	'no_hp' 				=> 'required|max:20',
	'alamat' 				=> 'required',
	'kota' 					=> 'required|max:30',
	'propinsi' 				=> 'required|max:50',
	'kode_pos' 				=> 'required|max:20',

);

}