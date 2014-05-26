<?php namespace Lela\Validasi;

class ValidasiPerusahaan extends Validasi {

  /**
   * rules validasi form pengaturan perusahaan
   * 
   * @var array
   */
  protected static $rules = array(
    'logo'   => 'mimes:jpg,jpeg,png|max:5000',
    'nama'   => 'required|max:50',
    'alamat' => 'required|max:250',
  );

}