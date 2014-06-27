<?php namespace Lela\Validasi;

class ValidasiSupportticket extends Validasi {

  /**
   * rules validasi support ticket
   * 
   * @var array
   */
  protected static $rules = array(

    'kd_marketing'		=> 'required|max:10',

    'kd_ticket'	      	=> 'required|max:10',
	'nama_ticket'		=> 'required|max:11', 
    'keterangan' 		=> 'required|max:200',
	'lampiran'      	=> 'mimes:jpg,jpeg,png|max:5000',
    'jenis_ticket' 		=> 'required|max:30',
    'status_ticket' 	=> 'required|max:30',
	
  );

}