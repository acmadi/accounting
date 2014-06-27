<?php namespace Lela\Proses;

class Ticketreply {

  /**
   * tambah ticket reply
   * 
   * @return bool
   */
  public function tambah()
  {
    // input

    $kd_ticket		= \Input::get('kd_ticket');
	
	$kd_reply	     	= \Input::get('kd_reply');
    $nama_reply     	= \Input::get('nama_reply');	
	$keterangan   		= \Input::get('keterangan');
	
    $data    = compact('kd_ticket', 'kd_reply', 'nama_reply', 'keterangan');
	
	
    // tambah ticket reply
    $tambah = \Ticketreplyku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari ticket reply   * 
   * @return ticket reply
   */
  public function cari()
  {
    // input
    $urut  = explode('-', \Input::get('sort'));
    $kolom = $urut[0];
    $tipe  = $urut[1];
    $cari  = \Input::get('cari');

    // cari
    if (! empty($cari))
      $data  = \Ticketreplyku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Ticketreplyku::urut($kolom, $tipe);

    return $data;
}


  /**
   * rubah ticket reply
   * 
   * @param  int  $id id ticket reply
   * @return bool
   */
  public function rubah($id)
  {
    // input
    
    $kd_ticket		= \Input::get('kd_ticket');
	
	$kd_reply	     	= \Input::get('kd_reply');
    $nama_reply     	= \Input::get('nama_reply');	
	$keterangan   		= \Input::get('keterangan');
	
    $data    = compact('kd_ticket', 'kd_reply', 'nama_reply', 'keterangan');

    // rubah ticket reply
    $rubah = \Ticketreplyku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }
  

}