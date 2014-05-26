<?php namespace Lela\Proses;

class Penjualan {

  /**
   * tambah faktur penjualan
   * 
   * @return bool
   */
  public function tambah()
  {
    // input
    $pelanggan = \Input::get('kode_pelanggan');
    $barang    = \Input::get('kode_barang');
    $jumlah    = \Input::get('jumlah');
    $data      = compact('pelanggan', 'barang', 'jumlah');

    // tambah faktur penjualan
    $tambah = \Jual::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari faktur penjualan
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
      $data  = \Jual::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Jual::urut($kolom, $tipe);

    return $data;
  }

  /**
   * rubah faktur penjualan
   * 
   * @param  int  $id id faktur penjualan
   * @return bool
   */
  public function rubah($id)
  {
    // input
    $pelanggan = \Input::get('kode_pelanggan');
    $barang    = \Input::get('kode_barang');
    $jumlah    = \Input::get('jumlah');
    $data      = compact('pelanggan', 'barang', 'jumlah');

    // rubah faktur penjualan
    $rubah = \Jual::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }

}