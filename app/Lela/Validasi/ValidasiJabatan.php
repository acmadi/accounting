<?php namespace Lela\Validasi;

class ValidasiJabatan extends Validasi {

  /**
   * rules validasi form jabatan
   * 
   * @var array
   */
  protected static $rules = array(
    'kd_jab'   		=> 'required|max:10',
    'nama_jabatan'  => 'required|max:50',
    'tun_kes'   	=> 'required|numeric',
    'tun_mkn' 		=> 'required|numeric',
	'tun_transport' => 'required|numeric',
  );

}