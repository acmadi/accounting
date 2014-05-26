<?php namespace Lela\Validasi;

class ValidasiGolongan extends Validasi {

  /**
   * rules validasi form golongan
   * 
   * @var array
   */
  protected static $rules = array(

    'kd_gol'      	=> 'required|max:10',
	'gol_pok'		=> 'required|max:50',
	'tun_jab'		=> 'required|max:20',

  );

}