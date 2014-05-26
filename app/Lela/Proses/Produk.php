<?php namespace Lela\Proses;

class Produk {

  /**
   * tambah barang
   * 
   * @return bool
   */
  public function tambah()
  {
    // input
    $kode   = \Input::get('kode');
    $nama   = \Input::get('nama');
    $satuan = \Input::get('satuan');
    $beli   = \Input::get('beli');
    $jual   = \Input::get('jual');
	
    $data   = compact('kode', 'nama', 'satuan', 'beli', 'jual');

    // tambah barang
    $tambah = \Barang::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari barang
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
      $data  = \Barang::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Barang::urut($kolom, $tipe);

    return $data;
  }

  /**
   * rubah barang
   * 
   * @param  int  $id id barang
   * @return bool
   */
  public function rubah($id)
  {
    // input
    $kode   = \Input::get('kode');
    $nama   = \Input::get('nama');
    $satuan = \Input::get('satuan');
    $beli   = \Input::get('beli');
    $jual   = \Input::get('jual');
    $data   = compact('kode', 'nama', 'satuan', 'beli', 'jual');

    // rubah barang
    $rubah = \Barang::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }

}