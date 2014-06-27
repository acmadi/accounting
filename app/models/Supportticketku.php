<?php

class Supportticketku extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'support_ticket';

  /**
   * Fillable column
   *
   * @var array
   */
  protected $fillable = array('kd_marketing', 'kd_ticket', 'nama_ticket', 'keterangan', 'lampiran', 'jenis_ticket', 'status_ticket');

  /**
   * getter semua support ticket
   * 
   * @return collection
   */
  public static function semua()
  {
    return DB::table('support_ticket')
      ->join('marketing', 'support_ticket.kd_marketing', '=', 'marketing.kd_marketing')
	  
      ->select('marketing.kd_marketing', 'support_ticket.id', 'support_ticket.kd_ticket', 'support_ticket.nama_ticket', 'support_ticket.keterangan', 'support_ticket.lampiran', 'support_ticket.jenis_ticket', 'support_ticket.status_ticket')
	  
      ->orderBy('support_ticket.kd_ticket', 'asc')
	  
      ->get();
  }

  /**
   * getter data support ticket
   * 
   * @return collection
   */
   
  public static function data()
  {
    return DB::table('support_ticket')
      ->join('marketing', 'support_ticket.kd_marketing', '=', 'marketing.kd_marketing')
	  
      ->select('marketing.kd_marketing', 'support_ticket.id', 'support_ticket.kd_ticket', 'support_ticket.nama_ticket', 'support_ticket.keterangan', 'support_ticket.lampiran', 'support_ticket.jenis_ticket', 'support_ticket.status_ticket')
	  
      ->orderBy('support_ticket.kd_ticket', 'asc')
	  
      ->paginate(10);
  }

  /**
   * urut support ticket
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
  public static function urut($kolom, $tipe)
  {
   return DB::table('support_ticket')
      ->join('marketing', 'support_ticket.kd_marketing', '=', 'marketing.kd_marketing')
	  
      ->select('marketing.kd_marketing', 'support_ticket.id', 'support_ticket.kd_ticket', 'support_ticket.nama_ticket', 'support_ticket.keterangan', 'support_ticket.lampiran', 'support_ticket.jenis_ticket', 'support_ticket.status_ticket')
	  
	   ->orderBy($kolom, $tipe)
	  
      ->paginate(10);
  }

  /**
   * cari support ticket
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode support ticket
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return DB::table('support_ticket')
      ->join('marketing', 'support_ticket.kd_marketing', '=', 'marketing.kd_marketing')
	  
      ->select('marketing.kd_marketing', 'support_ticket.id', 'support_ticket.kd_ticket', 'support_ticket.nama_ticket', 'support_ticket.keterangan', 'support_ticket.lampiran', 'support_ticket.jenis_ticket', 'support_ticket.status_ticket')

      ->where('support_ticket.kd_ticket', 'like', '%'.$cari.'%')
      ->orderBy($kolom, $tipe)
      ->paginate(10);
  }


  /**
   * tambah data support ticket
   * 
   * @param  array $data data support ticket
   * @return bool
   */
  public static function tambah($data)
  {
  
error_reporting("E_ALL") ;

    // data
    $supportticket	          		= new Supportticketku;
	
    $supportticket->kd_marketing	= $data['kd_marketing'];
	
    $supportticket->kd_ticket  			= $data['kd_ticket'];
    $supportticket->nama_ticket  		= $data['nama_ticket'];
    $supportticket->keterangan  		= $data['keterangan'];
	
	    if (isset($data[0]['lampiran']))	
	    $supportticket->lampiran   			= $data[0]['lampiran'];
	
    $supportticket->jenis_ticket  		= $data['jenis_ticket'];
    $supportticket->status_ticket  		= $data['status_ticket'];
	
    // simpan
    return ($supportticket->save()) ? true : false;
  }

  /**
   * set support ticket
   * 
   * @param int $id 
   */
  public static function set($id)
  {
   return DB::table('support_ticket')
      ->join('marketing', 'support_ticket.kd_marketing', '=', 'marketing.kd_marketing')
	  
      ->select('marketing.kd_marketing', 'support_ticket.id', 'support_ticket.kd_ticket', 'support_ticket.nama_ticket', 'support_ticket.keterangan', 'support_ticket.lampiran', 'support_ticket.jenis_ticket', 'support_ticket.status_ticket')

      ->where('support_ticket.id', '=', $id)
      ->first();
  }

  /**
   * rubah pph
   * 
   * @param  int   $id   id support ticket
   * @param  array $data data support ticket
   * @return bool
   */
  public static function rubah($id, $data)
  {
    // data
    $supportticket          = Supportticketku::find($id);
	
    $supportticket->kd_marketing		= $data['kd_marketing'];
	
    $supportticket->kd_ticket  			= $data['kd_ticket'];
    $supportticket->nama_ticket  		= $data['nama_ticket'];
    $supportticket->keterangan  		= $data['keterangan'];

	    if (isset($data[0]['lampiran']))	
	    $supportticket->lampiran   			= $data[0]['lampiran'];	
	
    $supportticket->jenis_ticket  		= $data['jenis_ticket'];
    $supportticket->status_ticket  		= $data['status_ticket'];

    // simpan
    return ($supportticket->save()) ? true : false;
  }

  /**
   * hapus support ticket
   * 
   * @param  int $id id support ticket
   * @return void
   */
   
  public static function hapus($id)
  {
    Supportticketku::destroy($id);
  }

}