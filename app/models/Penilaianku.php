<?php

class Penilaianku extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'penilaian';

  /**
   * Fillable column
   *
   * @var array
   */
  protected $fillable = array('kd_absen', 'kd_penilaian', 'kinerja');

  /**
   * getter semua penilaian
   * 
   * @return collection
   */
  public static function semua()
  {
    return DB::table('penilaian')
      ->join('absensi', 'penilaian.kd_absen', '=', 'absensi.kd_absen')
	  
      ->select('absensi.kd_absen', 'penilaian.kd_penilaian', 'penilaian.kinerja')
	  
      ->orderBy('penilaian.kd_penilaian', 'asc')
	  
      ->get();
  }

  /**
   * getter data penilaian
   * 
   * @return collection
   */
   
  public static function data()
  {
    return DB::table('penilaian')
      ->join('absensi', 'penilaian.kd_absen', '=', 'absensi.kd_absen')
	  
      ->select('absensi.kd_absen', 'penilaian.id', 'penilaian.kd_penilaian', 'penilaian.kinerja')

      ->orderBy('penilaian.kd_penilaian', 'asc')
	  
      ->paginate(10);
  }

  /**
   * urut penilaian
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
   
  public static function urut($kolom, $tipe)
  {
   return DB::table('penilaian')
       ->join('absensi', 'penilaian.kd_absen', '=', 'absensi.kd_absen')
	  
      ->select('absensi.kd_absen', 'penilaian.id', 'penilaian.kd_penilaian', 'penilaian.kinerja')
	  ->orderBy($kolom, $tipe)
	  
      ->paginate(10);
  }

  /**
   * cari penilaian
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode/nomor tunjangan
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return DB::table('penilaian')
       ->join('absensi', 'penilaian.kd_absen', '=', 'absensi.kd_absen')
	  
      ->select('absensi.kd_absen', 'penilaian.id', 'penilaian.kd_penilaian', 'penilaian.kinerja')
	  
      ->where('penilaian.kd_penilaian', 'like', '%'.$cari.'%')
      ->orderBy($kolom, $tipe)
      ->paginate(10);
  }


  /**
   * tambah data penilaian
   * 
   * @param  array $data data penilaian
   * @return bool
   */
  public static function tambah($data)
  {

    // data
    $penilaian	          				= new Penilaianku;
	
    $penilaian->kd_absen			= $data['kd_absen'];
	
    $penilaian->kd_penilaian 		= $data['kd_penilaian'];
    $penilaian->kinerja				= $data['kinerja'];	
	
    // simpan
    return ($penilaian->save()) ? true : false;
}

  /**
   * set penilaian
   * 
   * @param int $id 
   */
  public static function set($id)
  {
   return DB::table('penilaian')
      ->join('absensi', 'penilaian.kd_penilaian', '=', 'penilaian.kd_penilaian')
	  
      ->select('absensi.kd_absen', 'penilaian.id', 'penilaian.kd_penilaian', 'penilaian.kinerja')
	  
      ->where('penilaian.id', '=', $id)
      ->first();
  }

  /**
   * rubah lembur
   * 
   * @param  int   $id   id lembur
   * @param  array $data data lembur
   * @return bool
   */
  public static function rubah($id, $data)
  {
    // data
    $penilaian          = Penilaianku::find($id);
	
    $penilaian->kd_absen			= $data['kd_absen'];
	
    $penilaian->kd_penilaian 		= $data['kd_penilaian'];
    $penilaian->kinerja				= $data['kinerja'];	
	
    // simpan
    return ($penilaian->save()) ? true : false;
  }

  /**
   * hapus penilaian
   * 
   * @param  int $id id penilaian
   * @return void
   */
  public static function hapus($id)
  {
    Penilaianku::destroy($id);
  }

}