<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Pkpku extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pkp';

  /**
	 * Fillable column
	 *
	 * @var array
	 */
	protected $fillable = array(
		'kd_pkp', 'batas_pkp', 'tarif'
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
   * getter semua pkp
   * 
   * @return collection
   */
  public static function semua()
  {
    return Pkpku::orderBy('kd_pkp', 'asc')
      ->get();
  }

  /**
   * getter data pkp
   * 
   * @return collection
   */
  public static function data()
  {
    return Pkpku::orderBy('kd_pkp', 'asc')
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
    return Pkpku::orderBy($kolom, $tipe)
      ->paginate(10);
  }

  /**
   * cari pkp
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode pkp
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return Pkpku::orderBy($kolom, $tipe)
      ->where('kd_pkp', 'like', '%'.$cari.'%')
      ->get();
  }

  /**
   * tambah data pkp
   * 
   * @param  array $data data pkp
   * @return bool
   */
   
  public static function tambah($data)
  {
    // data
    $pkp           = new Pkpku;
    
	$pkp->kd_pkp 		= $data['kd_pkp'];	
    $pkp->batas_pkp		= $data['batas_pkp'];
	$pkp->tarif			= $data['tarif'];

    // simpan
    return ($pkp->save()) ? true : false;
  }

  /**
   * set pkp
   * 
   * @param int $id 
   */
  public static function set($id)
  {
    return Pkpku::find($id);
  }

  /**
   * rubah pkp
   * 
   * @param  int   $id   id pkp
   * @param  array $data data pkp
   * @return bool
   */
   
  public static function rubah($id, $data)
  {
    // data
    $pkp           		= Pkpku::find($id);
	
	$pkp->kd_pkp   		= $data['kd_pkp'];
    $pkp->batas_pkp		= $data['batas_pkp'];
    $pkp->tarif			= $data['tarif'];
	
    // simpan
    return ($pkp->save()) ? true : false;
  }

  /**
   * hapus pkp
   * 
   * @param  int $id id pkp
   * @return void
   */
   
  public static function hapus($id)
  {
  	$pkp = static::set($id);

	Pkpku::destroy($id);
  }


}