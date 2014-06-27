<?php

class Gajiku extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'gaji';

  /**
   * Fillable column
   *
   * @var array
   */
   
  protected $fillable = array('kd_tunjangan', 'kd_lembur', 'kd_pph', 'kd_gaji', 'tanggal', 'tun_jab', 'ttl_tunjangan', 'pph_thr', 'pph_gaji_sebulan', 'jml_potongan', 'ttl_lembur', 'gaji_pokok', 'gaji_bruto', 'gaji_bersih');

  /**
   * getter semua gaji
   * 
   * @return collection
   */

  public static function semua()
  {
    return DB::table('gaji')
      ->join('tunjangan', 'gaji.kd_tunjangan', '=', 'tunjangan.kd_tunjangan')
      ->join('lembur', 'gaji.kd_lembur', '=', 'lembur.kd_lembur')
      ->join('pph', 'gaji.kd_pph', '=', 'pph.kd_pph')

      ->select('tunjangan.kd_tunjangan', 'lembur.kd_lembur', 'pph.kd_pph', 'gaji.id', 'gaji.kd_gaji', 'gaji.tanggal', 'gaji.tun_jab', 'gaji.ttl_tunjangan', 'gaji.pph_thr', 'gaji.pph_gaji_sebulan', 'gaji.jml_potongan', 'gaji.ttl_lembur', 'gaji.gaji_pokok', 'gaji.gaji_bruto', 'gaji.gaji_bersih')
	  
      ->orderBy('gaji.kd_gaji', 'asc')
	  
      ->get();
  }

  /**
   * getter data gaji
   * 
   * @return collection
   */
   
  public static function data()
  {
    return DB::table('gaji')
      ->join('tunjangan', 'gaji.kd_tunjangan', '=', 'tunjangan.kd_tunjangan')
      ->join('lembur', 'gaji.kd_lembur', '=', 'lembur.kd_lembur')
      ->join('pph', 'gaji.kd_pph', '=', 'pph.kd_pph')
	  
      ->select('tunjangan.kd_tunjangan', 'lembur.kd_lembur', 'pph.kd_pph', 'gaji.id', 'gaji.kd_gaji', 'gaji.tanggal', 'gaji.tun_jab', 'gaji.ttl_tunjangan', 'gaji.pph_thr', 'gaji.pph_gaji_sebulan', 'gaji.jml_potongan', 'gaji.ttl_lembur', 'gaji.gaji_pokok', 'gaji.gaji_bruto', 'gaji.gaji_bersih')
	  
      ->orderBy('gaji.kd_gaji', 'asc')
	  
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
   return DB::table('gaji')
      ->join('tunjangan', 'gaji.kd_tunjangan', '=', 'tunjangan.kd_tunjangan')
      ->join('lembur', 'gaji.kd_lembur', '=', 'lembur.kd_lembur')
      ->join('pph', 'gaji.kd_pph', '=', 'pph.kd_pph')
	  
      ->select('tunjangan.kd_tunjangan', 'lembur.kd_lembur', 'pph.kd_pph', 'gaji.id', 'gaji.kd_gaji', 'gaji.tanggal', 'gaji.tun_jab', 'gaji.ttl_tunjangan', 'gaji.pph_thr', 'gaji.pph_gaji_sebulan', 'gaji.jml_potongan', 'gaji.ttl_lembur', 'gaji.gaji_pokok', 'gaji.gaji_bruto', 'gaji.gaji_bersih')
	  
	   ->orderBy($kolom, $tipe)
	  
      ->paginate(10);
  }

  /**
   * cari gaji
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode gaji
   * @return collection
   */
   
  public static function cari($kolom, $tipe, $cari)
  {
    return DB::table('gaji')
      ->join('tunjangan', 'gaji.kd_tunjangan', '=', 'tunjangan.kd_tunjangan')
      ->join('lembur', 'gaji.kd_lembur', '=', 'lembur.kd_lembur')
      ->join('pph', 'gaji.kd_pph', '=', 'pph.kd_pph')
	  
      ->select('tunjangan.kd_tunjangan', 'lembur.kd_lembur', 'pph.kd_pph', 'gaji.id', 'gaji.kd_gaji', 'gaji.tanggal', 'gaji.tun_jab', 'gaji.ttl_tunjangan', 'gaji.pph_thr', 'gaji.pph_gaji_sebulan', 'gaji.jml_potongan', 'gaji.ttl_lembur', 'gaji.gaji_pokok', 'gaji.gaji_bruto', 'gaji.gaji_bersih')

      ->where('gaji.kd_gaji', 'like', '%'.$cari.'%')
      ->orderBy($kolom, $tipe)
      ->paginate(10);
  }


  /**
   * tambah data gaji
   * 
   * @param  array $data data gaji
   * @return bool
   */
  public static function tambah($data)
  {

    // data
    $gaji	          	= new Gajiku;
    $gaji->kd_tunjangan			= $data['kd_tunjangan'];
    $gaji->kd_lembur  			= $data['kd_lembur'];
    $gaji->kd_pph  				= $data['kd_pph'];

    $gaji->kd_gaji  			= $data['kd_gaji'];
    $gaji->tanggal  			= $data['tanggal'];
    $gaji->tun_jab  			= $data['tun_jab'];
    $gaji->ttl_tunjangan		= $data['ttl_tunjangan'];
    $gaji->pph_thr  			= $data['pph_thr'];
    $gaji->pph_gaji_sebulan 	= $data['pph_gaji_sebulan'];
    $gaji->jml_potongan  		= $data['jml_potongan'];
    $gaji->ttl_lembur  			= $data['ttl_lembur'];
    $gaji->gaji_pokok  			= $data['gaji_pokok'];
    $gaji->gaji_bruto  			= $data['gaji_bruto'];
    $gaji->gaji_bersih  		= $data['gaji_bersih'];
	
    // simpan
    return ($gaji->save()) ? true : false;
  }

  /**
   * set gaji
   * 
   * @param int $id 
   */
   
  public static function set($id)
  {
   return DB::table('gaji')
      ->join('tunjangan', 'gaji.kd_tunjangan', '=', 'tunjangan.kd_tunjangan')
      ->join('lembur', 'gaji.kd_lembur', '=', 'lembur.kd_lembur')
      ->join('pph', 'gaji.kd_pph', '=', 'pph.kd_pph')
	  
      ->select('tunjangan.kd_tunjangan', 'lembur.kd_lembur', 'pph.kd_pph', 'gaji.id', 'gaji.kd_gaji', 'gaji.tanggal', 'gaji.tun_jab', 'gaji.ttl_tunjangan', 'gaji.pph_thr', 'gaji.pph_gaji_sebulan', 'gaji.jml_potongan', 'gaji.ttl_lembur', 'gaji.gaji_pokok', 'gaji.gaji_bruto', 'gaji.gaji_bersih')

      ->where('gaji.id', '=', $id)
      ->first();
  }

  /**
   * rubah gaji
   * 
   * @param  int   $id   id gaji
   * @param  array $data data gaji
   * @return bool
   */
  public static function rubah($id, $data)
  {
    // data
    $gaji          = Gajiku::find($id);
	
    $gaji->kd_tunjangan			= $data['kd_tunjangan'];
    $gaji->kd_lembur  			= $data['kd_lembur'];
    $gaji->kd_pph  				= $data['kd_pph'];
	
    $gaji->kd_gaji  			= $data['kd_gaji'];
    $gaji->tanggal  			= $data['tanggal'];
    $gaji->tun_jab  			= $data['tun_jab'];
    $gaji->ttl_tunjangan		= $data['ttl_tunjangan'];
    $gaji->pph_thr  			= $data['pph_thr'];
    $gaji->pph_gaji_sebulan 	= $data['pph_gaji_sebulan'];
    $gaji->jml_potongan  		= $data['jml_potongan'];
    $gaji->ttl_lembur  			= $data['ttl_lembur'];
    $gaji->gaji_pokok  			= $data['gaji_pokok'];
    $gaji->gaji_bruto  			= $data['gaji_bruto'];
    $gaji->gaji_bersih  		= $data['gaji_bersih'];

    // simpan
    return ($gaji->save()) ? true : false;
  }

  /**
   * hapus pph
   * 
   * @param  int $id id gaji
   * @return void
   */
   
  public static function hapus($id)
  {
    Gajiku::destroy($id);
  }

}