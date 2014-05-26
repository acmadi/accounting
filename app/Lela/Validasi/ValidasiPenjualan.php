<?php namespace Lela\Validasi;

class ValidasiPenjualan extends Validasi {

  /**
   * rules validasi form penjualan
   * 
   * @var array
   */
  protected static $rules = array(
    'kode_pelanggan' => 'required|max:10',
    'kode_barang'    => 'required|max:10',
    'jumlah'         => 'required|numeric',
  );

}