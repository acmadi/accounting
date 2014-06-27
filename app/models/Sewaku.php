<?php

class Sewaku extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'sewa';

  /**
   * Fillable column
   *
   * @var array
   */
  protected $fillable = array('kd_harga', 'kd_sewa', 'nama_sewa');

  /**
   * getter semua sewa
   * 
   * @return collection
   */
   
  public static function semua()
  {
    return DB::table('sewa')
      ->join('harga', 'sewa.kd_harga', '=', 'harga.kd_harga')
	  
      ->select('harga.kd_harga', 'sewa.id', 'sewa.kd_sewa', 'sewa.nama_sewa')
	  
      ->orderBy('sewa.kd_sewa', 'asc')
	  
      ->get();
  }

  /**
   * getter data sewa
   * 
   * @return collection
   */
   
  public static function data()
  {
    return DB::table('sewa')
      ->join('harga', 'sewa.kd_harga', '=', 'harga.kd_harga')
	  
      ->select('harga.kd_harga', 'sewa.id', 'sewa.kd_sewa', 'sewa.nama_sewa')
	  
      ->orderBy('sewa.kd_sewa', 'asc')
	  
      ->paginate(10);
  }

  /**
   * urut sewa
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
  public static function urut($kolom, $tipe)
  {
   return DB::table('sewa')
       ->join('harga', 'sewa.kd_harga', '=', 'harga.kd_harga')
	  
      ->select('harga.kd_harga', 'sewa.id', 'sewa.kd_sewa', 'sewa.nama_sewa')
	  
	   ->orderBy($kolom, $tipe)
	  
      ->paginate(10);
  }

  /**
   * cari sewa
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode sewa
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return DB::table('sewa')
      ->join('harga', 'sewa.kd_harga', '=', 'harga.kd_harga')
	  
      ->select('harga.kd_harga', 'sewa.id', 'sewa.kd_sewa', 'sewa.nama_sewa')

      ->where('sewa.kd_sewa', 'like', '%'.$cari.'%')
      ->orderBy($kolom, $tipe)
      ->paginate(10);
  }


  /**
   * tambah data sewa
   * 
   * @param  array $data data sewa
   * @return bool
   */
  public static function tambah($data)
  {
  
error_reporting("E_ALL") ;

    // data
    $sewa	          		= new Sewaku;
	
    $sewa->kd_harga	= $data['kd_harga'];
	
    $sewa->kd_sewa  		= $data['kd_sewa'];
    $sewa->nama_sewa  		= $data['nama_sewa'];
	
    // simpan
    return ($sewa->save()) ? true : false;
  }

  /**
   * set sewa
   * 
   * @param int $id 
   */
  public static function set($id)
  {
   return DB::table('sewa')
      ->join('harga', 'sewa.kd_harga', '=', 'harga.kd_harga')
	  
      ->select('harga.kd_harga', 'sewa.id', 'sewa.kd_sewa', 'sewa.nama_sewa')

      ->where('sewa.id', '=', $id)
      ->first();
  }

  /**
   * rubah sewa
   * 
   * @param  int   $id   id sewa
   * @param  array $data data sewa
   * @return bool
   */
  public static function rubah($id, $data)
  {
    // data
    $sewa          = Sewaku::find($id);
	
    $sewa->kd_harga		= $data['kd_harga'];
	
    $sewa->kd_sewa  		= $data['kd_sewa'];
    $sewa->nama_sewa  		= $data['nama_sewa'];

    // simpan
    return ($sewa->save()) ? true : false;
  }

  /**
   * hapus sewa
   * 
   * @param  int $id id sewa
   * @return void
   */
   
  public static function hapus($id)
  {
    Sewaku::destroy($id);
  }

}