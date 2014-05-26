<?php namespace Lela\Proses;

class Agama {

  /**
   * tambah agama
   * 
   * @return bool
   */
  public function tambah()
  {
    // input
	$kd_agama = \Input::get('kd_agama');
    $nama     = \Input::get('nama');
	
    $data     = compact('kd_agama', 'nama');


    // tambah agama
    $tambah = \Agamaku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari agama
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
      $data  = \Agamaku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Agamaku::urut($kolom, $tipe);

    return $data;
  }

  /**
   * rubah agama
   * 
   * @param  int  $id id agama
   * @return bool
   */
  public function rubah($id)
  {
    // input
	$kd_agama = \Input::get('kd_agama');
    $nama     = \Input::get('nama');

    $data     = compact('kd_agama', 'nama');



    // rubah agama
    $rubah = \Agamaku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }


}