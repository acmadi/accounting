<?php namespace Lela\Proses;

class Detailgaji {

  /**
   * tambah detail gaji
   * 
   * @return bool
   */
  public function tambah()
  {
    // input

    $kd_potongan		= \Input::get('kd_potongan');
	
	$nomor	 	    	= \Input::get('nomor');
    $jumlah     		= \Input::get('jumlah');	

    $data    = compact('kd_potongan', 'nomor', 'jumlah');
	
	
    // tambah detail gaji
    $tambah = \Detailgajiku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari detail gaji  * 
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
      $data  = \Detailgajiku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Detailgajiku::urut($kolom, $tipe);

    return $data;
  }

  /**
   * rubah detail gaji
   * 
   * @param  int  $id id detail gaji
   * @return bool
   */
  public function rubah($id)
  {
    // input
    
    $kd_potongan		= \Input::get('kd_potongan');
	
	$nomor	 	    	= \Input::get('nomor');
    $jumlah     		= \Input::get('jumlah');	

    $data    = compact('kd_potongan', 'nomor', 'jumlah');
	
	
    // rubah detail gaji
    $rubah = \Detailgajiku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }

}