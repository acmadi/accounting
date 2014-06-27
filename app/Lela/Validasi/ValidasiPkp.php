<?php namespace Lela\Validasi;

class ValidasiPkp extends Validasi {

  /**
   * rules validasi form pkp
   * 
   * @var array
   */
  protected static $rules = array(
	
	'kd_pkp'     	=> 'required|max:10',
    'batas_pkp'   	=> 'required|numeric',
    'tarif'   		=> 'required|numeric',

	
  );

}