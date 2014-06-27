<?php namespace Lela\Validasi;

class ValidasiTunjangan extends Validasi {

  /**
   * rules validasi tunjangan
   * 
   * @var array
   */
  protected static $rules = array(

    'kd_absen'		=> 'required|max:10',

    'kd_tunjangan'	      	=> 'required|max:10',
    'ttl_tun_kes'  			=> 'required|numeric',
    'ttl_tun_makan'  		=> 'required|numeric',
    'ttl_tun_transport'  	=> 'required|numeric',
    'ttl_tun'  				=> 'required|numeric',
	
  );

}