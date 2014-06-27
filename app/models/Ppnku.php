<?php

class Ppnku extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'ppn';

  /**
   * Fillable column
   *
   * @var array
   */
  protected $fillable = array('kd_perusahaan', 'kd_ppn', 'ppn_pembelian', 'ppn_penjalan', 'bulan', 'tahun', 'biaya_membangun_sendiri', 'penomoran_faktur', 'penjualan_tanpa_faktur');

  /**
   * getter semua ppn
   * 
   * @return collection
   */
   
  public static function semua()
  {
    return DB::table('ppn')
      ->join('perusahaan1', 'ppn.kd_perusahaan', '=', 'perusahaan1.kd_perusahaan')
	  
      ->select('perusahaan1.kd_perusahaan', 'ppn.id', 'ppn.kd_ppn', 'ppn.ppn_pembelian', 'ppn.ppn_penjalan', 'ppn.bulan', 'ppn.tahun', 'ppn.biaya_membangun_sendiri', 'ppn.penomoran_faktur', 'ppn.penjualan_tanpa_faktur')
	  
      ->orderBy('ppn.kd_ppn', 'asc')
	  
      ->get();
  }

  /**
   * getter data ppn
   * 
   * @return collection
   */
   
  public static function data()
  {
    return DB::table('ppn')
      ->join('perusahaan1', 'ppn.kd_perusahaan', '=', 'perusahaan1.kd_perusahaan')
	  
      ->select('perusahaan1.kd_perusahaan', 'ppn.id', 'ppn.kd_ppn', 'ppn.ppn_pembelian', 'ppn.ppn_penjalan', 'ppn.bulan', 'ppn.tahun', 'ppn.biaya_membangun_sendiri', 'ppn.penomoran_faktur', 'ppn.penjualan_tanpa_faktur')
	  
      ->orderBy('ppn.kd_ppn', 'asc')
	  
      ->paginate(10);
  }

  /**
   * urut ppn
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
  public static function urut($kolom, $tipe)
  {
   return DB::table('ppn')
      ->join('perusahaan1', 'ppn.kd_perusahaan', '=', 'perusahaan1.kd_perusahaan')
	  
      ->select('perusahaan1.kd_perusahaan', 'ppn.id', 'ppn.kd_ppn', 'ppn.ppn_pembelian', 'ppn.ppn_penjalan', 'ppn.bulan', 'ppn.tahun', 'ppn.biaya_membangun_sendiri', 'ppn.penomoran_faktur', 'ppn.penjualan_tanpa_faktur')
	  
	   ->orderBy($kolom, $tipe)
	  
      ->paginate(10);
  }

  /**
   * cari ppn
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode ppn
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return DB::table('ppn')
      ->join('perusahaan1', 'ppn.kd_perusahaan', '=', 'perusahaan1.kd_perusahaan')
	  
      ->select('perusahaan1.kd_perusahaan', 'ppn.id', 'ppn.kd_ppn', 'ppn.ppn_pembelian', 'ppn.ppn_penjalan', 'ppn.bulan', 'ppn.tahun', 'ppn.biaya_membangun_sendiri', 'ppn.penomoran_faktur', 'ppn.penjualan_tanpa_faktur')

      ->where('ppn.kd_ppn', 'like', '%'.$cari.'%')
      ->orderBy($kolom, $tipe)
      ->paginate(10);
  }


  /**
   * tambah data ppn
   * 
   * @param  array $data data ppn
   * @return bool
   */
  public static function tambah($data)
  {
  
error_reporting("E_ALL") ;

    // data
    $ppn	          		= new Ppnku;
	
    $ppn->kd_perusahaan				= $data['kd_perusahaan'];
	
    $ppn->kd_ppn  					= $data['kd_ppn'];
    $ppn->ppn_pembelian  			= $data['ppn_pembelian'];
    $ppn->ppn_penjalan  			= $data['ppn_penjalan'];
    $ppn->bulan  					= $data['bulan'];
    $ppn->tahun  					= $data['tahun'];
    $ppn->biaya_membangun_sendiri  	= $data['biaya_membangun_sendiri'];
    $ppn->penomoran_faktur  		= $data['penomoran_faktur'];
    $ppn->penjualan_tanpa_faktur  	= $data['penjualan_tanpa_faktur'];

    // simpan
    return ($ppn->save()) ? true : false;
  }

  /**
   * set agenda
   * 
   * @param int $id 
   */
  public static function set($id)
  {
   return DB::table('ppn')
      ->join('perusahaan1', 'ppn.kd_perusahaan', '=', 'perusahaan1.kd_perusahaan')
	  
      ->select('perusahaan1.kd_perusahaan', 'ppn.id', 'ppn.kd_ppn', 'ppn.ppn_pembelian', 'ppn.ppn_penjalan', 'ppn.bulan', 'ppn.tahun', 'ppn.biaya_membangun_sendiri', 'ppn.penomoran_faktur', 'ppn.penjualan_tanpa_faktur')

      ->where('ppn.id', '=', $id)
      ->first();
  }

  /**
   * rubah ppn
   * 
   * @param  int   $id   id ppn
   * @param  array $data data ppn
   * @return bool
   */
  public static function rubah($id, $data)
  {
    // data
    $ppn          = Ppnku::find($id);
	
    $ppn->kd_perusahaan				= $data['kd_perusahaan'];
	
    $ppn->kd_ppn  					= $data['kd_ppn'];
    $ppn->ppn_pembelian  			= $data['ppn_pembelian'];
    $ppn->ppn_penjalan  			= $data['ppn_penjalan'];
    $ppn->bulan  					= $data['bulan'];
    $ppn->tahun  					= $data['tahun'];
    $ppn->biaya_membangun_sendiri  	= $data['biaya_membangun_sendiri'];
    $ppn->penomoran_faktur  		= $data['penomoran_faktur'];
    $ppn->penjualan_tanpa_faktur  	= $data['penjualan_tanpa_faktur'];

    // simpan
    return ($ppn->save()) ? true : false;
  }

  /**
   * hapus ppn
   * 
   * @param  int $id id ppn
   * @return void
   */
   
  public static function hapus($id)
  {
    Ppnku::destroy($id);
  }

}