<?php namespace Lela\Validasi;

class ValidasiLoginmarketing extends Validasi {

  /**
   * rules validasi form login
   * 
   * @var array
   */
  protected static $rules = array(
    'username' => 'required|min:5|max:20|exists:marketing,username',
    'password' => 'required|min:6|max:20|exists:marketing,password'
  );

}