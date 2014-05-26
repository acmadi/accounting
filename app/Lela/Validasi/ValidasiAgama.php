<?php namespace Lela\Validasi;

class ValidasiAgama extends Validasi {

  /**
   * rules validasi form agama
   * 
   * @var array
   */
  protected static $rules = array(

    'nama'      	=> 'required|max:50',

  );

}