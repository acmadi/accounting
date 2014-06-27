<?php

class Pphku extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'pph';

  /**
   * Fillable column
   *
   * @var array
   */
   
  protected $fillable = array('kd_pkp', 'kd_lembur', 'kd_pph', 'pph_thr', 'pph_gaji_sebulan');

  /**
   * getter semua owner
   * 
   * @return collection
   */
  public static function semua()
  {
    return DB::table('pph')
      ->join('pkp', 'pph.kd_pkp', '=', 'pkp.kd_pkp')
      ->join('lembur', 'pph.kd_lembur', '=', 'lembur.kd_lembur')
	  
      ->select('pkp.kd_pkp', 'lembur.kd_lembur', 'pph.id', 'pph.kd_pph', 'pph.pph_thr', 'pph.pph_gaji_sebulan')
	  
      ->orderBy('pph.kd_pph', 'asc')
	  
      ->get();
  }

  /**
   * getter data pph
   * 
   * @return collection
   */
   
  public static function data()
  {
    return DB::table('pph')
      ->join('pkp', 'pph.kd_pkp', '=', 'pkp.kd_pkp')
      ->join('lembur', 'pph.kd_lembur', '=', 'lembur.kd_lembur')
	  
      ->select('pkp.kd_pkp', 'lembur.kd_lembur', 'pph.id', 'pph.kd_pph', 'pph.pph_thr', 'pph.pph_gaji_sebulan')
	  
      ->orderBy('pph.kd_pph', 'asc')
	  
      ->paginate(10);
  }

  /**
   * urut pph
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
  public static function urut($kolom, $tipe)
  {
   return DB::table('pph')
      ->join('pkp', 'pph.kd_pkp', '=', 'pkp.kd_pkp')
	  ->join('lembur', 'pph.kd_lembur', '=', 'lembur.kd_lembur')
	  
      ->select('pkp.kd_pkp', 'lembur.kd_lembur', 'pph.id', 'pph.kd_pph', 'pph.pph_thr', 'pph.pph_gaji_sebulan')
	  
	   ->orderBy($kolom, $tipe)
	  
      ->paginate(10);
  }

  /**
   * cari owner
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode owner
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return DB::table('pph')
      ->join('pkp', 'pph.kd_pkp', '=', 'pkp.kd_pkp')
	  ->join('lembur', 'pph.kd_lembur', '=', 'lembur.kd_lembur')
	  
      ->select('pkp.kd_pkp', 'lembur.kd_lembur', 'pph.id', 'pph.kd_pph', 'pph.pph_thr', 'pph.pph_gaji_sebulan')

      ->where('pph.kd_pph', 'like', '%'.$cari.'%')
      ->orderBy($kolom, $tipe)
      ->paginate(10);
  }


  /**
   * tambah data pph
   * 
   * @param  array $data data pph
   * @return bool
   */
  public static function tambah($data)
  {
  
error_reporting("E_ALL") ;

    // data
    $pph	          	= new Pphku;
    $pph->kd_pkp			= $data['kd_pkp'];
    $pph->kd_lembur  		= $data['kd_lembur'];
	
    $pph->kd_pph  			= $data['kd_pph'];
    $pph->pph_thr  			= $data['pph_thr'];
    $pph->pph_gaji_sebulan  = $data['pph_gaji_sebulan'];
	
    // simpan
    return ($pph->save()) ? true : false;
  }

  /**
   * set pph
   * 
   * @param int $id 
   */
  public static function set($id)
  {
   return DB::table('pph')
      ->join('pkp', 'pph.kd_pkp', '=', 'pkp.kd_pkp')
	  ->join('lembur', 'pph.kd_lembur', '=', 'lembur.kd_lembur')
	  
      ->select('pkp.kd_pkp', 'lembur.kd_lembur', 'pph.id', 'pph.kd_pph', 'pph.pph_thr', 'pph.pph_gaji_sebulan')

      ->where('pph.id', '=', $id)
      ->first();
  }

  /**
   * rubah pph
   * 
   * @param  int   $id   id pph
   * @param  array $data data pph
   * @return bool
   */
  public static function rubah($id, $data)
  {
    // data
    $pph          = Pphku::find($id);
	
    $pph->kd_pkp			= $data['kd_pkp'];
    $pph->kd_lembur  		= $data['kd_lembur'];
	
    $pph->kd_pph  				= $data['kd_pph'];
    $pph->pph_thr  				= $data['pph_thr'];
    $pph->pph_gaji_sebulan  	= $data['pph_gaji_sebulan'];

    // simpan
    return ($pph->save()) ? true : false;
  }

  /**
   * hapus pph
   * 
   * @param  int $id id pph
   * @return void
   */
   
  public static function hapus($id)
  {
    Pphku::destroy($id);
  }

}