<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Potonganku extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'potongan';

  /**
	 * Fillable column
	 *
	 * @var array
	 */
	protected $fillable = array(
		'kd_potongan', 'nama_potongan'
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
   * getter semua potongan
   * 
   * @return collection
   */
  public static function semua()
  {
    return Potonganku::orderBy('kd_potongan', 'asc')
      ->get();
  }

  /**
   * getter data potongan
   * 
   * @return collection
   */
  public static function data()
  {
    return Potonganku::orderBy('kd_potongan', 'asc')
      ->paginate(10);
  }

  /**
   * urut potongan
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
  public static function urut($kolom, $tipe)
  {
    return Potonganku::orderBy($kolom, $tipe)
      ->paginate(10);
  }

  /**
   * cari potongan
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode potongan
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return Potonganku::orderBy($kolom, $tipe)
      ->where('kd_potongan', 'like', '%'.$cari.'%')
      ->get();
  }

  /**
   * tambah data potongan
   * 
   * @param  array $data data potongan
   * @return bool
   */
   
  public static function tambah($data)
  {
    // data
    $potongan           = new Potonganku;
    
	$potongan->kd_potongan 		= $data['kd_potongan'];	
    $potongan->nama_potongan 	= $data['nama_potongan'];

    // simpan
    return ($potongan->save()) ? true : false;
  }

  /**
   * set potongan
   * 
   * @param int $id 
   */
  public static function set($id)
  {
    return Potonganku::find($id);
  }

  /**
   * rubah potongan
   * 
   * @param  int   $id   id potongan
   * @param  array $data data potongan
   * @return bool
   */
   
  public static function rubah($id, $data)
  {
    // data
    $potongan           		= Potonganku::find($id);
	$potongan->kd_potongan 		= $data['kd_potongan'];
    $potongan->nama_potongan	= $data['nama_potongan'];
	
    // simpan
    return ($potongan->save()) ? true : false;
  }

  /**
   * hapus potongan
   * 
   * @param  int $id id potongan
   * @return void
   */
   
  public static function hapus($id)
  {
  	$potongan = static::set($id);

	Potonganku::destroy($id);
  }


}