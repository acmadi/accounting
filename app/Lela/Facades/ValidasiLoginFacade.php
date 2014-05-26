<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class ValidasiLoginFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'validasi_login';
  }

}