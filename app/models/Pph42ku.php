<?php

class Pph42ku extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'pph4_2';

  /**
   * Fillable column
   *
   * @var array
   */
  protected $fillable = array('kd_perusahaan', 'id_pph42', 'jumlah_omzet', 'bulan', 'tahun', 'tanggal', 'nama_penyetor');

  /**
   * getter semua pph42
   * 
   * @return collection
   */
   
  public static function semua()
  {
    return DB::table('pph4_2')
      ->join('perusahaan1', 'pph4_2.kd_perusahaan', '=', 'perusahaan1.kd_perusahaan')
	  
      ->select('perusahaan1.kd_perusahaan', 'pph4_2.id', 'pph4_2.id_pph42', 'pph4_2.jumlah_omzet', 'pph4_2.bulan', 'pph4_2.tahun', 'pph4_2.tanggal', 'pph4_2.nama_penyetor')
	  
      ->orderBy('pph4_2.id_pph42', 'asc')
	  
      ->get();
  }

  /**
   * getter data pph42
   * 
   * @return collection
   */
   
  public static function data()
  {
    return DB::table('pph4_2')
      ->join('perusahaan1', 'pph4_2.kd_perusahaan', '=', 'perusahaan1.kd_perusahaan')
	  
      ->select('perusahaan1.kd_perusahaan', 'pph4_2.id', 'pph4_2.id_pph42', 'pph4_2.jumlah_omzet', 'pph4_2.bulan', 'pph4_2.tahun', 'pph4_2.tanggal', 'pph4_2.nama_penyetor')
	  
      ->orderBy('pph4_2.id_pph42', 'asc')
	  
      ->paginate(10);
  }

  /**
   * urut pph42
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
  public static function urut($kolom, $tipe)
  {
   return DB::table('pph4_2')
      ->join('perusahaan1', 'pph4_2.kd_perusahaan', '=', 'perusahaan1.kd_perusahaan')
	  
      ->select('perusahaan1.kd_perusahaan', 'pph4_2.id', 'pph4_2.id_pph42', 'pph4_2.jumlah_omzet', 'pph4_2.bulan', 'pph4_2.tahun', 'pph4_2.tanggal', 'pph4_2.nama_penyetor')
	  
	   ->orderBy($kolom, $tipe)
	  
      ->paginate(10);
  }

  /**
   * cari pph42
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode pph42
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return DB::table('pph4_2')
      ->join('perusahaan1', 'pph4_2.kd_perusahaan', '=', 'perusahaan1.kd_perusahaan')
	  
      ->select('perusahaan1.kd_perusahaan', 'pph4_2.id', 'pph4_2.id_pph42', 'pph4_2.jumlah_omzet', 'pph4_2.bulan', 'pph4_2.tahun', 'pph4_2.tanggal', 'pph4_2.nama_penyetor')

      ->where('pph4_2.id_pph42', 'like', '%'.$cari.'%')
      ->orderBy($kolom, $tipe)
      ->paginate(10);
  }


  /**
   * tambah data pph4
   * 
   * @param  array $data data pph4
   * @return bool
   */
  public static function tambah($data)
  {
  
error_reporting("E_ALL") ;

    // data
    $pph42	          		= new Pph42ku;
	
    $pph42->kd_perusahaan	= $data['kd_perusahaan'];
	
    $pph42->id_pph42  		= $data['id_pph42'];
    $pph42->jumlah_omzet 	= $data['jumlah_omzet'];
    $pph42->bulan  			= $data['bulan'];
    $pph42->tahun  			= $data['tahun'];
    $pph42->tanggal  		= $data['tanggal'];
    $pph42->nama_penyetor  	= $data['nama_penyetor'];
	
    // simpan
    return ($pph42->save()) ? true : false;
  }

  /**
   * set pph42
   * 
   * @param int $id 
   */
  public static function set($id)
  {
   return DB::table('pph4_2')
      ->join('perusahaan1', 'pph4_2.kd_perusahaan', '=', 'perusahaan1.kd_perusahaan')
	  
      ->select('perusahaan1.kd_perusahaan', 'pph4_2.id', 'pph4_2.id_pph42', 'pph4_2.jumlah_omzet', 'pph4_2.bulan', 'pph4_2.tahun', 'pph4_2.tanggal', 'pph4_2.nama_penyetor')

      ->where('pph4_2.id', '=', $id)
      ->first();
  }

  /**
   * rubah pph
   * 
   * @param  int   $id   id pph42
   * @param  array $data data pph42
   * @return bool
   */
  public static function rubah($id, $data)
  {
    // data
    $pph42          = Pph42ku::find($id);
	
    $pph42->kd_perusahaan	= $data['kd_perusahaan'];
	
    $pph42->id_pph42  		= $data['id_pph42'];
    $pph42->jumlah_omzet 	= $data['jumlah_omzet'];
    $pph42->bulan  			= $data['bulan'];
    $pph42->tahun  			= $data['tahun'];
    $pph42->tanggal  		= $data['tanggal'];
    $pph42->nama_penyetor  	= $data['nama_penyetor'];

    // simpan
    return ($pph42->save()) ? true : false;
  }

  /**
   * hapus pph42
   * 
   * @param  int $id id pph42
   * @return void
   */
   
  public static function hapus($id)
  {
    Pph42ku::destroy($id);
  }

}