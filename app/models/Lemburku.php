<?php

class Lemburku extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'lembur';

  /**
   * Fillable column
   *
   * @var array
   */
  protected $fillable = array('kd_tunjangan', 'kd_lembur', 'jml_lembur_biasa', 'jml_lembur_libur', 'tarif_biasa', 'tarif_libur', 'total');

  /**
   * getter semua lembur
   * 
   * @return collection
   */
  public static function semua()
  {
    return DB::table('lembur')
      ->join('tunjangan', 'lembur.kd_tunjangan', '=', 'tunjangan.kd_tunjangan')
	  
      ->select('tunjangan.kd_tunjangan', 'lembur.kd_lembur', 'lembur.jml_lembur_biasa', 'lembur.jml_lembur_libur', 'lembur.tarif_biasa', 'lembur.tarif_libur', 'lembur.total')
	  
      ->orderBy('lembur.kd_lembur', 'asc')
	  
      ->get();
  }

  /**
   * getter data lembur
   * 
   * @return collection
   */
   
  public static function data()
  {
    return DB::table('lembur')
      ->join('tunjangan', 'lembur.kd_tunjangan', '=', 'tunjangan.kd_tunjangan')
	  
      ->select('tunjangan.kd_tunjangan', 'lembur.id', 'lembur.kd_lembur', 'lembur.jml_lembur_biasa', 'lembur.jml_lembur_libur', 'lembur.tarif_biasa', 'lembur.tarif_libur', 'lembur.total')

      ->orderBy('lembur.kd_lembur', 'asc')
	  
      ->paginate(10);
  }

  /**
   * urut lembur
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
   
  public static function urut($kolom, $tipe)
  {
   return DB::table('lembur')
      ->join('tunjangan', 'lembur.kd_tunjangan', '=', 'tunjangan.kd_tunjangan')
	  
      ->select('tunjangan.kd_tunjangan', 'lembur.id', 'lembur.kd_lembur', 'lembur.jml_lembur_biasa', 'lembur.jml_lembur_libur', 'lembur.tarif_biasa', 'lembur.tarif_libur', 'lembur.total')

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
    return DB::table('lembur')
      ->join('tunjangan', 'lembur.kd_tunjangan', '=', 'tunjangan.kd_tunjangan')
	  
      ->select('tunjangan.kd_tunjangan', 'lembur.id', 'lembur.kd_lembur', 'lembur.jml_lembur_biasa', 'lembur.jml_lembur_libur', 'lembur.tarif_biasa', 'lembur.tarif_libur', 'lembur.total')

      ->where('lembur.kd_lembur', 'like', '%'.$cari.'%')
      ->orderBy($kolom, $tipe)
      ->paginate(10);
  }


  /**
   * tambah data lembur
   * 
   * @param  array $data data lembur
   * @return bool
   */
  public static function tambah($data)
  {

    // data
    $lembur	          				= new Lemburku;
	
    $lembur->kd_tunjangan			= $data['kd_tunjangan'];
	
    $lembur->kd_lembur  			= $data['kd_lembur'];
    $lembur->jml_lembur_biasa		= $data['jml_lembur_biasa'];	
    $lembur->jml_lembur_libur  		= $data['jml_lembur_libur'];
    $lembur->tarif_biasa			= $data['tarif_biasa'];	
    $lembur->tarif_libur  			= $data['tarif_libur'];
    $lembur->total  				= $data['total'];
	
    // simpan
    return ($lembur->save()) ? true : false;
}

  /**
   * set lembur
   * 
   * @param int $id 
   */
  public static function set($id)
  {
   return DB::table('lembur')
      ->join('tunjangan', 'lembur.kd_lembur', '=', 'lembur.kd_lembur')
	  
      ->select('tunjangan.kd_tunjangan', 'lembur.id', 'lembur.kd_lembur', 'lembur.jml_lembur_biasa', 'lembur.jml_lembur_libur', 'lembur.tarif_biasa', 'lembur.tarif_libur', 'lembur.total')

      ->where('lembur.id', '=', $id)
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
    $lembur          = Lemburku::find($id);
	
    $lembur->kd_tunjangan			= $data['kd_tunjangan'];
	
    $lembur->kd_lembur  			= $data['kd_lembur'];
    $lembur->jml_lembur_biasa		= $data['jml_lembur_biasa'];	
    $lembur->jml_lembur_libur  		= $data['jml_lembur_libur'];
    $lembur->tarif_biasa			= $data['tarif_biasa'];	
    $lembur->tarif_libur  			= $data['tarif_libur'];
    $lembur->total  				= $data['total'];
	
    // simpan
    return ($lembur->save()) ? true : false;
  }

  /**
   * hapus lembur
   * 
   * @param  int $id id lembur
   * @return void
   */
  public static function hapus($id)
  {
    Lemburku::destroy($id);
  }

}