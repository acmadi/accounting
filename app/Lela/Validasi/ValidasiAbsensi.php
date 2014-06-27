<?php namespace Lela\Validasi;

class ValidasiAbsensi extends Validasi {

  /**
   * rules validasi absensi
   * 
   * @var array
   */
  protected static $rules = array(

    'kd_karyawan'		=> 'required|max:10',

    'kd_absen'	      	=> 'required|max:10',
    'tanggal'  			=> 'required|max:20',
    'cuti'  			=> 'required|max:5',
    'ijin'  			=> 'required|max:5',
    'sakit'  			=> 'required|max:5',
    'alpha'  			=> 'required|max:5',
	
  );

}