<?php namespace Lela\Proses;

class Agenda {

  /**
   * tambah agenda
   * 
   * @return bool
   */
  public function tambah()
  {
    // input

    $kd_marketing		= \Input::get('kd_marketing');
	
	$kd_agenda	     	= \Input::get('kd_agenda');
    $nama_agenda     	= \Input::get('nama_agenda');	
	$keterangan   		= \Input::get('keterangan');
	
    $data    = compact('kd_marketing', 'kd_agenda', 'nama_agenda', 'keterangan');
	
	
    // tambah agenda
    $tambah = \Agendaku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari agenda   * 
   * @return agenda
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
      $data  = \Agendaku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Agendaku::urut($kolom, $tipe);

    return $data;
}


  /**
   * rubah agenda
   * 
   * @param  int  $id id agenda
   * @return bool
   */
  public function rubah($id)
  {
    // input
    
    $kd_marketing		= \Input::get('kd_marketing');
	
	$kd_agenda	     	= \Input::get('kd_agenda');
    $nama_agenda     	= \Input::get('nama_agenda');	
	$keterangan   		= \Input::get('keterangan');
	
    $data    = compact('kd_marketing', 'kd_agenda', 'nama_agenda', 'keterangan');

    // rubah agenda
    $rubah = \Agendaku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }
  

}