<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Perusahaan1ku extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'perusahaan1';

  /**
	 * Fillable column
	 *
	 * @var array
	 */
	protected $fillable = array(
		'kd_perusahaan', 'nama_perusahaan', 'alamat', 'kota', 'propinsi', 'kode_pos', 'handphone', 'telephone', 'fax', 'email'
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
   * getter semua perusahaan1
   * 
   * @return collection
   */
  public static function semua()
  {
    return Perusahaan1ku::orderBy('kd_perusahaan', 'asc')
      ->get();
  }

  /**
   * getter data perusahaan1
   * 
   * @return collection
   */
  public static function data()
  {
    return Perusahaan1ku::orderBy('kd_perusahaan', 'asc')
      ->paginate(10);
  }

  /**
   * urut perusahaan1
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
  public static function urut($kolom, $tipe)
  {
    return Perusahaan1ku::orderBy($kolom, $tipe)
      ->paginate(10);
  }

  /**
   * cari perusahaan1
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode perusahaan1
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return Perusahaan1ku::orderBy($kolom, $tipe)
      ->where('kd_perusahaan', 'like', '%'.$cari.'%')
      ->get();
  }

  /**
   * tambah data perusahaan
   * 
   * @param  array $data data perusahaan
   * @return bool
   */
   
  public static function tambah($data)
  {
    // data
    $perusahaan1           = new Perusahaan1ku;
    
	$perusahaan1->kd_perusahaan			= $data['kd_perusahaan'];
    $perusahaan1->nama_perusahaan 		= $data['nama_perusahaan'];
	$perusahaan1->alamat				= $data['alamat'];
	$perusahaan1->kota					= $data['kota'];
	$perusahaan1->propinsi				= $data['propinsi'];
	$perusahaan1->kode_pos				= $data['kode_pos'];
	$perusahaan1->handphone				= $data['handphone'];
	$perusahaan1->telephone				= $data['telephone'];
	$perusahaan1->fax					= $data['fax'];
	$perusahaan1->email					= $data['email'];

    // simpan
    return ($perusahaan1->save()) ? true : false;
  }

  /**
   * set perusahaan1
   * 
   * @param int $id 
   */
  public static function set($id)
  {
    return Perusahaan1ku::find($id);
  }

  /**
   * rubah golongan
   * 
   * @param  int   $id   id perusahaan1
   * @param  array $data data perusahaan1
   * @return bool
   */
   
  public static function rubah($id, $data)
  {
    // data
    $perusahaan1		        = Perusahaan1ku::find($id);

	$perusahaan1->kd_perusahaan			= $data['kd_perusahaan'];
    $perusahaan1->nama_perusahaan 		= $data['nama_perusahaan'];
	$perusahaan1->alamat				= $data['alamat'];
	$perusahaan1->kota					= $data['kota'];
	$perusahaan1->propinsi				= $data['propinsi'];
	$perusahaan1->kode_pos				= $data['kode_pos'];
	$perusahaan1->handphone				= $data['handphone'];
	$perusahaan1->telephone				= $data['telephone'];
	$perusahaan1->fax					= $data['fax'];
	$perusahaan1->email					= $data['email'];

    // simpan
    return ($perusahaan1->save()) ? true : false;
  }

  /**
   * hapus perusahaan1
   * 
   * @param  int $id id perusahaan1
   * @return void
   */
   
  public static function hapus($id)
  {
  	$perusahaan1 = static::set($id);

    Perusahaan1ku::destroy($id);
  }




}