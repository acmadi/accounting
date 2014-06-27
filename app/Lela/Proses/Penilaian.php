<?php namespace Lela\Proses;

class Penilaian {

  /**
   * tambah penilaian
   * 
   * @return bool
   */
  public function tambah()
  {
    // input

    $kd_absen			= \Input::get('kd_absen');
	
	$kd_penilaian    		= \Input::get('kd_penilaian');
    $kinerja				= \Input::get('kinerja');

    $data    = compact('kd_absen', 'kd_penilaian', 'kinerja');
	
	
    // tambah penilaian
    $tambah = \Penilaianku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari penilaian * 
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
      $data  = \Penilaianku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Penilaianku::urut($kolom, $tipe);

    return $data;
  }

  /**
   * rubah penilaian
   * 
   * @param  int  $id id penilaian
   * @return bool
   */
  public function rubah($id)
  {
    // input
    
    $kd_absen			= \Input::get('kd_absen');
	
	$kd_penilaian    	= \Input::get('kd_penilaian');
    $kinerja			= \Input::get('kinerja');

    $data    = compact('kd_absen', 'kd_penilaian', 'kinerja');
	
    // rubah penilaian
    $rubah = \Penilaianku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }

}
