<?php namespace Lela\Validasi;

class ValidasiLogin extends Validasi {

  /**
   * rules validasi form login
   * 
   * @var array
   */
  protected static $rules = array(
    'username' => 'required|min:5|max:20|exists:users,username',
    'password' => 'required|min:6'
  );

}