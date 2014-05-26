<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Golonganku extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'golongan';

  /**
	 * Fillable column
	 *
	 * @var array
	 */
	protected $fillable = array(
		'kd_gol', 'gol_pok', 'tun_jab'
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
   * getter semua golongan
   * 
   * @return collection
   */
  public static function semua()
  {
    return Golonganku::orderBy('kd_gol', 'asc')
      ->get();
  }

  /**
   * getter data golongan
   * 
   * @return collection
   */
  public static function data()
  {
    return Golonganku::orderBy('kd_gol', 'asc')
      ->paginate(10);
  }

  /**
   * urut golongan
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
  public static function urut($kolom, $tipe)
  {
    return Golonganku::orderBy($kolom, $tipe)
      ->paginate(10);
  }

  /**
   * cari golongan
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode golongan
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return Golonganku::orderBy($kolom, $tipe)
      ->where('kd_gol', 'like', '%'.$cari.'%')
      ->get();
  }

  /**
   * tambah data golongan
   * 
   * @param  array $data data golongan
   * @return bool
   */
   
  public static function tambah($data)
  {
    // data
    $golongan           = new Golonganku;
    
	$golongan->kd_gol		= $data['kd_gol'];
    $golongan->gol_pok 		= $data['gol_pok'];
	$golongan->tun_jab		= $data['tun_jab'];

    // simpan
    return ($golongan->save()) ? true : false;
  }

  /**
   * set golongan
   * 
   * @param int $id 
   */
  public static function set($id)
  {
    return Golonganku::find($id);
  }

  /**
   * rubah golongan
   * 
   * @param  int   $id   id golongan
   * @param  array $data data golongan
   * @return bool
   */
   
  public static function rubah($id, $data)
  {
    // data
    $golongan		        = Golonganku::find($id);

	$golongan->kd_gol		= $data['kd_gol'];
    $golongan->gol_pok 		= $data['gol_pok'];
	$golongan->tun_jab		= $data['tun_jab'];

    // simpan
    return ($golongan->save()) ? true : false;
  }

  /**
   * hapus golongan
   * 
   * @param  int $id id golongan
   * @return void
   */
   
  public static function hapus($id)
  {
  	$golongan = static::set($id);

    Golonganku::destroy($id);
  }




}