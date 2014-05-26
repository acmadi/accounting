<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class ValidasiPenggunaFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'validasi_pengguna';
  }

}