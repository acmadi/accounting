<?php namespace Lela\Proses;

class Pph {

  /**
   * tambah pph
   * 
   * @return bool
   */
  public function tambah()
  {
    // input

    $kd_pkp			= \Input::get('kd_pkp');
    $kd_lembur		= \Input::get('kd_lembur');
	
	$kd_pph	     		= \Input::get('kd_pph');
    $pph_thr     		= \Input::get('pph_thr');	
	$pph_gaji_sebulan   = \Input::get('pph_gaji_sebulan');

    $data    = compact('kd_pkp', 'kd_lembur', 'kd_pph', 'pph_thr', 'pph_gaji_sebulan');

	
    // tambah pph
    $tambah = \Pphku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari Pph   * 
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
      $data  = \Pphku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Pphku::urut($kolom, $tipe);

    return $data;
}


  /**
   * rubah pph
   * 
   * @param  int  $id id pph
   * @return bool
   */
  public function rubah($id)
  {
    // input
    
	$kd_pkp			= \Input::get('kd_pkp');
    $kd_lembur		= \Input::get('kd_lembur');
	
	$kd_pph	     		= \Input::get('kd_pph');
    $pph_thr     		= \Input::get('pph_thr');	
	$pph_gaji_sebulan   = \Input::get('pph_gaji_sebulan');

    $data    = compact('kd_pkp', 'kd_lembur', 'kd_pph', 'pph_thr', 'pph_gaji_sebulan');
	
	
    // rubah pph
    $rubah = \Pphku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }

}