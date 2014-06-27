<?php namespace Lela\Validasi;

class ValidasiDetailgaji extends Validasi {

  /**
   * rules validasi detail gaji
   * 
   * @var array
   */
  protected static $rules = array(

    'kd_potongan'		=> 'required|max:10',

    'nomor'		      	=> 'required|max:10',
    'jumlah'   			=> 'required|numeric',
	
  );

}