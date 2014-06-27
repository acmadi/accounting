<?php namespace Lela\Validasi;

class ValidasiPph42 extends Validasi {

  /**
   * rules validasi pph42
   * 
   * @var array
   */
  protected static $rules = array(

    'kd_perusahaan'		=> 'required|max:10',

    'id_pph42'	      	=> 'required|max:10',
	'jumlah_omzet'		=> 'required|numeric', 
    'bulan' 			=> 'required|max:20',
    'tahun' 			=> 'required|numeric',
    'tanggal' 			=> 'required|max:5',
    'nama_penyetor' 	=> 'required|max:50',
	
  );

}