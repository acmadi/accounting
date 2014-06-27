<?php namespace Lela\Validasi;

class ValidasiStatus extends Validasi {

  /**
   * rules validasi form status
   * 
   * @var array
   */
  protected static $rules = array(

    'id_status'      	=> 'required|max:10',
	'status_name'		=> 'required|max:50',

  );

}