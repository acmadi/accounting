<?php namespace Lela\Proses;

class Potongan {

  /**
   * tambah potongan
   * 
   * @return bool
   */
  public function tambah()
  {
    // input
	$kd_potongan 		= \Input::get('kd_potongan');
    $nama_potongan	    = \Input::get('nama_potongan');

	
    $data     = compact('kd_potongan', 'nama_potongan');


    // tambah potongan
    $tambah = \Potonganku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari potongan
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
      $data  = \Potonganku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Potonganku::urut($kolom, $tipe);

    return $data;
  }

  /**
   * rubah potongan
   * 
   * @param  int  $id id potongan
   * @return bool
   */
  public function rubah($id)
  {
    // input
	$kd_potongan 		= \Input::get('kd_potongan');
    $nama_potongan	    = \Input::get('nama_potongan');

	
    $data     = compact('kd_potongan', 'nama_potongan');



    // rubah potongan
    $rubah = \Potonganku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }


}