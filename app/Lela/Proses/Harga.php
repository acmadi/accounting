<?php namespace Lela\Proses;

class Harga {

  /**
   * tambah harga
   * 
   * @return bool
   */
  public function tambah()
  {
    // input
	$kd_harga 		= \Input::get('kd_harga');
    $nama_harga     = \Input::get('nama_harga');
    $harga		    = \Input::get('harga');	
	
	
    $data     = compact('kd_harga', 'nama_harga' ,'harga');


    // tambah harga
    $tambah = \Hargaku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari harga
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
      $data  = \Hargaku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Hargaku::urut($kolom, $tipe);

    return $data;
  }

  /**
   * rubah harga
   * 
   * @param  int  $id id harga
   * @return bool
   */
  public function rubah($id)
  {
    // input
	$kd_harga 		= \Input::get('kd_harga');
    $nama_harga     = \Input::get('nama_harga');
    $harga		    = \Input::get('harga');	
	

    $data     = compact('kd_harga', 'nama_harga' ,'harga');



    // rubah harga
    $rubah = \Hargaku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }


}