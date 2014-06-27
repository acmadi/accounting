<?php namespace Lela\Proses;

class Pkp {

  /**
   * tambah pkp
   * 
   * @return bool
   */
  public function tambah()
  {
    // input
	$kd_pkp 		= \Input::get('kd_pkp');
    $batas_pkp	    = \Input::get('batas_pkp');
    $tarif		    = \Input::get('tarif');	
	
	
    $data     = compact('kd_pkp', 'batas_pkp' ,'tarif');


    // tambah pkp
    $tambah = \Pkpku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari pkp
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
      $data  = \Pkpku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Pkpku::urut($kolom, $tipe);

    return $data;
  }

  /**
   * rubah pkp
   * 
   * @param  int  $id id pkp
   * @return bool
   */
  public function rubah($id)
  {
    // input
	$kd_pkp 		= \Input::get('kd_pkp');
    $batas_pkp	    = \Input::get('batas_pkp');
    $tarif		    = \Input::get('tarif');	
	
	
    $data     = compact('kd_pkp', 'batas_pkp' ,'tarif');



    // rubah pkp
    $rubah = \Pkpku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }


}