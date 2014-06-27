<?php namespace Lela\Validasi;

class ValidasiPotongan extends Validasi {

  /**
   * rules validasi form potongan
   * 
   * @var array
   */
  protected static $rules = array(
	
	'kd_potongan'     	=> 'required|max:10',
    'nama_potongan'   	=> 'required|max:100',
	
  );

}