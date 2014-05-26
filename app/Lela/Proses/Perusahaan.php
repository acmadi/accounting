<?php namespace Lela\Proses;

class Perusahaan {

  /**
   * rubah perusahaan
   * 
   * @param  int  $id id perusahaan
   * @return bool
   */
  public function rubah($id)
  {
    // input
    $nama     = \Input::get('nama');
    $alamat   = \Input::get('alamat');
    $data     = compact('nama', 'alamat');

    // rubah perusahaan
    $rubah = \Corp::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }

}