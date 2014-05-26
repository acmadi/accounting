<?php namespace Lela\Proses;

class Ptkp {

  /**
   * tambah ptkp
   * 
   * @return bool
   */
  public function tambah()
  {
    // input
	$kd_statuskawin     = \Input::get('kd_statuskawin');
    $jumlah_ptkp   		= \Input::get('jumlah_ptkp');
	$status_kawin		= \input::get('status_kawin');
	
    $data     			= compact('kd_statuskawin', 'jumlah_ptkp', 'status_kawin');


    // tambah ptkp
    $tambah = \Ptkpku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari ptkp
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
      $data  = \Ptkpku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Ptkpku::urut($kolom, $tipe);

    return $data;
  }

  /**
   * rubah ptkp
   * 
   * @param  int  $id id ptkp
   * @return bool
   */
  public function rubah($id)
  {
    // rubah
	$kd_statuskawin     = \Input::get('kd_statuskawin');
    $jumlah_ptkp   		= \Input::get('jumlah_ptkp');
	$status_kawin		= \input::get('status_kawin');
	
    $data     			= compact('kd_statuskawin', 'jumlah_ptkp', 'status_kawin');


    // rubah ptkp
    $rubah = \Ptkpku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }


}