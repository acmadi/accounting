<?php namespace Lela\Proses;

class Status {

  /**
   * tambah status
   * 
   * @return bool
   */
  public function tambah()
  {
    // input
	$id_status  	= \Input::get('id_status');
    $status_name    = \Input::get('status_name');

    $data     	= compact('id_status', 'status_name');


    // tambah status
    $tambah = \Statusku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari status
   * 
   * @return collection
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
      $data  = \Statusku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Statusku::urut($kolom, $tipe);

    return $data;
  }

  /**
   * rubah statusku
   * 
   * @param  int  $id id status
   * @return bool
   */
  public function rubah($id)
  {
    // input
	$id_status     	= \Input::get('id_status');
    $status_name	= \Input::get('status_name');
	
    $data     	= compact('id_status', 'status_name');


    // rubah golongan
    $rubah = \Statusku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }


}