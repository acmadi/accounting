<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Statusku extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'status';

  /**
	 * Fillable column
	 *
	 * @var array
	 */
	protected $fillable = array(
		'id_status', 'status_name'
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
   * getter semua status
   * 
   * @return collection
   */
  public static function semua()
  {
    return Statusku::orderBy('id_status', 'asc')
      ->get();
  }

  /**
   * getter data status
   * 
   * @return collection
   */
  public static function data()
  {
    return Statusku::orderBy('id_status', 'asc')
      ->paginate(10);
  }

  /**
   * urut status
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
  public static function urut($kolom, $tipe)
  {
    return Statusku::orderBy($kolom, $tipe)
      ->paginate(10);
  }

  /**
   * cari status
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode status
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return Statusku::orderBy($kolom, $tipe)
      ->where('id_status', 'like', '%'.$cari.'%')
      ->get();
  }

  /**
   * tambah data status
   * 
   * @param  array $data data status
   * @return bool
   */
   
  public static function tambah($data)
  {
    // data
    $status          = new Statusku;
    
	$status->id_status		= $data['id_status'];
    $status->status_name 	= $data['status_name'];

    // simpan
    return ($status->save()) ? true : false;
  }

  /**
   * set status
   * 
   * @param int $id 
   */
  public static function set($id)
  {
    return Statusku::find($id);
  }

  /**
   * rubah status
   * 
   * @param  int   $id   id status
   * @param  array $data data status
   * @return bool
   */
   
  public static function rubah($id, $data)
  {
    // data
    $status		        = Statusku::find($id);

	$status->id_status		= $data['id_status'];
    $status->status_name 	= $data['status_name'];

    // simpan
    return ($status->save()) ? true : false;
  }

  /**
   * hapus status
   * 
   * @param  int $id id golongan
   * @return void
   */
   
  public static function hapus($id)
  {
  	$status = static::set($id);

    Statusku::destroy($id);
  }




}