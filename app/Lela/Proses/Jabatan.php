<?php namespace Lela\Proses;

class Jabatan {

  /**
   * tambah jabatan
   * 
   * @return bool
   */
  public function tambah()
  {
    // input
    $kd_jab   		= \Input::get('kd_jab');
    $nama_jabatan   = \Input::get('nama_jabatan');
    $tun_kes   		= \Input::get('tun_kes');
    $tun_mkn 		= \Input::get('tun_mkn');
	$tun_transport	= \Input::get('tun_transport');
    $data   		= compact('kd_jab', 'nama_jabatan', 'tun_kes', 'tun_mkn', 'tun_mkn', 'tun_transport');


    // tambah jabatan
    $tambah = \Jabatanku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari jabatan
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
      $data  = \Jabatanku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Jabatanku::urut($kolom, $tipe);

    return $data;
  }

  /**
   * rubah jabatan
   * 
   * @param  int  $id id jabatan
   * @return bool
   */
  public function rubah($id)
  {
   // input
    $kd_jab   		= \Input::get('kd_jab');
    $nama_jabatan   = \Input::get('nama_jabatan');
    $tun_kes   		= \Input::get('tun_kes');
    $tun_mkn 		= \Input::get('tun_mkn');
	$tun_transport	= \Input::get('tun_transport');
    $data   		= compact('kd_jab', 'nama_jabatan', 'tun_kes', 'tun_mkn', 'tun_mkn', 'tun_transport');

    // rubah jabatan
    $rubah = \Jabatanku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }


}