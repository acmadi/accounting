<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Departemenme extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'departemen';

  /**
	 * Fillable column
	 *
	 * @var array
	 */
	protected $fillable = array(
		'kd_dep', 'nama_dep'
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
   * getter semua departemen
   * 
   * @return collection
   */
  public static function semua()
  {
    return Departemenme::orderBy('nama_dep', 'asc')
      ->get();
  }

  /**
   * getter data departemen
   * 
   * @return collection
   */
  public static function data()
  {
    return Departemenme::orderBy('nama_dep', 'asc')
      ->paginate(10);
  }

  /**
   * urut departemen
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
  public static function urut($kolom, $tipe)
  {
    return Departemenme::orderBy($kolom, $tipe)
      ->paginate(10);
  }

  /**
   * cari departemen
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode departemen
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return Departemenme::orderBy($kolom, $tipe)
      ->where('nama_dep', 'like', '%'.$cari.'%')
      ->get();
  }

  /**
   * tambah data departemen
   * 
   * @param  array $data data departemen
   * @return bool
   */
   
  public static function tambah($data)
  {
    // data
    $departemen           = new Departemenme;
    
	$departemen->kd_dep 	= $data['kd_dep'];
    $departemen->nama_dep 	= $data['nama_dep'];

    // simpan
    return ($departemen->save()) ? true : false;
  }

  /**
   * set departemen
   * 
   * @param int $id 
   */
  public static function set($id)
  {
    return Departemenme::find($id);
  }

  /**
   * rubah departemen
   * 
   * @param  int   $id   id departemen
   * @param  array $data data departemen
   * @return bool
   */
   
  public static function rubah($id, $data)
  {
    // data
    $departemen        		= Departemenme::find($id);

    $departemen->kd_dep     		= $data['kd_dep'];	
    $departemen->nama_dep     		= $data['nama_dep'];

    // simpan
    return ($departemen->save()) ? true : false;
  }

  /**
   * hapus departemen
   * 
   * @param  int $id id departemen
   * @return void
   */
   
  public static function hapus($id)
  {
  	$departemen = static::set($id);

    Departemenme::destroy($id);
  }




}