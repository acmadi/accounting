<?php namespace Lela\Proses;

class Sewa {

  /**
   * tambah sewa
   * 
   * @return bool
   */
  public function tambah()
  {
    // input

    $kd_harga		= \Input::get('kd_harga');
	
	$kd_sewa	     	= \Input::get('kd_sewa');
    $nama_sewa     	= \Input::get('nama_sewa');	
	
    $data    = compact('kd_harga', 'kd_sewa', 'nama_sewa');
	
	
    // tambah sewa
    $tambah = \Sewaku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari sewa   * 
   * @return sewa
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
      $data  = \Sewaku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Sewaku::urut($kolom, $tipe);

    return $data;
}


  /**
   * rubah sewa
   * 
   * @param  int  $id id sewa
   * @return bool
   */
  public function rubah($id)
  {
    // input
    
    $kd_harga		= \Input::get('kd_harga');
	
	$kd_sewa	     	= \Input::get('kd_sewa');
    $nama_sewa     	= \Input::get('nama_sewa');	
	
    $data    = compact('kd_harga', 'kd_sewa', 'nama_sewa');

    // rubah sewa
    $rubah = \Sewaku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }
  

}