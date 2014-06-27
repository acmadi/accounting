<?php namespace Lela\Validasi;

class ValidasiGaji extends Validasi {

  /**
   * rules validasi gaji
   * 
   * @var array
   */
  protected static $rules = array(

    'kd_tunjangan'			=> 'required|max:10',
    'kd_lembur'		  		=> 'required|max:10',
    'kd_pph'  				=> 'required|max:10',

    'kd_gaji'	      		=> 'required|max:10',
	'tanggal'				=> 'required|max:10', 
    'tun_jab' 				=> 'required|numeric',
    'ttl_tunjangan' 		=> 'required|numeric',
    'pph_thr' 				=> 'required|numeric',
    'pph_gaji_sebulan' 		=> 'required|numeric',
    'jml_potongan' 			=> 'required|numeric',
    'ttl_lembur' 			=> 'required|numeric',
    'gaji_pokok' 			=> 'required|numeric',
    'gaji_bruto' 			=> 'required|numeric',
    'gaji_bersih' 			=> 'required|numeric',

  );

}