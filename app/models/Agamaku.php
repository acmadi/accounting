<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Agamaku extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'agama';

  /**
	 * Fillable column
	 *
	 * @var array
	 */
	protected $fillable = array(
		'kd_agama', 'nama'
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
   * getter semua agama
   * 
   * @return collection
   */
  public static function semua()
  {
    return Agamaku::orderBy('nama', 'asc')
      ->get();
  }

  /**
   * getter data agama
   * 
   * @return collection
   */
  public static function data()
  {
    return Agamaku::orderBy('nama', 'asc')
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
    return Agamaku::orderBy($kolom, $tipe)
      ->paginate(10);
  }

  /**
   * cari agama
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode agama
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return Agamaku::orderBy($kolom, $tipe)
      ->where('nama', 'like', '%'.$cari.'%')
      ->get();
  }

  /**
   * tambah data agama
   * 
   * @param  array $data data agama
   * @return bool
   */
   
  public static function tambah($data)
  {
    // data
    $agama           = new Agamaku;
    
	$agama->kd_agama 	= $data['kd_agama'];	
    $agama->nama 		= $data['nama'];

    // simpan
    return ($agama->save()) ? true : false;
  }

  /**
   * set agama
   * 
   * @param int $id 
   */
  public static function set($id)
  {
    return Agamaku::find($id);
  }

  /**
   * rubah agama
   * 
   * @param  int   $id   id agama
   * @param  array $data data agama
   * @return bool
   */
   
  public static function rubah($id, $data)
  {
    // data
    $agama           		= Agamaku::find($id);
	$agama->kd_agama   		= $data['kd_agama'];
    $agama->nama     		= $data['nama'];

    // simpan
    return ($agama->save()) ? true : false;
  }

  /**
   * hapus agama
   * 
   * @param  int $id id agama
   * @return void
   */
   
  public static function hapus($id)
  {
  	$agama = static::set($id);

    Agamaku::destroy($id);
  }




}