<?php namespace Lela\Validasi;

class ValidasiHarga extends Validasi {

  /**
   * rules validasi form harga
   * 
   * @var array
   */
  protected static $rules = array(
	
	'kd_harga'     	=> 'required|max:10',
    'nama_harga'   	=> 'required|max:100',
    'harga'		   	=> 'required|max:50',
	
  );

}