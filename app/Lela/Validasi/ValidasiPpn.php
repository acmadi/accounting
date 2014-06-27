<?php namespace Lela\Validasi;

class ValidasiPpn extends Validasi {

  /**
   * rules validasi ppn
   * 
   * @var array
   */
  protected static $rules = array(

    'kd_perusahaan'				=> 'required|max:10',

    'kd_ppn'	      			=> 'required|max:10',
	'ppn_pembelian'				=> 'required|numeric', 
    'ppn_penjalan' 				=> 'required|numeric',
    'bulan' 					=> 'required|max:10',
    'tahun' 					=> 'required|numeric',
    'biaya_membangun_sendiri' 	=> 'required|numeric',
    'penomoran_faktur' 			=> 'required|numeric',
    'penjualan_tanpa_faktur' 	=> 'required|numeric',
	
	
  );

}