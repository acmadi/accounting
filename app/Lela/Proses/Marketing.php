<?php namespace Lela\Proses;

class Marketing {

  /**
   * tambah marketing
   * 
   * @return bool
   */
  public function tambah()
  {
    // input
    $kd_marketing   		= \Input::get('kd_marketing');
    $nama_depan   			= \Input::get('nama_depan');
    $nama_belakang			= \Input::get('nama_belakang');
    $username				= \Input::get('username');
    $password 				= \Hash::make(\Input::get('password'));
	$email					= \Input::get('email');
	$no_hp					= \Input::get('no_hp');
	$alamat					= \Input::get('alamat');
	$kota					= \Input::get('kota');
	$propinsi				= \Input::get('propinsi');
	$kode_pos				= \Input::get('kode_pos');


    $data   		= compact('kd_marketing', 'nama_depan', 'nama_belakang', 'username', 'password', 'email', 'no_hp', 'alamat', 'kota', 'propinsi', 'kode_pos');


    // tambah marketing
    $tambah = \Marketingku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari marketing
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
      $data  = \Marketingku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Marketingku::urut($kolom, $tipe);

    return $data;
  }

  /**
   * rubah marketing
   * 
   * @param  int  $id id marketing
   * @return bool
   */
  public function rubah($id)
  {
   // input
    $kd_marketing   		= \Input::get('kd_marketing');
    $nama_depan   			= \Input::get('nama_depan');
    $nama_belakang			= \Input::get('nama_belakang');
    $username				= \Input::get('username');
    $password 				= \Hash::make(\Input::get('password'));
	$email					= \Input::get('email');
	$no_hp					= \Input::get('no_hp');
	$alamat					= \Input::get('alamat');
	$kota					= \Input::get('kota');
	$propinsi				= \Input::get('propinsi');
	$kode_pos				= \Input::get('kode_pos');


    $data   		= compact('kd_marketing', 'nama_depan', 'nama_belakang', 'username', 'password', 'email', 'no_hp', 'alamat', 'kota', 'propinsi', 'kode_pos');

    // rubah marketing
    $rubah = \Marketingku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }


}