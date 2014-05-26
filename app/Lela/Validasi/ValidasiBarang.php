<?php namespace Lela\Validasi;

class ValidasiBarang extends Validasi {

  /**
   * rules validasi form barang
   * 
   * @var array
   */
  protected static $rules = array(
    'kode'   => 'required|max:10',
    'nama'   => 'required|max:50',
    'satuan' => 'required',
    'beli'   => 'required|numeric',
    'jual'   => 'required|numeric',
  );

}