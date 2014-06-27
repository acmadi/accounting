<?php namespace Lela\Proses;

class Pengguna {

  /**
   * tambah pengguna
   * 
   * @return bool
   */
  public function tambah()
  {
    // input
    $nama     			= \Input::get('nama');
	$nama_belakang	  	= \Input::get('nama_belakang');
    $email				= \Input::get('email');
    $akses    			= \Input::get('jabatan');
    $alamat  			= \Input::get('alamat');
    $username 			= \Input::get('username');
    $password 			= \Hash::make(\Input::get('password'));
    $data     			= compact('nama', 'nama_belakang', 'email', 'akses', 'alamat', 'username', 'password');

	
    if (\Input::hasFile('foto'))
    {
      // nama file
      $eks  = \Input::file('foto')->getClientOriginalExtension();
      $foto = 'foto_'.date('dmYHis').'.'.$eks;
      $push = compact('foto');

      // unggah foto ke folder "public/foto"
      \Input::file('foto')->move('foto', $foto);

      array_push($data, $push);
    }

    // tambah pengguna
    $tambah = \User::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari pengguna
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
      $data  = \User::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \User::urut($kolom, $tipe);

    return $data;
  }

  /**
   * rubah pengguna
   * 
   * @param  int  $id id pengguna
   * @return bool
   */
  public function rubah($id)
  {
    // input
    $nama     			= \Input::get('nama');
	$nama_belakang	  	= \Input::get('nama_belakang');
    $email    			= \Input::get('email');
    $akses    			= \Input::get('jabatan');
    $alamat   			= \Input::get('alamat');
    $username 			= \Input::get('username');
    $password 			= \Hash::make(\Input::get('password'));
    $data     = compact('nama', 'nama_belakang', 'email', 'akses', 'alamat', 'username', 'password');

    // ada foto
    if (\Input::hasFile('foto'))
    {
      $user = \User::set($id);
      $foto = $user->foto;
      $tipe = 'foto';
      $eks  = \Input::file('foto')->getClientOriginalExtension();

      \Foto::unggah($id, $foto, $tipe, $eks);
    }

    // rubah pengguna
    $rubah = \User::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }

  /**
   * proses unggah foto
   * 
   * @param  file   $foto file foto/logo
   * @param  string $tipe tipe foto/logo
   * @param  string $eks  ekstensi foto/logo
   * @return void
   */
  private function unggah($id, $eks)
  {


    // foto
    if ($tipe == 'foto')
      \User::rubahFoto($id, $nama);
    // logo
    elseif($tipe == 'logo')
      \Corp::rubahLogo(1, $nama);
	elseif($tipe == 'fotokaryawan')
	  \Karyawanku::rubahFoto($id, $nama);
  
  }
  
  

}