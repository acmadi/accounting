<?php namespace Lela\Proses;

class Owner {

  /**
   * tambah owner
   * 
   * @return bool
   */
  public function tambah()
  {
    // input

    $kd_karyawan		= \Input::get('kd_karyawan');
    $kd_perusahaan		= \Input::get('kd_perusahaan');
	$kd_marketing  		= \Input::get('kd_marketing');
	
	$kd_owner	     	= \Input::get('kd_owner');
    $username     		= \Input::get('username');	
	$password     		= \Input::get('password');
    $nama_depan			= \Input::get('nama_depan');	
	$nama_belakang	    = \Input::get('nama_belakang');
    $handphone			= \Input::get('handphone');	
	$npwp		     	= \Input::get('npwp');
    $alamat   			= \Input::get('alamat');	
	$kota	     		= \Input::get('kota');
    $propinsi			= \Input::get('propinsi');	
	$kode_pos     		= \Input::get('kode_pos');
    $email  			= \Input::get('email');	

    $data    = compact('kd_karyawan', 'kd_perusahaan', 'kd_marketing', 'kd_owner', 'username', 'password', 'nama_depan', 'nama_belakang', 'handphone', 'npwp', 'alamat', 'kota', 'propinsi', 'kode_pos', 'email');


	
	
    // tambah owner
    $tambah = \Ownerku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari Ownerku   * 
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
      $data  = \Ownerku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Ownerku::urut($kolom, $tipe);

    return $data;
  }

  /**
   * rubah owner
   * 
   * @param  int  $id id owner
   * @return bool
   */
  public function rubah($id)
  {
    // input
    
    $kd_karyawan		= \Input::get('kd_karyawan');
    $kd_perusahaan		= \Input::get('kd_perusahaan');
	$kd_marketing  		= \Input::get('kd_marketing');
	
	$kd_owner	     	= \Input::get('kd_owner');
    $username     		= \Input::get('username');	
	$password     		= \Input::get('password');
    $nama_depan			= \Input::get('nama_depan');	
	$nama_belakang	    = \Input::get('nama_belakang');
    $handphone			= \Input::get('handphone');	
	$npwp		     	= \Input::get('npwp');
    $alamat   			= \Input::get('alamat');	
	$kota	     		= \Input::get('kota');
    $propinsi			= \Input::get('propinsi');	
	$kode_pos     		= \Input::get('kode_pos');
    $email  			= \Input::get('email');	

    $data    = compact('kd_karyawan', 'kd_perusahaan', 'kd_marketing', 'kd_owner', 'username', 'password', 'nama_depan', 'nama_belakang', 'handphone', 'npwp', 'alamat', 'kota', 'propinsi', 'kode_pos', 'email');

	
	
    // rubah owner
    $rubah = \Ownerku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }

}