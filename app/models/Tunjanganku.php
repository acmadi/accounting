<?php

class Tunjanganku extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'tunjangan';

  /**
   * Fillable column
   *
   * @var array
   */
  protected $fillable = array('kd_absen', 'kd_tunjangan', 'ttl_tun_kes', 'ttl_tun_makan', 'ttl_tun_transport', 'ttl_tun');

  /**
   * getter semua tunjangan
   * 
   * @return collection
   */
   
  public static function semua()
  {
    return DB::table('tunjangan')
      ->join('absensi', 'tunjangan.kd_absen', '=', 'absensi.kd_absen')
	  
      ->select('absensi.kd_absen', 'tunjangan.kd_tunjangan', 'tunjangan.ttl_tun_kes', 'tunjangan.ttl_tun_makan', 'tunjangan.ttl_tun_transport', 'tunjangan.ttl_tun')
	  
      ->orderBy('tunjangan.kd_tunjangan', 'asc')
	  
      ->get();
  }

  /**
   * getter data tunjangan
   * 
   * @return collection
   */
   
  public static function data()
  {
    return DB::table('tunjangan')
      ->join('absensi', 'tunjangan.kd_absen', '=', 'absensi.kd_absen')
	  
      ->select('absensi.kd_absen', 'tunjangan.id', 'tunjangan.kd_tunjangan', 'tunjangan.ttl_tun_kes', 'tunjangan.ttl_tun_makan', 'tunjangan.ttl_tun_transport', 'tunjangan.ttl_tun')

      ->orderBy('tunjangan.kd_tunjangan', 'asc')
	  
      ->paginate(10);
  }

  /**
   * urut absensi
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
   
  public static function urut($kolom, $tipe)
  {
   return DB::table('tunjangan')
      ->join('absensi', 'tunjangan.kd_absen', '=', 'absensi.kd_absen')
	  
      ->select('absensi.kd_absen', 'tunjangan.id', 'tunjangan.kd_tunjangan', 'tunjangan.ttl_tun_kes', 'tunjangan.ttl_tun_makan', 'tunjangan.ttl_tun_transport', 'tunjangan.ttl_tun')

	   ->orderBy($kolom, $tipe)
	  
      ->paginate(10);
  }

  /**
   * cari absensi
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode/nomor tunjangan
   * @return collection
   */

  public static function cari($kolom, $tipe, $cari)
  {
    return DB::table('tunjangan')
      ->join('absensi', 'tunjangan.kd_absen', '=', 'absensi.kd_absen')
	  
      ->select('absensi.kd_absen', 'tunjangan.id', 'tunjangan.kd_tunjangan', 'tunjangan.ttl_tun_kes', 'tunjangan.ttl_tun_makan', 'tunjangan.ttl_tun_transport', 'tunjangan.ttl_tun')

      ->where('tunjangan.kd_tunjangan', 'like', '%'.$cari.'%')
      ->orderBy($kolom, $tipe)
      ->paginate(10);
  }


  /**
   * tambah data tunjangan
   * 
   * @param  array $data data tunjangan
   * @return bool
   */
   
  public static function tambah($data)
  {

    // data
    $tunjangan	          			= new Tunjanganku;
    $tunjangan->kd_absen			= $data['kd_absen'];
	
    $tunjangan->kd_tunjangan  		= $data['kd_tunjangan'];
    $tunjangan->ttl_tun_kes  		= $data['ttl_tun_kes'];	
    $tunjangan->ttl_tun_makan  		= $data['ttl_tun_makan'];
    $tunjangan->ttl_tun_transport	= $data['ttl_tun_transport'];	
    $tunjangan->ttl_tun  			= $data['ttl_tun'];
	
    // simpan
    return ($tunjangan->save()) ? true : false;
}

  /**
   * set tunjangan
   * 
   * @param int $id 
   */
  public static function set($id)
  {
   return DB::table('tunjangan')
      ->join('absensi', 'tunjangan.kd_tunjangan', '=', 'tunjangan.kd_tunjangan')
	  
      ->select('absensi.kd_absen', 'tunjangan.id', 'tunjangan.kd_tunjangan', 'tunjangan.ttl_tun_kes', 'tunjangan.ttl_tun_makan', 'tunjangan.ttl_tun_transport', 'tunjangan.ttl_tun')

      ->where('tunjangan.id', '=', $id)
      ->first();
  }

  /**
   * rubah tunjangan
   * 
   * @param  int   $id   id tunjangan
   * @param  array $data data tunjangan
   * @return bool
   */
   
  public static function rubah($id, $data)
  {
    // data
    $tunjangan          = Tunjanganku::find($id);
	
    $tunjangan->kd_absen	= $data['kd_absen'];
	
    $tunjangan->kd_tunjangan  		= $data['kd_tunjangan'];
    $tunjangan->ttl_tun_kes			= $data['ttl_tun_kes'];
    $tunjangan->ttl_tun_makan		= $data['ttl_tun_makan'];
    $tunjangan->ttl_tun_transport	= $data['ttl_tun_transport'];
    $tunjangan->ttl_tun				= $data['ttl_tun'];

    // simpan
    return ($tunjangan->save()) ? true : false;
  }

  /**
   * hapus tunjangan
   * 
   * @param  int $id id tunjangan
   * @return void
   */
  public static function hapus($id)
  {
    Tunjanganku::destroy($id);
  }

}