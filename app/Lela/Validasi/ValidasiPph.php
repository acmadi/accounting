<?php namespace Lela\Validasi;

class ValidasiPph extends Validasi {

  /**
   * rules validasi pph
   * 
   * @var array
   */
   
  protected static $rules = array(

    'kd_pkp'			=> 'required|max:10',
    'kd_lembur'  		=> 'required|max:10',

    'kd_pph'	      		=> 'required|max:10',
	'pph_thr'				=> 'required|max:11', 
    'pph_gaji_sebulan' 		=> 'required|max:11',
	
  );
  
}