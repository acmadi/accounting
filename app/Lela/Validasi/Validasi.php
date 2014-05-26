<?php namespace Lela\Validasi;

class Validasi {

  /**
   * pesan error
   * 
   * @var array
   */
  protected $errors;

  /**
   * cek validasi form
   * 
   * @return bool
   */
  public function cek()
  {
    // validasi
    $input    = \Input::all();
    $validasi = \Validator::make($input, static::$rules);

    // validasi error
    if ($validasi->fails())
    {
      $this->errors = $validasi->messages();

      return false;
    }

    return true;
  }

  /**
   * getter pesan error
   * 
   * @return array
   */
  public function errors()
  {
    return $this->errors;
  }

}