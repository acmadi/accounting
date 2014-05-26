<?php namespace Lela\Proses;

class Loginmarketing {

  /**
   * cek proses login
   * 
   * @return bool
   */
  public function cek()
  {
    // input
    $username = \Input::get('username');
    $password = \Input::get('password');
    $ingat    = (\Input::get('ingat') == 1) ? true : false;
    $data     = compact('username', 'password');

    // login cocok
    if (\Auth::attempt($data, $ingat))
      return true;

    // login tidak cocok
    return false;
  }

}