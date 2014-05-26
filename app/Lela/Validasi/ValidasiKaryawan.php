<?php namespace Lela\Validasi;

class ValidasiKaryawan extends Validasi {

  /**
   * rules validasi karyawan
   * 
   * @var array
   */
  protected static $rules = array(

    'kd_agama'			=> 'required|max:10',
    'kd_dep'  			=> 'required|max:10',
    'kd_jab' 			=> 'required|max:10',
    'kd_gol'  			=> 'required|max:10',
    'kd_statuskawin'  	=> 'required|max:10',
	
    'kd_karyawan'      	=> 'required|max:10',
	'nik'				=> 'required|max:30', 
    'nama_depan'      	=> 'required|max:30',
	'nama_belakang'		=> 'required|max:30', 
    'jen_kel'      		=> 'required|max:20',
	'tempat_lahir'		=> 'required|max:30', 
    'tgl_lahir'      	=> 'required|max:30',
	'pendidikan'		=> 'required|max:50', 
    'tgl_masuk'      	=> 'required|max:30',
	'tgl_keluar'		=> 'required|max:30', 
    'alamat'      		=> 'required|max:200',
	'desa'				=> 'max:50',
    'kota'      		=> 'required|max:30',
	'propinsi'			=> 'required|max:30', 
    'kode_pos'      	=> 'required|max:10',
	'no_telephone'		=> 'max:50', 
    'no_handphone'      => 'max:20',
	'email'				=> 'required|max:30', 
    'npwp'      		=> 'required|max:30',
    'foto'      		=> 'mimes:jpg,jpeg,png|max:5000',
	
  );

}