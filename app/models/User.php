<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

use Cartalyst\Sentry\Users\Eloquent\User as SentryUserModel;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

  /**
	 * Fillable column
	 *
	 * @var array
	 */
	protected $fillable = array(
		'foto', 'nama', 'nama_belakang', 'email', 'jabatan', 'alamat', 'username', 'password'
	);

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	 
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

  /**
   * getter semua pengguna
   * 
   * @return collection
   */
  public static function semua()
  {
    return User::orderBy('nama', 'asc')
      ->get();
  }

  /**
   * getter data pengguna
   * 
   * @return collection
   */
  public static function data()
  {
    return User::orderBy('nama', 'asc')
      ->paginate(10);
  }

  /**
   * urut user
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
  public static function urut($kolom, $tipe)
  {
    return User::orderBy($kolom, $tipe)
      ->paginate(10);
  }

  /**
   * cari user
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode user
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return User::orderBy($kolom, $tipe)
      ->where('nama', 'like', '%'.$cari.'%')
      ->get();
  }

  /**
   * tambah data pengguna
   * 
   * @param  array $data data pengguna
   * @return bool
   */
   
  public static function tambah($data)
  {
    // data
    $pengguna           = new User;

    if (isset($data[0]['foto']))
    	$pengguna->foto   = $data[0]['foto'];
    	
    $pengguna->nama     		= $data['nama'];
	$pengguna->nama_belakang	= $data['nama_belakang'];
    $pengguna->email    		= $data['email'];
    $pengguna->akses    		= $data['akses'];
    $pengguna->alamat   		= $data['alamat'];
    $pengguna->username 		= $data['username'];
    $pengguna->password 		= $data['password'];

	
    // simpan
    return ($pengguna->save()) ? true : false;
  }

  /**
   * set pengguna
   * 
   * @param int $id 
   */
  public static function set($id)
  {
    return User::find($id);
  }

  /**
   * rubah pengguna
   * 
   * @param  int   $id   id pengguna
   * @param  array $data data pengguna
   * @return bool
   */
   
  public static function rubah($id, $data)
  {
    // data
    $pengguna           		= User::find($id);
    $pengguna->nama     		= $data['nama'];
	$pengguna->nama_belakang	= $data['nama_belakang'];
    $pengguna->email   			= $data['email'];
    $pengguna->akses    		= $data['akses'];
    $pengguna->alamat   		= $data['alamat'];
    $pengguna->username 		= $data['username'];
    $pengguna->password 		= $data['password'];

    // simpan
    return ($pengguna->save()) ? true : false;
  }

  /**
   * hapus pengguna
   * 
   * @param  int $id id pengguna
   * @return void
   */
   
  public static function hapus($id)
  {
  	$user = static::set($id);

  	if ($user->foto)
  		unlink(public_path().'/foto/'.$user->foto);
	
    User::destroy($id);
  }

	/**
	 * rubah foto user
	 * 
	 * @param  int    $id   id user
	 * @param  string $nama nama foto
	 * @return bool
	 */
	public static function rubahFoto($id, $nama)
	{
		// input
		$user       = static::set($id);
		$user->foto = $nama;

		// simpan foto
		return ($user->save()) ? true : false;
	}

	/**
	 * rubah data profil
	 * 
	 * @param  int   $id   id user
	 * @param  array $data data user
	 * @return bool
	 */
	public static function rubahProfil($id, $data)
	{
		// input
		$user          			= User::find($id);
		$user->nama    			= $data['nama'];
		$user->nama_belakang	= $data['nama_belakang'];
		$user->email   			= $data['email'];
		$user->akses  			= $data['akses'];
		$user->alamat  			= $data['alamat'];

		// ada input username
		if (! is_null($data['username'])) 
			$user->username = $data['username'];

		// ada input password
		if (! is_null($data['password']))
			$user->password = $data['password'];

		// simpan profil
		return ($user->save()) ? true : false;
	}

}