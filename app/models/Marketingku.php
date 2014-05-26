<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Marketingku extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'marketing';

  /**
	 * Fillable column
	 *
	 * @var array
	 */
	protected $fillable = array(
		'kd_marketing', 'nama_depan', 'nama_belakang', 'username', 'password', 'email', 'no_hp', 'alamat', 'kota', 'propinsi', 'kode_pos'
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
	 * Get the password for the marketing.
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
   * getter semua marketing
   * 
   * @return collection
   */
  public static function semua()
  {
    return Marketingku::orderBy('kd_marketing', 'asc')
      ->get();
  }

  /**
   * getter data marketing
   * 
   * @return collection
   */
  public static function data()
  {
    return Marketingku::orderBy('kd_marketing', 'asc')
      ->paginate(10);
  }

  /**
   * urut marketing
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
  public static function urut($kolom, $tipe)
  {
    return Marketingku::orderBy($kolom, $tipe)
      ->paginate(10);
  }

  /**
   * cari marketing
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode marketing
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return Marketingku::orderBy($kolom, $tipe)
      ->where('kd_marketing', 'like', '%'.$cari.'%')
      ->get();
  }

  /**
   * tambah data marketing
   * 
   * @param  array $data data marketing
   * @return bool
   */
   
  public static function tambah($data)
  {
    // data
    $marketing           = new Marketingku;
    	
    $marketing->kd_marketing     	= $data['kd_marketing'];
	$marketing->nama_depan			= $data['nama_depan'];
    $marketing->nama_belakang 		= $data['nama_belakang'];
    $marketing->username   			= $data['username'];
    $marketing->password			= $data['password'];
    $marketing->email				= $data['email'];
    $marketing->no_hp				= $data['no_hp'];
    $marketing->alamat				= $data['alamat'];
    $marketing->kota				= $data['kota'];
    $marketing->propinsi			= $data['propinsi'];
    $marketing->kode_pos			= $data['kode_pos'];
	
    // simpan
    return ($marketing->save()) ? true : false;
  }

  /**
   * set marketing
   * 
   * @param int $id 
   */
  public static function set($id)
  {
    return Marketingku::find($id);
  }

  /**
   * rubah marketing
   * 
   * @param  int   $id   id marketing
   * @param  array $data data marketing
   * @return bool
   */

  public static function rubah($id, $data)
  {
    // data
    $marketing          		= Marketingku::find($id);

    $marketing->kd_marketing     	= $data['kd_marketing'];
	$marketing->nama_depan			= $data['nama_depan'];
    $marketing->nama_belakang 		= $data['nama_belakang'];
    $marketing->username   			= $data['username'];
    $marketing->password			= $data['password'];
    $marketing->email				= $data['email'];
    $marketing->no_hp				= $data['no_hp'];
    $marketing->alamat				= $data['alamat'];
    $marketing->kota				= $data['kota'];
    $marketing->propinsi			= $data['propinsi'];
    $marketing->kode_pos			= $data['kode_pos'];
	
    // simpan
    return ($marketing->save()) ? true : false;
  }

  /**
   * hapus marketing
   * 
   * @param  int $id id marketing
   * @return void
   */
   
  public static function hapus($id)
  {
  	$marketing = static::set($id);

    Marketingku::destroy($id);
  }



}