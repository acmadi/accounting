<?php namespace Lela\Validasi;

class ValidasiPengguna extends Validasi {

  /**
   * rules validasi form pengguna
   * 
   * @var array
   */
  protected static $rules = array(
    'foto'      	=> 'mimes:jpg,jpeg,png|max:5000',
    'nama'      	=> 'required|max:50',
	'nama_belakang'	=> 'required|max:50',
    'email'     	=> 'required|email|max:50',
    'jabatan'   	=> 'required',
    'alamat'    	=> 'required|max:100',
    'username'  	=> 'required|min:5|max:20',
    'password'  	=> 'required|min:6'
  );

}