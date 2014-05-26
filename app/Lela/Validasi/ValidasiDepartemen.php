<?php namespace Lela\Validasi;

class ValidasiDepartemen extends Validasi {

  /**
   * rules validasi form departemen
   * 
   * @var array
   */
  protected static $rules = array(

    'kd_dep'      	=> 'required|max:10',
	'nama_dep'		=> 'required|max:50',

  );

}