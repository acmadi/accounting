<?php namespace Lela\Validasi;

class ValidasiPelanggan extends Validasi {

  /**
   * rules validasi form pelanggan
   * 
   * @var array
   */
  protected static $rules = array(
    'kode'   => 'required|max:10',
    'nama'   => 'required|max:50',
    'telp'   => 'max:20',
    'alamat' => 'max:100',
  );

}