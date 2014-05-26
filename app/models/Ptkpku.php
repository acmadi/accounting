<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Ptkpku extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ptkp';

  /**
	 * Fillable column
	 *
	 * @var array
	 */
	protected $fillable = array(
		'kd_statuskawin', 'jumlah_ptkp', 'status_kawin'
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
   * getter semua ptkp
   * 
   * @return collection
   */
  public static function semua()
  {
    return Ptkpku::orderBy('kd_statuskawin', 'asc')
      ->get();
  }

  /**
   * getter data ptkp
   * 
   * @return collection
   */
  public static function data()
  {
    return Ptkpku::orderBy('kd_statuskawin', 'asc')
      ->paginate(10);
  }

  /**
   * urut ptkp
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
  public static function urut($kolom, $tipe)
  {
    return Ptkpku::orderBy($kolom, $tipe)
      ->paginate(10);
  }

  /**
   * cari ptkp
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode ptkp
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return Ptkpku::orderBy($kolom, $tipe)
      ->where('kd_statuskawin', 'like', '%'.$cari.'%')
      ->get();
  }

  /**
   * tambah data ptkp
   * 
   * @param  array $data data ptkp
   * @return bool
   */
   
  public static function tambah($data)
  {
    // data
    $ptkp           = new Ptkpku;
    
	$ptkp->kd_statuskawin		= $data['kd_statuskawin'];
    $ptkp->jumlah_ptkp	 		= $data['jumlah_ptkp'];
	$ptkp->status_kawin			= $data['status_kawin'];

    // simpan
    return ($ptkp->save()) ? true : false;
  }

  /**
   * set ptkp
   * 
   * @param int $id 
   */
  public static function set($id)
  {
    return Ptkpku::find($id);
  }

  /**
   * rubah ptkp
   * 
   * @param  int   $id   id ptkp
   * @param  array $data data ptkp
   * @return bool
   */
   
  public static function rubah($id, $data)
  {
    // data
    $ptkp		        = Ptkpku::find($id);

	$ptkp->kd_statuskawin		= $data['kd_statuskawin'];
    $ptkp->jumlah_ptkp	 		= $data['jumlah_ptkp'];
	$ptkp->status_kawin			= $data['status_kawin'];

    // simpan
    return ($ptkp->save()) ? true : false;
  }

  /**
   * hapus ptkp
   * 
   * @param  int $id id ptkp
   * @return void
   */
   
  public static function hapus($id)
  {
  	$ptkp = static::set($id);

    Ptkpku::destroy($id);
  }



}