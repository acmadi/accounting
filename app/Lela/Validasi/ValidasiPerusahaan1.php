<?php namespace Lela\Validasi;

class ValidasiPerusahaan1 extends Validasi {

  /**
   * rules validasi form perusahaan1
   * 
   * @var array
   */
  protected static $rules = array(

    'kd_perusahaan'      	=> 'required|max:10',
	'nama_perusahaan'		=> 'required|max:100',
	'alamat'				=> 'required|max:200',
	'kota'					=> 'required|max:50',
	'propinsi'				=> 'required|max:50',
	'kode_pos'				=> 'required|max:10',
	'handphone'				=> 'required|max:20',
	'telephone'				=> 'required|max:20',
	'fax'					=> 'required|max:20',
	'email'					=> 'required|max:30',

  );

}