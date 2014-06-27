<?php namespace Lela\Validasi;

class ValidasiLembur extends Validasi {

  /**
   * rules validasi lembur
   * 
   * @var array
   */
  protected static $rules = array(

    'kd_tunjangan'				=> 'required|max:10',

    'kd_lembur'	      			=> 'required|max:10',
    'jml_lembur_biasa'  		=> 'required|numeric',
    'jml_lembur_libur'  		=> 'required|numeric',
    'tarif_biasa'  				=> 'required|numeric',
    'tarif_libur'  				=> 'required|numeric',
    'total' 					=> 'required|numeric',
	
  );

}