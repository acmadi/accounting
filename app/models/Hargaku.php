<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Hargaku extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'harga';

  /**
	 * Fillable column
	 *
	 * @var array
	 */
	protected $fillable = array(
		'kd_harga', 'nama_harga', 'harga'
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
   * getter semua harga
   * 
   * @return collection
   */
  public static function semua()
  {
    return Hargaku::orderBy('kd_harga', 'asc')
      ->get();
  }

  /**
   * getter data harga
   * 
   * @return collection
   */
  public static function data()
  {
    return Hargaku::orderBy('kd_harga', 'asc')
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
    return Hargaku::orderBy($kolom, $tipe)
      ->paginate(10);
  }

  /**
   * cari harga
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode harga
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return Hargaku::orderBy($kolom, $tipe)
      ->where('kd_harga', 'like', '%'.$cari.'%')
      ->get();
  }

  /**
   * tambah data harga
   * 
   * @param  array $data data harga
   * @return bool
   */
   
  public static function tambah($data)
  {
    // data
    $harga           = new Hargaku;
    
	$harga->kd_harga 		= $data['kd_harga'];	
    $harga->nama_harga 		= $data['nama_harga'];
	$harga->harga			= $data['harga'];

    // simpan
    return ($harga->save()) ? true : false;
  }

  /**
   * set harga
   * 
   * @param int $id 
   */
  public static function set($id)
  {
    return Hargaku::find($id);
  }

  /**
   * rubah harga
   * 
   * @param  int   $id   id harga
   * @param  array $data data harga
   * @return bool
   */
   
  public static function rubah($id, $data)
  {
    // data
    $harga           		= Hargaku::find($id);
	$harga->kd_harga   		= $data['kd_harga'];
    $harga->nama_harga		= $data['nama_harga'];
    $harga->harga			= $data['harga'];
	
    // simpan
    return ($harga->save()) ? true : false;
  }

  /**
   * hapus harga
   * 
   * @param  int $id id harga
   * @return void
   */
   
  public static function hapus($id)
  {
  	$harga = static::set($id);

	Hargaku::destroy($id);
  }


}