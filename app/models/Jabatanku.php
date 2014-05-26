<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Jabatanku extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'jabatan';

  /**
	 * Fillable column
	 *
	 * @var array
	 */
	protected $fillable = array(
		'kd_jab', 'nama_jabatan', 'tun_kes', 'tun_mkn', 'tun_transport'
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
	 * Get the password for the jabatan.
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
   * getter semua jabatan
   * 
   * @return collection
   */
  public static function semua()
  {
    return Jabatanku::orderBy('kd_jab', 'asc')
      ->get();
  }

  /**
   * getter data jabatan
   * 
   * @return collection
   */
  public static function data()
  {
    return Jabatanku::orderBy('kd_jab', 'asc')
      ->paginate(10);
  }

  /**
   * urut jabatan
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
  public static function urut($kolom, $tipe)
  {
    return Jabatanku::orderBy($kolom, $tipe)
      ->paginate(10);
  }

  /**
   * cari jabatan
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode jabatan
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return Jabatanku::orderBy($kolom, $tipe)
      ->where('kd_jab', 'like', '%'.$cari.'%')
      ->get();
  }

  /**
   * tambah data jabatan
   * 
   * @param  array $data data jabatan
   * @return bool
   */
   
  public static function tambah($data)
  {
    // data
    $jabatan           = new Jabatanku;
    	
    $jabatan->kd_jab     		= $data['kd_jab'];
	$jabatan->nama_jabatan		= $data['nama_jabatan'];
    $jabatan->tun_kes    		= $data['tun_kes'];
    $jabatan->tun_mkn    		= $data['tun_mkn'];
    $jabatan->tun_transport	= $data['tun_transport'];
	
    // simpan
    return ($jabatan->save()) ? true : false;
  }

  /**
   * set jabatan
   * 
   * @param int $id 
   */
  public static function set($id)
  {
    return Jabatanku::find($id);
  }

  /**
   * rubah jabatan
   * 
   * @param  int   $id   id jabatan
   * @param  array $data data jabatan
   * @return bool
   */
   
  public static function rubah($id, $data)
  {
    // data
    $jabatan           		= Jabatanku::find($id);

	$jabatan->kd_jab     		= $data['kd_jab'];
	$jabatan->nama_jabatan		= $data['nama_jabatan'];
    $jabatan->tun_kes    		= $data['tun_kes'];
    $jabatan->tun_mkn    		= $data['tun_mkn'];
    $jabatan->tun_transport		= $data['tun_transport'];
	
    // simpan
    return ($jabatan->save()) ? true : false;
  }

  /**
   * hapus jabatan
   * 
   * @param  int $id id jabatan
   * @return void
   */
   
  public static function hapus($id)
  {
  	$jabatan = static::set($id);

    Jabatanku::destroy($id);
  }




}