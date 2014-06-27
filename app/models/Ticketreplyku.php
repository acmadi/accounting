<?php

class Ticketreplyku extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'ticket_reply';

  /**
   * Fillable column
   *
   * @var array
   */
  protected $fillable = array('kd_ticket', 'kd_reply', 'nama_reply', 'keterangan');

  /**
   * getter semua ticket reply
   * 
   * @return collection
   */
   
  public static function semua()
  {
    return DB::table('ticket_reply')
      ->join('support_ticket', 'ticket_reply.kd_ticket', '=', 'support_ticket.kd_ticket')
	  
      ->select('support_ticket.kd_ticket', 'ticket_reply.id', 'ticket_reply.kd_reply', 'ticket_reply.nama_reply', 'ticket_reply.keterangan')
	  
      ->orderBy('ticket_reply.kd_reply', 'asc')
	  
      ->get();
  }

  /**
   * getter data ticket reply
   * 
   * @return collection
   */
   
  public static function data()
  {
    return DB::table('ticket_reply')
      ->join('support_ticket', 'ticket_reply.kd_ticket', '=', 'support_ticket.kd_ticket')
	  
      ->select('support_ticket.kd_ticket', 'ticket_reply.id', 'ticket_reply.kd_reply', 'ticket_reply.nama_reply', 'ticket_reply.keterangan')
	  
      ->orderBy('ticket_reply.kd_reply', 'asc')
	  
      ->paginate(10);
  }

  /**
   * urut ticket reply
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
  public static function urut($kolom, $tipe)
  {
   return DB::table('ticket_reply')
      ->join('support_ticket', 'ticket_reply.kd_ticket', '=', 'support_ticket.kd_ticket')
	  
      ->select('support_ticket.kd_ticket', 'ticket_reply.id', 'ticket_reply.kd_reply', 'ticket_reply.nama_reply', 'ticket_reply.keterangan')
	  
	   ->orderBy($kolom, $tipe)
	  
      ->paginate(10);
  }

  /**
   * cari ticket reply
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode ticket reply
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return DB::table('ticket_reply')
      ->join('support_ticket', 'ticket_reply.kd_ticket', '=', 'support_ticket.kd_ticket')
	  
      ->select('support_ticket.kd_ticket', 'ticket_reply.id', 'ticket_reply.kd_reply', 'ticket_reply.nama_reply', 'ticket_reply.keterangan')

      ->where('ticket_reply.kd_reply', 'like', '%'.$cari.'%')
      ->orderBy($kolom, $tipe)
      ->paginate(10);
  }


  /**
   * tambah data ticket reply
   * 
   * @param  array $data data ticket reply
   * @return bool
   */
  public static function tambah($data)
  {
  
error_reporting("E_ALL") ;

    // data
    $ticketreply	          		= new Ticketreplyku;
	
    $ticketreply->kd_ticket	= $data['kd_ticket'];
	
    $ticketreply->kd_reply  		= $data['kd_reply'];
    $ticketreply->nama_reply  		= $data['nama_reply'];
    $ticketreply->keterangan  		= $data['keterangan'];
	
    // simpan
    return ($ticketreply->save()) ? true : false;
  }

  /**
   * set ticket reply
   * 
   * @param int $id 
   */
  public static function set($id)
  {
   return DB::table('ticket_reply')
       ->join('support_ticket', 'ticket_reply.kd_ticket', '=', 'support_ticket.kd_ticket')
	  
      ->select('support_ticket.kd_ticket', 'ticket_reply.id', 'ticket_reply.kd_reply', 'ticket_reply.nama_reply', 'ticket_reply.keterangan')

      ->where('ticket_reply.id', '=', $id)
      ->first();
  }

  /**
   * rubah pph
   * 
   * @param  int   $id   id ticket reply
   * @param  array $data data ticket reply
   * @return bool
   */
  public static function rubah($id, $data)
  {
    // data
    $ticketreply          = Ticketreplyku::find($id);
	
    $ticketreply->kd_ticket		= $data['kd_ticket'];
	
    $ticketreply->kd_reply  		= $data['kd_reply'];
    $ticketreply->nama_reply  		= $data['nama_reply'];
    $ticketreply->keterangan  		= $data['keterangan'];

    // simpan
    return ($ticketreply->save()) ? true : false;
  }

  /**
   * hapus ticket reply
   * 
   * @param  int $id id ticket reply
   * @return void
   */
   
  public static function hapus($id)
  {
    Ticketreplyku::destroy($id);
  }

}