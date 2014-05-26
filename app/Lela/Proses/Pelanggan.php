<?php namespace Lela\Proses;

class Pelanggan {

  /**
   * tambah pelanggan
   * 
   * @return bool
   */
  public function tambah()
  {
    // input
    $kode   = \Input::get('kode');
    $nama   = \Input::get('nama');
    $telp   = \Input::get('telp');
    $alamat = \Input::get('alamat');
    $data   = compact('kode', 'nama', 'telp', 'alamat');

    // tambah pelanggan
    $tambah = \Customer::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari pelanggan
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
      $data  = \Customer::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Customer::urut($kolom, $tipe);

    return $data;
  }

  /**
   * rubah pelanggan
   * 
   * @param  int  $id id pelanggan
   * @return bool
   */
  public function rubah($id)
  {
    // input
    $kode   = \Input::get('kode');
    $nama   = \Input::get('nama');
    $telp   = \Input::get('telp');
    $alamat = \Input::get('alamat');
    $data   = compact('kode', 'nama', 'telp', 'alamat');

    // rubah pelanggan
    $rubah = \Customer::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }

}