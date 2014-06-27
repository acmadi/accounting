<?php namespace Lela\Proses;

class Tunjangan {

  /**
   * tambah tunjangan
   * 
   * @return bool
   */
  public function tambah()
  {
    // input

    $kd_absen		= \Input::get('kd_absen');
	
	$kd_tunjangan 	    = \Input::get('kd_tunjangan');
    $ttl_tun_kes		= \Input::get('ttl_tun_kes');
	$ttl_tun_makan	 	= \Input::get('ttl_tun_makan');
    $ttl_tun_transport	= \Input::get('ttl_tun_transport');
	$ttl_tun	 	    = \Input::get('ttl_tun');

    $data    = compact('kd_absen', 'kd_tunjangan', 'ttl_tun_kes', 'ttl_tun_makan', 'ttl_tun_transport', 'ttl_tun');
	
	
    // tambah tunjangan
    $tambah = \Tunjanganku::tambah($data);

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
      $data  = \Tunjanganku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Tunjanganku::urut($kolom, $tipe);

    return $data;
  }

  /**
   * rubah tunjangan
   * 
   * @param  int  $id id tunjangan
   * @return bool
   */
  public function rubah($id)
  {
    // input
    
    $kd_absen		= \Input::get('kd_absen');
	
	$kd_tunjangan 	    = \Input::get('kd_tunjangan');
    $ttl_tun_kes		= \Input::get('ttl_tun_kes');
	$ttl_tun_makan	 	= \Input::get('ttl_tun_makan');
    $ttl_tun_transport	= \Input::get('ttl_tun_transport');
	$ttl_tun	 	    = \Input::get('ttl_tun');

    $data    = compact('kd_absen', 'kd_tunjangan', 'ttl_tun_kes', 'ttl_tun_makan', 'ttl_tun_transport', 'ttl_tun');
	
	
    // rubah tunjangan
    $rubah = \Tunjanganku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }

}
