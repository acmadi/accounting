<?php namespace Lela\Validasi;

class ValidasiTicketreply extends Validasi {

  /**
   * rules validasi ticketreply
   * 
   * @var array
   */
  protected static $rules = array(

    'kd_ticket'			=> 'required|max:10',

    'kd_reply'	      	=> 'required|max:10',
	'nama_reply'		=> 'required|max:30', 
    'keterangan' 		=> 'required|max:200',
	
  );

}