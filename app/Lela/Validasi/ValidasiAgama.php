<?php namespace Lela\Validasi;

class ValidasiAgama extends Validasi {

  /**
   * rules validasi form agama
   * 
   * @var array
   */
  protected static $rules = array(
	'kd_agama'     	=> 'required|max:10',
    'nama'      	=> 'required|max:50',

  );

}