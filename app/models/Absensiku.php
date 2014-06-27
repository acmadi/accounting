<?php

class Absensiku extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'absensi';

  /**
   * Fillable column
   *
   * @var array
   */
  protected $fillable = array('kd_karyawan', 'kd_absen', 'tanggal', 'cuti', 'ijin', 'sakit', 'alpha');

  /**
   * getter semua absensi
   * 
   * @return collection
   */
  public static function semua()
  {
    return DB::table('absensi')
      ->join('karyawan', 'absensi.kd_karyawan', '=', 'karyawan.kd_karyawan')
	  
      ->select('karyawan.kd_karyawan', 'absensi.kd_absen', 'absensi.tanggal', 'absensi.cuti', 'absensi.ijin', 'absensi.sakit', 'absensi.alpha')
	  
      ->orderBy('absensi.kd_absen', 'asc')
	  
      ->get();
  }

  /**
   * getter data absensi
   * 
   * @return collection
   */
   
  public static function data()
  {
    return DB::table('absensi')
      ->join('karyawan', 'absensi.kd_karyawan', '=', 'karyawan.kd_karyawan')
	  
      ->select('karyawan.kd_karyawan', 'absensi.id', 'absensi.kd_absen', 'absensi.tanggal', 'absensi.cuti', 'absensi.ijin', 'absensi.sakit', 'absensi.alpha')

      ->orderBy('absensi.kd_absen', 'asc')
	  
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
   return DB::table('absensi')
      ->join('karyawan', 'absensi.kd_karyawan', '=', 'karyawan.kd_karyawan')
	  
      ->select('karyawan.kd_karyawan', 'absensi.id', 'absensi.kd_absen', 'absensi.tanggal', 'absensi.cuti', 'absensi.ijin', 'absensi.sakit', 'absensi.alpha')

	   ->orderBy($kolom, $tipe)
	  
      ->paginate(10);
  }

  /**
   * cari absensi
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode/nomor absensi
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return DB::table('absensi')
      ->join('karyawan', 'absensi.kd_karyawan', '=', 'karyawan.kd_karyawan')
	  
		->select('karyawan.kd_karyawan', 'absensi.id', 'absensi.kd_absen', 'absensi.tanggal', 'absensi.cuti', 'absensi.ijin', 'absensi.sakit', 'absensi.alpha')

      ->where('absensi.kd_absen', 'like', '%'.$cari.'%')
      ->orderBy($kolom, $tipe)
      ->paginate(10);
  }


  /**
   * tambah data absensi
   * 
   * @param  array $data data absensi
   * @return bool
   */
  public static function tambah($data)
  {
  
error_reporting("E_ALL") ;

    // data
    $absensi	          			= new Absensiku;
    $absensi->kd_karyawan			= $data['kd_karyawan'];
	
    $absensi->kd_absen  		= $data['kd_absen'];
    $absensi->tanggal  			= $data['tanggal'];	
    $absensi->cuti  			= $data['cuti'];
    $absensi->ijin  			= $data['ijin'];	
    $absensi->sakit  			= $data['sakit'];
    $absensi->alpha  			= $data['alpha'];	
	
    // simpan
    return ($absensi->save()) ? true : false;
  }

  /**
   * set absensi
   * 
   * @param int $id 
   */
  public static function set($id)
  {
   return DB::table('absensi')
      ->join('karyawan', 'absensi.kd_absen', '=', 'absensi.kd_absen')
	  
		->select('karyawan.kd_karyawan', 'absensi.id', 'absensi.kd_absen', 'absensi.tanggal', 'absensi.cuti', 'absensi.ijin', 'absensi.sakit', 'absensi.alpha')

      ->where('absensi.id', '=', $id)
      ->first();
  }

  /**
   * rubah absensi
   * 
   * @param  int   $id   id absensi
   * @param  array $data data absensi
   * @return bool
   */
  public static function rubah($id, $data)
  {
    // data
    $absensi          = Absensiku::find($id);
	
    $absensi->kd_karyawan	= $data['kd_karyawan'];
	
    $absensi->kd_absen  	= $data['kd_absen'];
    $absensi->tanggal		= $data['tanggal'];
    $absensi->cuti  		= $data['cuti'];
    $absensi->ijin			= $data['ijin'];
    $absensi->sakit  		= $data['sakit'];
    $absensi->alpha			= $data['alpha'];

    // simpan
    return ($absensi->save()) ? true : false;
  }

  /**
   * hapus absensi
   * 
   * @param  int $id id absensi
   * @return void
   */
  public static function hapus($id)
  {
    Absensiku::destroy($id);
  }

}