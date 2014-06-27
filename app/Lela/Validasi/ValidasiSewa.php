<?php namespace Lela\Validasi;

class ValidasiSewa extends Validasi {

  /**
   * rules validasi sewa
   * 
   * @var array
   */
  protected static $rules = array(

    'kd_harga'			=> 'required|max:10',

    'kd_sewa'	      	=> 'required|max:10',
	'nama_sewa'			=> 'required|max:30', 
	
  );

}