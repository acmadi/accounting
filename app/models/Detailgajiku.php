<?php

class Detailgajiku extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'detailgaji';

  /**
   * Fillable column
   *
   * @var array
   */
  protected $fillable = array('kd_potongan', 'nomor', 'jumlah');

  /**
   * getter semua detail gaji
   * 
   * @return collection
   */
  public static function semua()
  {
    return DB::table('detailgaji')
      ->join('potongan', 'detailgaji.kd_potongan', '=', 'potongan.kd_potongan')
	  
      ->select('potongan.kd_potongan', 'detailgaji.nomor', 'detailgaji.jumlah')
	  
      ->orderBy('detailgaji.nomor', 'asc')
	  
      ->get();
  }

  /**
   * getter data detail gaji
   * 
   * @return collection
   */
   
  public static function data()
  {
    return DB::table('detailgaji')
      ->join('potongan', 'detailgaji.kd_potongan', '=', 'potongan.kd_potongan')
	  
      ->select('potongan.kd_potongan', 'detailgaji.id', 'detailgaji.nomor', 'detailgaji.jumlah')

      ->orderBy('detailgaji.nomor', 'asc')
	  
      ->paginate(10);
  }

  /**
   * urut detail gaji
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
  public static function urut($kolom, $tipe)
  {
   return DB::table('detailgaji')
      ->join('potongan', 'detailgaji.kd_potongan', '=', 'potongan.kd_potongan')
	  
      ->select('potongan.kd_potongan', 'detailgaji.id', 'detailgaji.nomor', 'detailgaji.jumlah')

	   ->orderBy($kolom, $tipe)
	  
      ->paginate(10);
  }

  /**
   * cari detail gaji
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode/nomor detail gaji
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return DB::table('detailgaji')
      ->join('potongan', 'detailgaji.kd_potongan', '=', 'potongan.kd_potongan')
	  
      ->select('potongan.kd_potongan', 'detailgaji.id', 'detailgaji.nomor', 'detailgaji.jumlah')

      ->where('detailgaji.nomor', 'like', '%'.$cari.'%')
      ->orderBy($kolom, $tipe)
      ->paginate(10);
  }


  /**
   * tambah data detal gaji
   * 
   * @param  array $data data detail gaji
   * @return bool
   */
  public static function tambah($data)
  {
  
error_reporting("E_ALL") ;

    // data
    $detailgaji	          			= new Detailgajiku;
    $detailgaji->kd_potongan		= $data['kd_potongan'];
	
    $detailgaji->nomor  		= $data['nomor'];
    $detailgaji->jumlah  		= $data['jumlah'];	
	
    // simpan
    return ($detailgaji->save()) ? true : false;
  }

  /**
   * set detail gaji
   * 
   * @param int $id 
   */
  public static function set($id)
  {
   return DB::table('detailgaji')
      ->join('potongan', 'detailgaji.kd_potongan', '=', 'potongan.kd_potongan')
	  
       ->select('potongan.kd_potongan', 'detailgaji.id', 'detailgaji.nomor', 'detailgaji.jumlah')

      ->where('detailgaji.id', '=', $id)
      ->first();
  }

  /**
   * rubah detail gaji
   * 
   * @param  int   $id   id detail gaji
   * @param  array $data data detail gaji
   * @return bool
   */
  public static function rubah($id, $data)
  {
    // data
    $detailgaji          = Detailgajiku::find($id);
	
    $detailgaji->kd_potongan	= $data['kd_potongan'];
	
    $detailgaji->nomor  	= $data['nomor'];
    $detailgaji->jumlah		= $data['jumlah'];

    // simpan
    return ($detailgaji->save()) ? true : false;
  }

  /**
   * hapus detail gaji
   * 
   * @param  int $id id detail gaji
   * @return void
   */
  public static function hapus($id)
  {
    Detailgajiku::destroy($id);
  }

}