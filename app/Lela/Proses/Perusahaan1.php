<?php namespace Lela\Proses;

class Perusahaan1 {

  /**
   * tambah perusahaan1
   * 
   * @return bool
   */
  public function tambah()
  {
    // input
	$kd_perusahaan     	= \Input::get('kd_perusahaan');
    $nama_perusahaan   	= \Input::get('nama_perusahaan');
	$alamat				= \input::get('alamat');
	$kota				= \input::get('kota');
	$propinsi			= \input::get('propinsi');
	$kode_pos			= \input::get('kode_pos');
	$handphone			= \input::get('handphone');
	$telephone			= \input::get('telephone');
	$fax				= \input::get('fax');
	$email				= \input::get('email');
				
	
    $data     	= compact('kd_perusahaan', 'nama_perusahaan', 'alamat', 'kota', 'propinsi', 'kode_pos', 'handphone', 'telephone', 'fax', 'email');


    // tambah perusahaan1
    $tambah = \Perusahaan1ku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari perusahaan1
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
      $data  = \Perusahaan1ku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Perusahaan1ku::urut($kolom, $tipe);

    return $data;
  }

  /**
   * rubah perusahaan1
   * 
   * @param  int  $id id perusahaan1
   * @return bool
   */
  public function rubah($id)
  {
    // input
	$kd_perusahaan     	= \Input::get('kd_perusahaan');
    $nama_perusahaan   	= \Input::get('nama_perusahaan');
	$alamat				= \input::get('alamat');
	$kota				= \input::get('kota');
	$propinsi			= \input::get('propinsi');
	$kode_pos			= \input::get('kode_pos');
	$handphone			= \input::get('handphone');
	$telephone			= \input::get('telephone');
	$fax				= \input::get('fax');
	$email				= \input::get('email');
				
	
    $data     	= compact('kd_perusahaan', 'nama_perusahaan', 'alamat', 'kota', 'propinsi', 'kode_pos', 'handphone', 'telephone', 'fax', 'email');

    // rubah perusahaan1
    $rubah = \Perusahaan1ku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }


}