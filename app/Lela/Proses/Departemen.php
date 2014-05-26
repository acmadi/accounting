<?php namespace Lela\Proses;

class Departemen {

  /**
   * tambah departemen
   * 
   * @return bool
   */
  public function tambah()
  {
    // input
	$kd_dep     = \Input::get('kd_dep');
    $nama_dep     = \Input::get('nama_dep');
	
    $data     = compact('kd_dep', 'nama_dep');


    // tambah departemen
    $tambah = \Departemenme::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari departemen
   * 
   * @return collection
   */
  public function cari()
  {
    // input
    $urut  = explode('-', \Input::get('sort'));
    $kolom = $urut[0];
    $tipe  = $urut[1];
    $cari  = \Input::get('cari');

    // cari
    if (! empty($cari))
      $data  = \Departemenme::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Departemenme::urut($kolom, $tipe);

    return $data;
  }

  /**
   * rubah agama
   * 
   * @param  int  $id id departemen
   * @return bool
   */
  public function rubah($id)
  {
    // input
	$kd_dep     = \Input::get('kd_dep');
    $nama_dep     = \Input::get('nama_dep');

    $data     = compact('kd_dep', 'nama_dep');


    // rubah departemen
    $rubah = \Departemenme::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }


}