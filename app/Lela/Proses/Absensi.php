<?php namespace Lela\Proses;

class Absensi {

  /**
   * tambah absensi
   * 
   * @return bool
   */
  public function tambah()
  {
    // input

    $kd_karyawan		= \Input::get('kd_karyawan');
	
	$kd_absen	 	    = \Input::get('kd_absen');
    $tanggal   			= \Input::get('tanggal');
	$cuti	 	    	= \Input::get('cuti');
    $ijin   			= \Input::get('ijin');
	$sakit	 	    	= \Input::get('sakit');
    $alpha   			= \Input::get('alpha');

    $data    = compact('kd_karyawan', 'kd_absen', 'tanggal', 'cuti', 'ijin', 'sakit', 'alpha');
	
	
    // tambah absen
    $tambah = \Absensiku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari absensi * 
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
      $data  = \Absensiku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Absensiku::urut($kolom, $tipe);

    return $data;
  }

  /**
   * rubah absensi
   * 
   * @param  int  $id id absensi
   * @return bool
   */
  public function rubah($id)
  {
    // input
    
    $kd_karyawan		= \Input::get('kd_karyawan');
	
	$kd_absen	 	    = \Input::get('kd_absen');
    $tanggal   			= \Input::get('tanggal');
	$cuti	 	    	= \Input::get('cuti');
    $ijin   			= \Input::get('ijin');
	$sakit	 	    	= \Input::get('sakit');
    $alpha   			= \Input::get('alpha');

    $data    = compact('kd_karyawan', 'kd_absen', 'tanggal', 'cuti', 'ijin', 'sakit', 'alpha');
	
	
    // rubah absensi
    $rubah = \Absensiku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }

}
