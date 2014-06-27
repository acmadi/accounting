<?php namespace Lela\Validasi;

class ValidasiAgenda extends Validasi {

  /**
   * rules validasi agenda
   * 
   * @var array
   */
  protected static $rules = array(

    'kd_marketing'			=> 'required|max:10',

    'kd_agenda'	      	=> 'required|max:10',
	'nama_agenda'		=> 'required|max:30', 
    'keterangan' 		=> 'required|max:200',
	
  );

}