<?php namespace Lela\Validasi;

class ValidasiPtkp extends Validasi {

  /**
   * rules validasi form ptkp
   * 
   * @var array
   */
  protected static $rules = array(

    'kd_statuskawin'      	=> 'required|max:10',
	'jumlah_ptkp'			=> 'required|max:10',
	'status_kawin'			=> 'required|max:50',

  );

}