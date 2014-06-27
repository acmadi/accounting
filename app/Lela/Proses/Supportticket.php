<?php namespace Lela\Proses;

class Supportticket {

  /**
   * tambah support ticket
   * 
   * @return bool
   */
  public function tambah()
  {
    // input

    $kd_marketing		= \Input::get('kd_marketing');
	
	$kd_ticket	     	= \Input::get('kd_ticket');
    $nama_ticket     	= \Input::get('nama_ticket');	
	$keterangan   		= \Input::get('keterangan');
	
	$jenis_ticket   	= \Input::get('jenis_ticket');
	$status_ticket   	= \Input::get('status_ticket');

    $data    = compact('kd_marketing', 'kd_ticket', 'nama_ticket', 'keterangan', 'jenis_ticket', 'status_ticket');

	
	
    if (\Input::hasFile('lampiran'))
    {
      // nama file
      $eks  	= \Input::file('lampiran')->getClientOriginalExtension();
      $lampiran = 'foto_'.date('dmYHis').'.'.$eks;
      $push 	= compact('lampiran');

     

      // unggah foto ke folder "public/foto"
      \Input::file('lampiran')->move('foto', $lampiran);

      array_push($data, $push);
    }		
	
	
    // tambah pph
    $tambah = \Supportticketku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari Pph   * 
   * @return support ticket
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
      $data  = \Supportticketku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Supportticketku::urut($kolom, $tipe);

    return $data;
}


  /**
   * rubah support ticket
   * 
   * @param  int  $id id support ticket
   * @return bool
   */
  public function rubah($id)
  {
    // input
    
    $kd_marketing			= \Input::get('kd_marketing');
	
	$kd_ticket	     	= \Input::get('kd_ticket');
    $nama_ticket     	= \Input::get('nama_ticket');	
	$keterangan   		= \Input::get('keterangan');
	$lampiran   		= \Input::get('lampiran');
	$jenis_ticket   	= \Input::get('jenis_ticket');
	$status_ticket   	= \Input::get('status_ticket');

    $data    = compact('kd_marketing', 'kd_ticket', 'nama_ticket', 'keterangan', 'jenis_ticket', 'status_ticket');
	

    if (\Input::hasFile('lampiran'))
    {
      // nama file
      $eks  	= \Input::file('lampiran')->getClientOriginalExtension();
      $lampiran = 'foto_'.date('dmYHis').'.'.$eks;
      $push 	= compact('lampiran');

     

      // unggah foto ke folder "public/foto"
      \Input::file('lampiran')->move('foto', $lampiran);

      array_push($data, $push);
    }		
 

	
    // rubah pph
    $rubah = \Supportticketku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }
  

}