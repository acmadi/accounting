<?php

class Corp extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'perusahaan';

  /**
   * Fillable column
   *
   * @var array
   */
  protected $fillable = array('logo', 'nama', 'alamat');

  /**
   * getter data perusahaan
   * 
   * @return collection
   */
  public static function data()
  {
    return Corp::first();
  }

  /**
   * rubah logo perusahaan
   * 
   * @param  int    $id   id perusahaan
   * @param  string $nama nama logo
   * @return bool
   */
  public static function rubahLogo($id, $nama)
  {
    // input
    $perusahaan       = Corp::find($id);
    $perusahaan->logo = $nama;

    // simpan logo
    return ($perusahaan->save()) ? true : false;
  }

  /**
   * rubah data perusahaan
   * 
   * @param  int   $id   id perusahaan
   * @param  array $data data perusahaan
   * @return bool
   */
  public static function rubah($id, $data)
  {
    // input
    $perusahaan          = Corp::find($id);
    $perusahaan->nama    = $data['nama'];
    $perusahaan->alamat  = $data['alamat'];

    // simpan perusahaan
    return ($perusahaan->save()) ? true : false;
  }

}