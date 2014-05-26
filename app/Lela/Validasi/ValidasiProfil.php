<?php namespace Lela\Validasi;

class ValidasiProfil extends Validasi {

  /**
   * rules validasi form profil
   * 
   * @var array
   */
  protected static $rules = array(
    'foto'      => 'mimes:jpg,jpeg,png|max:5000',
    'nama'      => 'required|max:50',
    'email'     => 'required|email|max:50',
    'jabatan'   => 'required',
    'alamat'    => 'required|max:100',
    'username'  => 'min:5|max:20',
    'password'  => 'min:6'
  );

}