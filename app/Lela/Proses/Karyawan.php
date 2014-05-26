<?php namespace Lela\Proses;

class Karyawan {

  /**
   * tambah karyawan
   * 
   * @return bool
   */
  public function tambah()
  {
    // input

    $kd_agama 		= \Input::get('kd_agama');
    $kd_dep  		= \Input::get('kd_dep');
	$kd_jab  		= \Input::get('kd_jab');
    $kd_gol  		= \Input::get('kd_gol');
    $kd_statuskawin	= \Input::get('kd_statuskawin');
	
	$kd_karyawan     	= \Input::get('kd_karyawan');
    $nik     			= \Input::get('nik');	
	$nama_depan     	= \Input::get('nama_depan');
    $nama_belakang		= \Input::get('nama_belakang');	
	$jen_kel	    	= \Input::get('jen_kel');
    $tempat_lahir		= \Input::get('tempat_lahir');	
	$tgl_lahir	     	= \Input::get('tgl_lahir');
    $pendidikan			= \Input::get('pendidikan');	
	$tgl_masuk	     	= \Input::get('tgl_masuk');
    $tgl_keluar			= \Input::get('tgl_keluar');	
	$alamat		     	= \Input::get('alamat');
    $desa     			= \Input::get('desa');	
	$kota		     	= \Input::get('kota');
    $propinsi   		= \Input::get('propinsi');	
	$kode_pos	     	= \Input::get('kode_pos');
    $no_telephone		= \Input::get('no_telephone');	
	$no_handphone     	= \Input::get('no_handphone');
    $email     			= \Input::get('email');	
    $npwp     			= \Input::get('npwp');	
	
    $data    = compact('kd_agama', 'kd_dep', 'kd_jab', 'kd_gol', 'kd_statuskawin', 'kd_karyawan', 'nik', 'nama_depan', 'nama_belakang', 'jen_kel', 'tempat_lahir', 'tgl_lahir', 'pendidikan', 'tgl_masuk', 'tgl_keluar', 'alamat', 'desa', 'kota', 'propinsi', 'kode_pos', 'no_telephone', 'no_handphone', 'email', 'npwp');

	
    if (\Input::hasFile('foto'))
    {
      // nama file
	  return 'ada foto';
      $eks  = \Input::file('foto')->getClientOriginalExtension();
      $foto = 'foto_'.date('dmYHis').'.'.$eks;
      $push = compact('foto');

      // unggah foto ke folder "public/foto"
      \Input::file('foto')->move('foto', $foto);

      array_push($data, $push);
    }


    // tambah karyawan
    $tambah = \Karyawanku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari Karyawan   * 
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
      $data  = \Karyawanku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Karyawanku::urut($kolom, $tipe);

    return $data;
  }

  /**
   * rubah karyawan
   * 
   * @param  int  $id id karyawan
   * @return bool
   */
  public function rubah($id)
  {
    // input
    
	$kd_agama 		= \Input::get('kd_agama');
    $kd_dep  		= \Input::get('kd_dep');
	$kd_jab  		= \Input::get('kd_jab');
    $kd_gol  		= \Input::get('kd_gol');
    $kd_statuskawin	= \Input::get('kd_statuskawin');
	
	$kd_karyawan     	= \Input::get('kd_karyawan');
    $nik     			= \Input::get('nik');	
	$nama_depan     	= \Input::get('nama_depan');
    $nama_belakang		= \Input::get('nama_belakang');	
	$jen_kel	    	= \Input::get('jen_kel');
    $tempat_lahir		= \Input::get('tempat_lahir');	
	$tgl_lahir	     	= \Input::get('tgl_lahir');
    $pendidikan			= \Input::get('pendidikan');	
	$tgl_masuk	     	= \Input::get('tgl_masuk');
    $tgl_keluar			= \Input::get('tgl_keluar');	
	$alamat		     	= \Input::get('alamat');
    $desa     			= \Input::get('desa');	
	$kota		     	= \Input::get('kota');
    $propinsi   		= \Input::get('propinsi');	
	$kode_pos	     	= \Input::get('kode_pos');
    $no_telephone		= \Input::get('no_telephone');	
	$no_handphone     	= \Input::get('no_handphone');
    $email     			= \Input::get('email');	
    $npwp     			= \Input::get('npwp');	
    $foto     			= \Input::get('foto');

    $data    = compact('kd_agama', 'kd_dep', 'kd_jab', 'kd_gol', 'kd_statuskawin', 'kd_karyawan', 'nik', 'nama_depan', 'nama_belakang', 'jen_kel', 'tempat_lahir', 'tgl_lahir', 'pendidikan', 'tgl_masuk', 'tgl_keluar', 'alamat', 'desa', 'kota', 'propinsi', 'kode_pos', 'no_telephone', 'no_handphone', 'email', 'npwp', 'foto');

	
    // rubah karyawan
    $rubah = \Karyawanku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }
  

  

}