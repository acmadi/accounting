<?php namespace Lela\Validasi;

class ValidasiPenilaian extends Validasi {

  /**
   * rules validasi penilaian
   * 
   * @var array
   */
  protected static $rules = array(

    'kd_absen'				=> 'required|max:10',

    'kd_penilaian'	      	=> 'required|max:10',
    'kinerja'  				=> 'required|max:10',
	
  );

}