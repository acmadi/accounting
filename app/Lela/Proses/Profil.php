<?php namespace Lela\Proses;

class Profil {

  /**
   * rubah profil user
   * 
   * @param  int $id id user
   * @return bool
   */
  public function rubah($id)
  {
    // input
    $nama     = \Input::get('nama');
    $email    = \Input::get('email');
    $akses    = \Input::get('jabatan');
    $alamat   = \Input::get('alamat');
    $username = (\Input::has('username')) ? \Input::get('username') : null;
    $password = (\Input::has('password')) ? \Hash::make(\Input::get('password')) : null;
    $data     = compact('nama', 'email', 'akses', 'alamat', 'username', 'password');

    // rubah user
    $rubah = \User::rubahProfil($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }

}