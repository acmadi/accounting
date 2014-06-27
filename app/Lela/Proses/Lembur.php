<?php namespace Lela\Proses;

class Lembur {

  /**
   * tambah lembur
   * 
   * @return bool
   */
  public function tambah()
  {
    // input

    $kd_tunjangan			= \Input::get('kd_tunjangan');
	
	$kd_lembur 	    		= \Input::get('kd_lembur');
    $jml_lembur_biasa		= \Input::get('jml_lembur_biasa');
	$jml_lembur_libur	 	= \Input::get('jml_lembur_libur');
    $tarif_biasa			= \Input::get('tarif_biasa');
	$tarif_libur	 	    = \Input::get('tarif_libur');
	$total	 	    		= \Input::get('total');

    $data    = compact('kd_tunjangan', 'kd_lembur', 'jml_lembur_biasa', 'jml_lembur_libur', 'tarif_biasa', 'tarif_libur', 'total');
	
	
    // tambah lembur
    $tambah = \Lemburku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari tunjangan * 
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
      $data  = \Lemburku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Lemburku::urut($kolom, $tipe);

    return $data;
  }

  /**
   * rubah lembur
   * 
   * @param  int  $id id lembur
   * @return bool
   */
  public function rubah($id)
  {
    // input
    
    $kd_tunjangan			= \Input::get('kd_tunjangan');
	
	$kd_lembur 	    		= \Input::get('kd_lembur');
    $jml_lembur_biasa		= \Input::get('jml_lembur_biasa');
	$jml_lembur_libur	 	= \Input::get('jml_lembur_libur');
    $tarif_biasa			= \Input::get('tarif_biasa');
	$tarif_libur	 	    = \Input::get('tarif_libur');
	$total	 	    		= \Input::get('total');

    $data    = compact('kd_tunjangan', 'kd_lembur', 'jml_lembur_biasa', 'jml_lembur_libur', 'tarif_biasa', 'tarif_libur', 'total');
	
    // rubah lembur
    $rubah = \Lemburku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }

}
