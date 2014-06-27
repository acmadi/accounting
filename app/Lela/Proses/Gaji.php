<?php namespace Lela\Proses;

class Gaji {

  /**
   * tambah gaji
   * 
   * @return bool
   */

  public function tambah()
  {
    // input

    $kd_tunjangan		= \Input::get('kd_tunjangan');
    $kd_lembur			= \Input::get('kd_lembur');
    $kd_pph				= \Input::get('kd_pph');
	
	$kd_gaji	     		= \Input::get('kd_gaji');
    $tanggal     			= \Input::get('tanggal');	
	$tun_jab   				= \Input::get('tun_jab');
	$ttl_tunjangan			= \Input::get('ttl_tunjangan');
	$pph_thr   				= \Input::get('pph_thr');
	$pph_gaji_sebulan		= \Input::get('pph_gaji_sebulan');
	$jml_potongan 			= \Input::get('jml_potongan');
	$ttl_lembur   			= \Input::get('ttl_lembur');
	$gaji_pokok   			= \Input::get('gaji_pokok');
	$gaji_bruto   			= \Input::get('gaji_bruto');
	$gaji_bersih   			= \Input::get('gaji_bersih');

    $data    = compact('kd_tunjangan', 'kd_lembur', 'kd_pph', 'kd_gaji', 'tanggal', 'tun_jab', 'ttl_tunjangan', 'pph_thr', 'pph_gaji_sebulan', 'jml_potongan', 'ttl_lembur', 'gaji_pokok', 'gaji_bruto', 'gaji_bersih');

    // tambah gaji
    $tambah = \Gajiku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari gaji   * 
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
      $data  = \Gajiku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Gajiku::urut($kolom, $tipe);

    return $data;
}


  /**
   * rubah gaji
   * 
   * @param  int  $id id gaji
   * @return bool
   */
  public function rubah($id)
  {
    // input
	
    $kd_tunjangan		= \Input::get('kd_tunjangan');
    $kd_lembur			= \Input::get('kd_lembur');
    $kd_pph				= \Input::get('kd_pph');
	
	$kd_gaji	     		= \Input::get('kd_gaji');
    $tanggal     			= \Input::get('tanggal');	
	$tun_jab   				= \Input::get('tun_jab');
	$ttl_tunjangan			= \Input::get('ttl_tunjangan');
	$pph_thr   				= \Input::get('pph_thr');
	$pph_gaji_sebulan		= \Input::get('pph_gaji_sebulan');
	$jml_potongan 			= \Input::get('jml_potongan');
	$ttl_lembur   			= \Input::get('ttl_lembur');
	$gaji_pokok   			= \Input::get('gaji_pokok');
	$gaji_bruto   			= \Input::get('gaji_bruto');
	$gaji_bersih   			= \Input::get('gaji_bersih');

    $data    = compact('kd_tunjangan', 'kd_lembur', 'kd_pph', 'kd_gaji', 'tanggal', 'tun_jab', 'ttl_tunjangan', 'pph_thr', 'pph_gaji_sebulan', 'jml_potongan', 'ttl_lembur', 'gaji_pokok', 'gaji_bruto', 'gaji_bersih');

    // rubah gaji
    $rubah = \Gajiku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }

}