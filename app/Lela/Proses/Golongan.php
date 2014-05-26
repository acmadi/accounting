<?php namespace Lela\Proses;

class Golongan {

  /**
   * tambah golongan
   * 
   * @return bool
   */
  public function tambah()
  {
    // input
	$kd_gol     = \Input::get('kd_gol');
    $gol_pok    = \Input::get('gol_pok');
	$tun_jab	= \input::get('tun_jab');
    $data     	= compact('kd_gol', 'gol_pok', 'tun_jab');


    // tambah golongan
    $tambah = \Golonganku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari golongan
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
      $data  = \Golonganku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Golonganku::urut($kolom, $tipe);

    return $data;
  }

  /**
   * rubah golongan
   * 
   * @param  int  $id id golongan
   * @return bool
   */
  public function rubah($id)
  {
    // input
	$kd_gol     = \Input::get('kd_gol');
    $gol_pok    = \Input::get('gol_pok');
	$tun_jab	= \input::get('tun_jab');
    $data     	= compact('kd_gol', 'gol_pok', 'tun_jab');


    // rubah golongan
    $rubah = \Golonganku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }


}